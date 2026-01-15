<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\auth;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profiles.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('auth.Usercadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validations = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:7',
            'Bi' => 'required|min:15|max:15',
            'telefone' => 'required|min:9',
            'data_nascimento' => ['required', Rule::date()->before('2018-01-01')],
        ]);
        try {
         User::create($validations);
        return redirect()->route( 'login')->with('sucess','usuário cadastrado com sucesso');
        } catch (\Throwable $th) {
        return redirect()->back()->with('Error','usuário não cadastrado! ');

        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
            $user = User::findOrFail($id);
            return view('profiles.user.Editar',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
          $user = User::findOrFail($id);
         $validations = $request->validate([
            'name' => 'min:3',
            'email' =>[ 'email', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|min:7',
            'Bi' => 'min:15|max:15',
            'telefone' => 'min:9',
            'data_nascimento' => ['date', Rule::date()->before('2018-01-01')],
        ]);
        $validations['password'] = hash::make($validations['password']);
        $user->update($validations);

        return redirect()->back()->with(  'sucess','dados actualizados com sucesso! ');
        } catch (\Throwable $th) {
         return redirect()->back()->with('Error','usuário não cadastrado! '.$th);
        }
      
    }
    
      public function logout(Request $request)
    {
       auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerate();
        return redirect()->route('login');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $user = User::findOrFail($id);
       $user->delete();

      return redirect()->route('tela-cadastro');
    }
}
