@extends('layouts.app')

@section('title', 'EventHub - Descubra eventos incríveis')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-primary to-secondary text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-4">Descubra eventos incríveis</h1>
        <p class="text-lg md:text-xl mb-8 opacity-90">Encontre shows, conferências, festas e muito mais perto de você</p>
        
        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto flex flex-col md:flex-row gap-3">
            <input 
                type="text" 
                placeholder="Busque eventos, artistas ou categorias..." 
                class="flex-1 px-6 py-3 rounded-lg text-dark focus:outline-none focus:ring-4 focus:ring-secondary"
            >
            <button class="bg-dark text-white px-8 py-3 rounded-lg font-medium hover:bg-gray-800 transition">
                Buscar
            </button>
        </div>
    </div>
</section>

<!-- Categorias Section -->
<section class="py-16" id="categoria">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-12">Categorias Populares</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @php
                $categories = [
                    ['icon' => '🎵', 'name' => 'Música'],
                    ['icon' => '🎭', 'name' => 'Teatro'],
                    ['icon' => '🏃', 'name' => 'Esportes'],
                    ['icon' => '💼', 'name' => 'Negócios'],
                ];
            @endphp
            
            @foreach($categories as $category)
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-lg transition cursor-pointer text-center">
                <div class="text-4xl mb-4">{{ $category['icon'] }}</div>
                <h3 class="font-semibold text-lg">{{ $category['name'] }}</h3>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Eventos Recentes -->
<section class="py-16 bg-white" id="explorar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-4">Explorar Eventos Recentes</h2>
        <p class="text-gray-600 mb-12">Os eventos mais novos e legais da plataforma</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($eventosRecentes as $evento)
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
                       
                    <a href="https://wa.me/{{ $evento->empresa->telefone}}" target="_blank" class="flex-1 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition text-sm font-medium">
                        Contatar
                    </a> </div>
                    </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Eventos Mais Procurados -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-4">Mais Procurados</h2>
        <p class="text-gray-600 mb-12">Os eventos que estão em alta no momento</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @php
                $trendingEvents = [
                    [
                        'title' => 'Conferência de Inovação Tech 2024',
                        'date' => '10 de Fev',
                        'location' => 'São Paulo, SP',
                        'price' => 'R$ 249,90',
                        'image' => 'url(https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&h=400&fit=crop)',
                        'trending' => '🔥 2.500+ visualizações'
                    ],
                    [
                        'title' => 'Maratona de Corrida 10km',
                        'date' => '5 de Fev',
                        'location' => 'Curitiba, PR',
                        'price' => 'R$ 79,90',
                        'image' => 'url(https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=800&h=400&fit=crop)',
                        'trending' => '🔥 1.800+ visualizações'
                    ],
                ];
            @endphp
            
            @foreach($trendingEvents as $event)
            <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition flex flex-col md:flex-row">
                <div 
                    class="h-48 md:h-auto md:w-1/3 bg-cover bg-center flex-shrink-0" 
                    style="background-image: {{ $event['image'] }}"
                ></div>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="text-secondary font-bold mb-2">{{ $event['trending'] }}</div>
                        <h3 class="font-bold text-xl mb-3">{{ $event['title'] }}</h3>
                        <div class="space-y-2 text-sm text-gray-600">
                            <p>📅 {{ $event['date'] }}</p>
                            <p>📍 {{ $event['location'] }}</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center pt-4 mt-4 border-t">
                        <span class="text-2xl font-bold text-primary">{{ $event['price'] }}</span>
                        <button class="bg-secondary text-white px-6 py-2 rounded-lg hover:bg-pink-600 transition">Mais Detalhes</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="bg-primary text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Quer organizar um evento?</h2>
        <p class="text-lg mb-8 opacity-90">Publique seu evento e alcance milhares de pessoas interessadas</p>
        <a href="{{ route('cadastro-empresa') }}" class="bg-white text-primary px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition text-lg">
            Criar Evento
        </a>
    </div>
</section>
@endsection
