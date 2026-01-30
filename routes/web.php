<?php

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\empresaController;
use App\Http\Controllers\EventoController;
use App\Models\Evento;

Route::get('/', function () {
    $eventosRecentes= Evento::orderBy('created_at')->get();
    return view('index',compact('eventosRecentes'));
});

Route::get('/Login',[LoginController::class,'index'])->name('login');
Route::post('/Login Attempt',[LoginController::class,'attempt'])->name('login-attempt');
Route::get('/Tela de cadastro',[UserController::class,'create'])->name('tela-cadastro');
Route::post('/Cadastro de usuário',[UserController::class,'store'])->name('cadastrar-user');
Route::get('/Cadastrar Empresa',[empresaController::class,'create'])->name('cadastro-empresa');
Route::post('/Cadastrando Empresa',[empresaController::class,'store'])->name('cadastrondo-empresa');

Route::middleware(['auth'])->group(function(){
    #user routes group
    Route::get('/users index',[UserController::class,'index'])->name('user-index');
    Route::get('/Editar/{id}',[UserController::class,'edit'])->name('user-editar');
    Route::put('/Editar/{id}',[UserController::class,'update'])->name('user-update');
    Route::get('/Eliminar User ',[UserController::class,'delete'])->name('user-delete');
    Route::get('/Sair',[UserController::class,'logout'])->name('user-logout');
});

#empresas route group
Route::middleware(['auth:empresa'])->group(function(){
    Route::get('/empresas index',[empresaController::class,'index'])->name('empresa-index');
    Route::get('/Editar dados da Empresas/{id} ',[empresaController::class,'edit'])->name('empresa-edit');
    Route::post('/Editando dados da Empresa/{id} ',[empresaController::class,'update'])->name('empresa-update');
    Route::get('/Eliminar empresa/{id}',[empresaController::class,'delete'])->name('empresa-delete');
    Route::get('/logout',[empresaController::class,'logout'])->name('empresa-logout');
    #eventos routes 
    Route::get('/Evento index',[EventoController::class,'index'])->name('evento-index');
    Route::get('/criar Evento',[EventoController::class,'create'])->name('evento-cadastrar');
    Route::post('/cadastrando Evento',[EventoController::class,'store'])->name('evento-store');
    Route::get('/Editar Evento/{id} ',[EventoController::class,'edit'])->name('Evento-edit');
    Route::put('/Editando Evento/{id} ',[EventoController::class,'update'])->name('Evento-update');
    Route::get('/Eliminar Evento/{id}',[EventoController::class,'destroy'])->name('Evento-delete');
    });