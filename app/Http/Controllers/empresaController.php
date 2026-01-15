<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empresa;
class empresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->file('logo')->getClientOriginalName();
        
        $validations = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|min:7',
            'Bi' => 'required|min:15|max:15',
            'telefone' => 'required|min:9',
            'logo' => 'image',
        ]);
       

    try {
    empresa::create($validations);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
