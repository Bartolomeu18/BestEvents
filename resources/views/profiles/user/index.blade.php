@extends('layouts.authUser')

@section('content')
<div class="flex gap-6 max-w-7xl mx-auto px-4 py-8">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 lg:w-72">
        <!-- Avatar e Info do Usuário 
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <div class="flex flex-col items-center text-center">
                Avatar 
                @if(auth()->user()->avatar)
                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar" class="w-24 h-24 rounded-full object-cover mb-4">
                @else
                    <div class="w-24 h-24 rounded-full bg-indigo-600 text-white flex items-center justify-center text-2xl font-bold mb-4">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                @endif

                <h3 class="text-xl font-bold text-gray-900">{{ auth()->user()->name }}</h3>
                <p class="text-gray-500 text-sm">{{ auth()->user()->email }}</p>
            </div>
        </div>-->

        <!-- Menu de Navegação -->
        <nav class="space-y-2 bg-white rounded-lg shadow-sm p-4 flex flex-col">

            <a href="" class="w-full text-left px-4 py-3 rounded-lg bg-indigo-50 text-indigo-600 font-medium  hover:bg-indigo-100 transition">
                <span class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Meu Perfil
                </span>
            </a>

            <a href="" class="w-full text-left px-4 py-3 rounded-lg text-gray-700 font-medium hover:bg-gray-500 transition">
                <span class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Histórico de Eventos
                </span>
            </a>

            <a href="" class="w-full text-left px-4 py-3 rounded-lg text-gray-700 font-medium hover:bg-gray-100 transition">
                <span class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2 1m2-1l-2-1m2 1v2.5"></path>
                    </svg>
                    Eventos que Participei
                </span>
            </a>

            <a href="" class="w-full text-left px-4 py-3 rounded-lg text-gray-700 font-medium hover:bg-gray-100 transition">
                <span class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                    Meus Favoritos
                </span>
            </a>

            <a href="" class="w-full text-left px-4 py-3 rounded-lg text-gray-700 font-medium hover:bg-gray-100 transition">
                <span class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Configurações
                </span>
            </a>

            <!-- Divider -->
            <div class="border-t border-gray-200 my-4"></div>


                <a href="{{ Route( 'user-logout') }}" class="px-6 py-3 text-indigo-600  font-medium rounded-lg hover:bg-indigo-100 transition">
                    <span class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Sair
                    </span>
</a>
         
        </nav>
    </aside>

    <!-- Conteúdo Principal -->
    <main class="flex-1">
        <div class="bg-white rounded-lg shadow-sm p-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Informações do Perfil</h2>

            <!-- Grid de Informações -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Nome -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nome Completo</label>
                    <p class="text-lg text-gray-900">{{ auth()->user()->name }}</p>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <p class="text-lg text-gray-900">{{ auth()->user()->email }}</p>
                </div>

                <!-- BI -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Bilhete de Identidade</label>
                    <p class="text-lg text-gray-900">{{ auth()->user()->Bi ?? 'Não cadastrado' }}</p>
                </div>

                <!-- Telefone -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
                    <p class="text-lg text-gray-900">{{ auth()->user()->telefone ?? 'Não cadastrado' }}</p>
                </div>

                <!-- Data de Nascimento -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Data de Nascimento</label>
                    <p class="text-lg text-gray-900">{{ auth()->user()->data_nascimento ? \Carbon\Carbon::parse(auth()->user()->data_nascimento)->format('d/m/Y') : 'Não cadastrado' }}</p>
                </div>

                <!-- Data de Cadastro -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Membro Desde</label>
                    <p class="text-lg text-gray-900">{{ auth()->user()->created_at->format('d/m/Y') }}</p>
                </div>
            </div>

            <!-- Botão de Editar -->
            <div class="flex gap-3">
                <a href="{{ Route('user-editar',['id' => auth()->user()->id ]) }}" class="px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition">
                    Editar Perfil
                </a> 
                <a href="" class="px-6 py-3 border-2 border-red-300 text-red-700 font-medium rounded-lg hover:bg-red-50 transition">
                    Eliminar Conta
                </a>
            </div>
        </div>
    </main>
</div>

<style>
    @media (max-width: 768px) {
        aside {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            width: 100%;
            margin-bottom: 2rem;
        }

        main {
            grid-column: 1 / -1;
        }
    }
</style>
@endsection
