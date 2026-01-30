<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresa = auth('empresa')->user();
        $eventos = Evento::where('empresa_id', $empresa->id)->get();
        return view('profiles.empresa.evento.meusEventos', compact('eventos', 'empresa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profiles.empresa.Evento.EventoCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $empresa = auth('empresa')->user();
        
        $validations = $request->validate([
            'titulo' => 'required|string|min:3|max:255',
            'site' => 'nullable|url',
            'descrição' => 'required|string|min:10',
            'data_inicio' => 'required|date|after_or_equal:today',
            'data_fim' => 'nullable|date|after_or_equal:data_inicio',
            'localização' => 'required|string|max:255',
            'capacidade' => 'required|integer|min:1',
            'imagem_capa' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'categoria' => 'required|string|max:100',
            'status' => 'nullable|string|in:ativo,encerrado',
        ]);

        try {
            // Adicionar ID da empresa autenticada
            $validations['empresa_id'] = $empresa->id;

            // Processar arquivo de imagem de capa se enviado
            if ($request->hasFile('imagem_capa') && $request->file('imagem_capa')->isValid()) {
                $imagem = $request->file('imagem_capa');
                $filename = time() . '_' . uniqid() . '.' . $imagem->getClientOriginalExtension();
                $path = $imagem->storeAs('capas', $filename, 'public');
                $validations['imagem_capa'] = $path;
            }

            // Definir status padrão se não fornecido
            if (!isset($validations['status'])) {
                $validations['status'] = 'ativo';
            }

            Evento::create($validations);
            return redirect()->route('evento-index')->with('success', 'Evento criado com sucesso!');

        } catch (\Exception $th) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao criar evento: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        return view('profiles.empresa.eventos.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evento = Evento::findOrFail($id);
        return  view('profiles.empresa.Evento.EditarEvento', compact('evento'));
;  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $evento = Evento::findOrFail($id);
            
            $validations = $request->validate([
                'titulo' => 'nullable|string|min:3|max:255',
                'site' => 'nullable|url',
                'descrição' => 'nullable|string|min:10',
                'data_inicio' => 'nullable|date|after_or_equal:today',
                'data_fim' => 'nullable|date|after_or_equal:data_inicio',
                'localização' => 'nullable|string|max:255',
                'capacidade' => 'nullable|integer|min:1',
                'imagem_capa' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'categoria' => 'nullable|string|max:100',
                'status' => 'nullable|string|in:ativo,encerrado',
            ]);

            // Processar arquivo de imagem de capa se enviado
            if ($request->hasFile('imagem_capa') && $request->file('imagem_capa')->isValid()) {
                $imagem = $request->file('imagem_capa');
                $filename = time() . '_' . uniqid() . '.' . $imagem->getClientOriginalExtension();
                $path = $imagem->storeAs('capas', $filename, 'public');
                $validations['imagem_capa'] = $path;
            }

            $evento->update($validations);
            return  redirect()->route('evento-index')->with('success', 'Evento atualizado com sucesso!');

        } catch (\Exception $th) {
            \Log::error('Erro ao atualizar evento: ' . $th->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erro ao atualizar evento: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $evento = Evento::findOrFail($id);
            $evento->delete();
            return redirect()->route('evento-index')->with('success', 'Evento removido com sucesso!');
        } catch (\Exception $th) {
            return redirect()->back()
                ->with('error', 'Erro ao remover evento: ' . $th->getMessage());
        }
    }
}
