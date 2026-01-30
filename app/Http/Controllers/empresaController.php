<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empresa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\auth;
use App\Models\Evento;
class empresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $empresa = auth('empresa')->user();
      $eventosRecentes= Evento::where('id',$empresa->id)->orderBy('created_at')->get();
      $eventosCriados =
    Evento::where('empresa_id', $empresa->id)
        ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as mes, COUNT(*) as total')
        ->groupBy('mes')
        ->orderBy('mes')
        ->get();
        // Transformar dados para o gráfico
    $dadosGrafico = [
        'labels' => $eventosCriados->pluck('mes')->toArray(),
        'dados' => $eventosCriados->pluck('total')->toArray()
    ];
    $totalEventos= Evento::where('empresa_id',$empresa->id)->count();
    $eventosActivo = Evento::where('status',$empresa->status)->count();
       return view('profiles.empresa.index', compact('empresa','eventosRecentes','dadosGrafico','totalEventos','eventosActivo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
              return view('auth.EmpresaCadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar dados de entrada
        $validations =        $request->validate([
            'nome' => 'required|string|min:5|max:255',
            'email' => 'required|string|email|max:255|unique:empresas',
            'password' => 'required|string|min:7',
            'nif' => 'nullable|string|max:20',
            'telefone' => 'required|string|min:9|max:20',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            // Processar arquivo de logo se enviado
            if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
                $logo = $request->file('logo');
                $filename = time() . '_' . uniqid() . '.' . $logo->getClientOriginalExtension();
                $path = $logo->storeAs('logos', $filename, 'public');
                $validations['logo'] = $path;
            }

            // Hash da senha antes de salvar
            $validations['password'] = hash::make($validations['password']);

           

            empresa::create($validations);
            return  redirect()->route( 'login')->with('sucess','usuário cadastrado com sucesso');

        } catch (\Exception $th) {
            return redirect()->back()
                ->with('error', 'Erro ao cadastrar: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empresa = empresa::findOrFail($id);

        return  view('profiles.empresa.EditarEmpresa',compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $empresa = empresa::findOrFail($id);
           // Validar dados de entrada
        $validations =        $request->validate([
            'nome' => 'string|min:5|max:255',
            'email' =>[ 'string','email',Rule::unique('empresas')->ignore($id)],
            'password' => 'string|min:7',
            'nif' => 'string|max:20',
            'telefone' => 'string|min:9|max:20',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

             try {
            // Processar arquivo de logo se enviado
            if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
                $logo = $request->file('logo');
                $filename = time() . '_' . uniqid() . '.' . $logo->getClientOriginalExtension();
                $path = $logo->storeAs('logos', $filename, 'public');
                $validations['logo'] = $path;
            }

            // Hash da senha antes de salvar
            $validations['password'] = hash::make($validations['password']);

            $empresa->update($validations);
            return  redirect()->route( 'empresa-index')->with('sucess','usuário cadastrado com sucesso');

        } catch (\Exception $th) {
            return redirect()->back()
                   ->with('error', 'Erro ao cadastrar: ' . $th->getMessage());

            
           
        }   
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empresa = empresa::findOrFail($id);
        $empresa->delete();
        return redirect()->route('login');
    }

    public function logout(request $request){
       auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerate();
        return redirect()->route('login');
    }
}
