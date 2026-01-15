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
<section class="py-16">
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
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-4">Eventos Recentes</h2>
        <p class="text-gray-600 mb-12">Os eventos mais novos e legais da plataforma</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $recentEvents = [
                    [
                        'title' => 'Festival de Música Eletrônica 2024',
                        'date' => '15 de Jan',
                        'location' => 'São Paulo, SP',
                        'price' => 'R$ 89,90',
                        'image' => 'url(https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=500&h=300&fit=crop)',
                        'sales' => '450 vendidos'
                    ],
                    [
                        'title' => 'Workshop: Desenvolvimento Web Moderno',
                        'date' => '20 de Jan',
                        'location' => 'Rio de Janeiro, RJ',
                        'price' => 'R$ 149,90',
                        'image' => 'url(https://images.unsplash.com/photo-1552664730-d307ca884978?w=500&h=300&fit=crop)',
                        'sales' => '120 vendidos'
                    ],
                    [
                        'title' => 'Show de Stand-up Comedy',
                        'date' => '25 de Jan',
                        'location' => 'Belo Horizonte, MG',
                        'price' => 'R$ 59,90',
                        'image' => 'url(https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=500&h=300&fit=crop)',
                        'sales' => '280 vendidos'
                    ],
                ];
            @endphp
            
            @foreach($recentEvents as $event)
            <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition transform hover:-translate-y-1">
                <div 
                    class="h-48 bg-cover bg-center" 
                    style="background-image: {{ $event['image'] }}"
                ></div>
                <div class="p-6">
                    <h3 class="font-bold text-lg mb-3">{{ $event['title'] }}</h3>
                    <div class="space-y-2 text-sm text-gray-600 mb-4">
                        <p>📅 {{ $event['date'] }}</p>
                        <p>📍 {{ $event['location'] }}</p>
                        <p class="text-primary font-semibold">{{ $event['sales'] }}</p>
                    </div>
                    <div class="flex justify-between items-center pt-4 border-t">
                        <span class="text-xl font-bold text-primary">{{ $event['price'] }}</span>
                        <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Mais Detalhes</button>
                    </div>
                </div>
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
