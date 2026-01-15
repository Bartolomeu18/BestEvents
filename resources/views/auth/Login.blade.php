@extends('layouts.auth')

@section('content')


<div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <div class="text-center mb-6">
            <!--<img src="{{ asset('img/ddk-logo-rbg.png') }}" alt="DDK-Motos" class="w-16 h-16 mx-auto mb-2">-->
            <div class="flex justify-center mb-2">
                <div class="w-9 h-9 bg-indigo-600 rounded-lg flex items-center justify-center">
                    <span class="text-white text-lg font-bold">🎭</span>
                </div>
            </div>
            <h2 class="text-2xl font-bold text-indigo-600">BestEvents</h2>
            <p class="text-sm text-gray-600">encontre os melhores eventos</p>
        </div>

        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login-attempt') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required autofocus
                       class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Senha -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                <input type="password" name="password" id="password" required
                       class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Botão de login -->
            <div class="mb-4">
                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                    Entrar
                </button>
            </div>

            <!-- Link de recuperação -->
            <div class="text-center text-sm text-gray-600">
              <a href="#" class="hover:underline">Esqueceu a senha?</a>
            </div>
        </form>
    </div>

@endsection
