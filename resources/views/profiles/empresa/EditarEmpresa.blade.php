@extends('layouts.auth')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-violet-400 bg-indigo-600 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md ">
        <!-- Header do Formulário -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-slate-900 mb-2">Editar dados da Empresa</h2>
            <p class="text-slate-600">Editar dados da conta e crie os melhores Eventos</p>
        </div>

        <!-- Card do Formulário -->
        <div class="bg-white rounded-xl shadow-lg p-8">
            <form method="POST" action="{{ Route('empresa-update',['id' => $empresa->id]) }}" class="space-y-5">
                @csrf
                   @if(session('error'))
                 <span class="text-red-500 text-sm mt-1">{{session('error')}}</span>
                @endif
                   
                <!-- Campo Nome -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">
                        Nome da Empresa
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="nome" 
                        value="{{ old('nome',$empresa->nome) }}"
                        placeholder="Espaço Eventos"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition placeholder-slate-400"
                    >
                    @error('nome')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">
                        Email
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email',$empresa->email) }}"
                        placeholder="EspacoEventos@email.com"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition placeholder-slate-400"
                    >
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo NIF -->
                <div>
                    <label for="nif" class="block text-sm font-semibold text-slate-700 mb-2">
                        NIF
                    </label>
                    <input 
                        type="text" 
                        id="nif" 
                        name="nif" 
                        value="{{ old('nif', $empresa->nif) }}"
                        placeholder="123456789AB"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition placeholder-slate-400"
                    >
                    @error('nif')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Telefone -->
                <div>
                    <label for="telefone" class="block text-sm font-semibold text-slate-700 mb-2">
                        Telefone
                    </label>
                    <input 
                        type="tel" 
                        id="telefone" 
                        name="telefone" 
                        value="{{ old('telefone',$empresa->telefone) }}"
                        placeholder="+244 923 456 789"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition placeholder-slate-400"
                    >
                    @error('telefone')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                        <label for="logo" class="block text-sm font-semibold text-slate-700 mb-2">
                            Logo da Empresa
                        </label>
                        <input 
                            type="file" 
                            id="logo" 
                            name="logo" 
                            accept="image/*"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        >
                        @error('logo')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
              
                   <!-- Campo Senha -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">
                        Senha
                    </label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Mínimo 8 caracteres"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition placeholder-slate-400"
                    >
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Checkbox Termos
                <div class="flex items-start">
                    <input 
                        type="checkbox" 
                        id="terms" 
                        name="terms" 
                        required
                        class="mt-1 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500"
                    >
                    <label for="terms" class="ml-2 text-sm text-slate-600">
                        Concordo com os <a href="#" class="text-indigo-600 hover:text-indigo-700 font-semibold">Termos de Serviço</a>
                    </label>
                </div> -->

                <!-- Botão Cadastrar -->
                <button 
                    type="submit" 
                    class="w-full mt-6 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 rounded-lg transition duration-200 transform hover:scale-105"
                >
                    Editar Conta
                </button>
            </form>

            <!-- Link para Login 
            <div class="mt-6 text-center">
                <p class="text-slate-600">
                    Já tem uma conta? 
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 font-semibold">
                        Faça login aqui
                    </a>
                </p>
            </div>--> 
         <!-- Footer Adicional -->
        <div class="mt-6 text-center text-slate-300 text-sm">
            <p>Precisa de ajuda? <a href="#" class="text-indigo-500 hover:text-indigo-800">Contate-nos</a></p>
        </div>
        </div>


    </div>
</div>
@endsection
