@vite( ['resources/css/app.css', 'resources/js/app.js', 'resources/js/grafico.js'])
<div class="flex h-screen bg-gray-50">
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-lg">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-indigo-600">BestEvents</h2>
            <p class="text-sm text-gray-500 mt-1">Gestão de Eventos</p>
        </div>

        <nav class="mt-8">
            <a href="{{ route('empresa-index') }}" class="flex items-center px-6 py-4 text-gray-700 bg-indigo-50 border-l-4 border-indigo-600">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                <span class="font-medium">Dashboard</span>
            </a>

            <a href="{{ route('evento-index') }}" class="flex items-center px-6 py-4 text-gray-600 hover:bg-gray-50">
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
                    <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
                    <p class="text-gray-500 mt-1">Bem-vindo de volta, BestEvents</p>
                </div>
                <div class="flex items-center gap-4">
                    <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                        + Novo Evento
                    </button>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="p-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Total de Eventos</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{$totalEventos}}</p>
                        </div>
                        <div class="bg-blue-100 rounded-full p-3">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Ingressos Vendidos</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">342</p>
                        </div>
                        <div class="bg-green-100 rounded-full p-3">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Eventos Activos</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{$eventosActivo}}</p>
                        </div>
                        <div class="bg-purple-100 rounded-full p-3">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Taxa Ocupação</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">78%</p>
                        </div>
                        <div class="bg-orange-100 rounded-full p-3">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Main Chart -->
                <div class="lg:col-span-2 bg-white rounded-lg shadow p-6">
                    <div class="flex justify-between items-center mb-3">
                        <h2 class="text-lg font-semibold text-gray-900">]
                            
                        
                        
                        
                        (Últimos 6 Meses)</h2>
                    </div>
                    <div class="h-96 flex items-end gap-2">
                    <canvas id="meuGrafico"></canvas>
                    </div>
                </div>

                <!-- Side Card -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-6">Top Eventos</h2>
                    <div class="space-y-4">
                        <div class="border-l-4 border-indigo-600 pl-4">
                            <p class="font-medium text-gray-900">Festival de Música</p>
                            <p class="text-sm text-gray-500">142 ingressos</p>
                        </div>
                        <div class="border-l-4 border-green-500 pl-4">
                            <p class="font-medium text-gray-900">Conferência Tech</p>
                            <p class="text-sm text-gray-500">98 ingressos</p>
                        </div>
                        <div class="border-l-4 border-pink-500 pl-4">
                            <p class="font-medium text-gray-900">Workshop Design</p>
                            <p class="text-sm text-gray-500">67 ingressos</p>
                        </div>
                        <div class="border-l-4 border-yellow-500 pl-4">
                            <p class="font-medium text-gray-900">Palestra Business</p>
                            <p class="text-sm text-gray-500">45 ingressos</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Events Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Eventos Recentes</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
               @foreach ($eventosRecentes as $eventoRecente )
               
               @endforeach
                    <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nome do Evento</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Data</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Ingressos</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Receita</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Status</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{$eventoRecente->titulo}}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{$eventoRecente->data_inicio}}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{$eventoRecente->capacidade}}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">R$ 7.100</td>
                                <td class="px-6 py-4"><span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">{{$eventoRecente->status}}</span></td>
                                <td class="px-6 py-4 text-sm">
                                    <a href="{{ route('Evento-edit',['id'=>$eventoRecente->id]) }}" class="text-indigo-600 hover:text-indigo-700 font-medium">Editar</button>
                                </td>
                            </tr>
                         </tbody>
                    </table>
                </div>
            </div>

            <!-- Company Info Section -->
            <div class="mt-8 bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-6">Informações da Empresa</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nome da Empresa</label>
                            <p class="text-lg text-gray-900">{{ $empresa->nome }}</p>
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <p class="text-lg text-gray-900">{{ $empresa->email }}</p>
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
                            <p class="text-lg text-gray-900">{{ $empresa->telefone }}</p>
                        </div>
                    </div>
                    <div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">NIF</label>
                            <p class="text-lg text-gray-900">{{ $empresa->nif }}</p>
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Id da Empresa</label>
                            <p class="text-lg text-gray-900">{{ $empresa->id }}</p>
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Membro desde</label>
                            <p class="text-lg text-gray-900">{{ $empresa->created_at }}</p>
                        </div>
                    </div>
                </div>
               <!-- Botão de Editar -->
            <div class="flex gap-3">
                <a href="{{ Route('empresa-edit',['id' => $empresa->id ]) }}" class="px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition">
                    Editar Perfil
                </a> 
                <a href="{{ Route('empresa-logout',['id'=> $empresa->id]) }}" class="px-6 py-3 border-2 border-red-300 text-red-700 font-medium rounded-lg hover:bg-red-50 transition">
                    Eliminar Conta
                </a>
            </div>
            </div>
        </div>
    </div>
    <script>
    window.dadosGrafico = @json($dadosGrafico);
</script>
</div>

