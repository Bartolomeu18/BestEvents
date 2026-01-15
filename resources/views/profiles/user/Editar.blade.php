@extends('layouts.auth')

@section('content')
<div class="min-h-screen w-full bg-gradient-to-br from-violet-400 bg-indigo-600 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md ">
        <!-- Header do Formulário -->
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-slate-900 mb-2">BestEvents</h2>
            <p class="text-slate-600">edite os seus dados para que ficas pronto para os melhores eventos</p>
        </div>

        <!-- Card do Formulário -->
        <div class="bg-white rounded-xl shadow-lg p-8">
            @if (session('Error'))
                <span class="text-red-500 text-sm mt-1">{{session('Error')}}</span>

            @endif
            <form method="POST" action="{{ Route('user-update',$user->id) }}" class="space-y-5">
                @csrf
                @method('PUT')
                   @if(session('error'))
                 <span class="text-red-500 text-sm mt-1">{{session('Error')}}</span>
                @endif
                   
                <!-- Campo Nome -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">
                        Nome Completo
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name', $user->name) }}"
                        placeholder="João Silva"
                        required
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition placeholder-slate-400"
                    >
                    @error('name')
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
                        value="{{ old('email', $user->email) }}"
                        
                        placeholder="seu@email.com"
                        required
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition placeholder-slate-400"
                    >
                    @error('email')
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
                        required
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition placeholder-slate-400"
                    >
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo BI -->
                <div>
                    <label for="bi" class="block text-sm font-semibold text-slate-700 mb-2">
                        Bilhete de Identidade (BI)
                    </label>
                    <input 
                        type="text" 
                        id="bi" 
                        name="bi" 
                        value="{{ old('bi', $user->Bi) }}"
                        placeholder="123456789AB"
                        required
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition placeholder-slate-400"
                    >
                    @error('bi')
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
                        value="{{ old('telefone',$user->telefone) }}"
                        placeholder="+244 923 456 789"
                        required
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition placeholder-slate-400"
                    >
                    @error('telefone')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Campo Data de Nascimento -->
                <div>
                    <label for="data_nascimento" class="block text-sm font-semibold text-slate-700 mb-2">
                        Data de Nascimento
                    </label>
                    <input 
                        type="date" 
                        id="data_nascimento" 
                        name="data_nascimento" 
                        value="{{ old('data_nascimento',$user->data_nascimento) }}"
                        required
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                    >
                    @error('data_nascimento')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>


                <!-- Botão Cadastrar -->
                <button 
                    type="submit" 
                    class="w-full mt-6 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 rounded-lg transition duration-200 transform hover:scale-105"
                >
                    Editar dados
                </button>
            </form>

            <!-- Link para Login -->
            <div class="mt-6 text-center">
                <p class="text-slate-600">
                    Precisa de ajuda? 
                    <a href="" class="text-indigo-600 hover:text-indigo-700 font-semibold">
                        contacte-nos
                    </a>
                </p>
            </div>
        </div>

       
</div>
@endsection
