@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="flex h-screen bg-gray-50">
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-lg">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-indigo-600">BestEvents</h2>
            <p class="text-sm text-gray-500 mt-1">Gestão de Eventos</p>
        </div>

               <nav class="mt-8">
            <a href="{{ route('empresa-index') }}" class="flex items-center px-6 py-4 text-gray-700 hover:bg-gray-50">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                <span class="font-medium">Dashboard</span>
            </a>

            <a href="{{ route('evento-index') }}" class="flex items-center px-6 py-4 text-gray-600 hover:bg-gray-50  bg-indigo-50 border-l-4 border-indigo-600">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
                <span>Meus Eventos</span>
            </a>

            <a href="{{ route('evento-cadastrar') }}" class="flex items-center px-6 py-4 text-gray-600 hover:bg-gray-50">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Criar Evento</span>
            </a>

            <a href="{{ route('empresa-edit',['id'=>$empresa->id]) }}" class="flex items-center px-6 py-4 text-gray-600 hover:bg-gray-50">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span>Editar Dados</span>
            </a>

            <a href="{{ route('empresa-logout',['id'=>$empresa->id]) }}" class="flex items-center px-6 py-4 text-gray-600 hover:bg-gray-50">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span>Sair</span>
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 overflow-auto">
        <!-- Top Header -->
        <div class="bg-white shadow-sm border-b border-gray-200">
            <div class="px-8 py-6 flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Meus Eventos</h1>
                    <p class="text-gray-500 mt-1">Gerencie todos os seus eventos</p>
                </div>
                <a href="{{ route('evento-cadastrar')}}" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-medium">
                    + Novo Evento
                </a>
            </div>
        </div>

        <!-- Content Area -->
        <div class="p-8">
            <!-- Filtros -->
            <div class="mb-8 flex gap-4 items-center">
                <input 
                    type="text" 
                    placeholder="Buscar por nome do evento..." 
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                >
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    <option value="">Todos os Status</option>
                    <option value="ativo">Ativo</option>
                    <option value="planejado">Planejado</option>
                    <option value="finalizado">Finalizado</option>
                    <option value="cancelado">Cancelado</option>
                </select>
            </div>

            <!-- View Toggle (Grid/List) -->
            <div class="mb-6 flex gap-2">
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium">
                    <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 3h8v8H3V3zm10 0h8v8h-8V3zM3 13h8v8H3v-8zm10 0h8v8h-8v-8z"></path>
                    </svg>
                    Grid
                </button>
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-300 transition">
                    <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Lista
                </button>
            </div>

            <!-- Grid View - Event Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($eventos as $evento )
             <!-- Card 1 -->
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                   <!--  <div class="h-48 bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center">
                        <span class="text-white text-4xl font-bold">🎵</span>
                    </div> -->
                    <img src="{{ asset('storage/' . $evento->imagem_capa) }}" alt="{{ $evento->titulo }}" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-lg font-bold text-gray-900">{{ $evento->titulo }}</h3>
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">{{ $evento->status}}</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4">{{ $evento->descrição }}</p>
                        
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $evento->data_inicio }}
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $evento->localização }}
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $evento->capacidade }}
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <a href="{{ route('Evento-edit',['id'=>$evento->id]) }}" class="flex-1 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition text-sm font-medium">
                                Editar
                            </a>
                            <a href="{{ route('Evento-delete',['id'=>$evento->id]) }}" class="flex-1 px-4 py-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition text-sm font-medium">
                                Deletar
</a>
                        </div>
                    </div>
                </div>
            @endforeach  
           
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center items-center gap-2">
                <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">Anterior</button>
                <button class="px-3 py-2 bg-indigo-600 text-white rounded-lg">1</button>
                <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">2</button>
                <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">3</button>
                <button class="px-3 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50">Próximo</button>
            </div>
        </div>
    </div>
</div>
