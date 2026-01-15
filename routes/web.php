<?php

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\empresaController;

Route::get('/', function () {
    return view('index');
});

Route::get('/Login',[LoginController::class,'index'])->name('login');
Route::post('/Login Attempt',[LoginController::class,'attempt'])->name('login-attempt');
Route::get('/Tela de cadastro',[UserController::class,'create'])->name('tela-cadastro');
Route::get('/Cadastrar Empresa',[empresaController::class,'create'])->name('cadastro-empresa');


#user routes group
Route::middleware(['auth'])->group(function(){
Route::post('/Cadastro de usuário',[UserController::class,'store'])->name('cadastrar-user');
Route::get('/index',[UserController::class,'index'])->name('user-index');
Route::get('/Editar/{id}',[UserController::class,'edit'])->name('user-editar');
Route::put('/Editar/{id}',[UserController::class,'update'])->name('user-update');
Route::get('/Sair',[UserController::class,'logout'])->name('user-logout');

});