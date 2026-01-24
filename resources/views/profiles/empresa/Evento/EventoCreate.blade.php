@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">Criar Novo Evento</h1>
            <p class="text-gray-600">Preencha os dados abaixo para criar um novo evento na plataforma</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                <h3 class="text-red-800 font-semibold mb-2">Erros na validação:</h3>
                <ul class="text-red-700 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
                <p class="text-red-700">{{ session('error') }}</p>
            </div>
        @endif

        <!-- Formulário -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <form action="{{ route('evento-store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Seção 1: Informações Básicas -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-indigo-600 text-white mr-3 text-sm font-bold">1</span>
                        Informações Básicas
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Título -->
                        <div class="md:col-span-2">
                            <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">Título do Evento *</label>
                            <input 
                                type="text" 
                                name="titulo" 
                                id="titulo" 
                                required 
                                value="{{ old('titulo') }}"
                                class="w-full px-4 py-3 border @error('titulo') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                                placeholder="Ex: Festival de Música 2025">
                            @error('titulo') 
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
                            @enderror
                        </div>

                        <!-- Categoria -->
                        <div>
                            <label for="categoria" class="block text-sm font-medium text-gray-700 mb-2">Categoria *</label>
                            <select 
                                name="categoria" 
                                id="categoria" 
                                required
                                class="w-full px-4 py-3 border @error('categoria') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                                <option value="">Selecione uma categoria</option>
                                <option value="musica" {{ old('categoria') == 'musica' ? 'selected' : '' }}>Música</option>
                                <option value="teatro" {{ old('categoria') == 'teatro' ? 'selected' : '' }}>Teatro</option>
                                <option value="esportes" {{ old('categoria') == 'esportes' ? 'selected' : '' }}>Esportes</option>
                                <option value="negocios" {{ old('categoria') == 'negocios' ? 'selected' : '' }}>Negócios</option>
                                <option value="tecnologia" {{ old('categoria') == 'tecnologia' ? 'selected' : '' }}>Tecnologia</option>
                                <option value="arte" {{ old('categoria') == 'arte' ? 'selected' : '' }}>Arte</option>
                                <option value="educacao" {{ old('categoria') == 'educacao' ? 'selected' : '' }}>Educação</option>
                                <option value="outro" {{ old('categoria') == 'outro' ? 'selected' : '' }}>Outro</option>
                            </select>
                            @error('categoria') 
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
                            @enderror
                        </div>

                        <!-- Website -->
                        <div>
                            <label for="site" class="block text-sm font-medium text-gray-700 mb-2">Website</label>
                            <input 
                                type="url" 
                                name="site" 
                                id="site"
                                value="{{ old('site') }}"
                                class="w-full px-4 py-3 border @error('site') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                                placeholder="https://seusite.com">
                            @error('site') 
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Seção 2: Descrição -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-indigo-600 text-white mr-3 text-sm font-bold">2</span>
                        Descrição
                    </h2>

                    <div>
                        <label for="descrição" class="block text-sm font-medium text-gray-700 mb-2">Descrição do Evento *</label>
                        <textarea 
                            name="descrição" 
                            id="descrição" 
                            rows="5" 
                            required
                            class="w-full px-4 py-3 border @error('descrição') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            placeholder="Descreva detalhadamente seu evento...">{{ old('descrição') }}</textarea>
                        @error('descrição') 
                            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
                        @enderror
                    </div>
                </div>

                <!-- Seção 3: Data e Local -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-indigo-600 text-white mr-3 text-sm font-bold">3</span>
                        Data e Localização
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Data Início -->
                        <div>
                            <label for="data_inicio" class="block text-sm font-medium text-gray-700 mb-2">Data de Início *</label>
                            <input 
                                type="datetime-local" 
                                name="data_inicio" 
                                id="data_inicio" 
                                required
                                value="{{ old('data_inicio') }}"
                                class="w-full px-4 py-3 border @error('data_inicio') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                            @error('data_inicio') 
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
                            @enderror
                        </div>

                        <!-- Data Fim -->
                        <div>
                            <label for="data_fim" class="block text-sm font-medium text-gray-700 mb-2">Data de Fim</label>
                            <input 
                                type="datetime-local" 
                                name="data_fim" 
                                id="data_fim"
                                value="{{ old('data_fim') }}"
                                class="w-full px-4 py-3 border @error('data_fim') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                            @error('data_fim') 
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
                            @enderror
                        </div>

                        <!-- Localização -->
                        <div class="md:col-span-2">
                            <label for="localização" class="block text-sm font-medium text-gray-700 mb-2">Localização (Endereço Completo) *</label>
                            <input 
                                type="text" 
                                name="localização" 
                                id="localização" 
                                required
                                value="{{ old('localização') }}"
                                class="w-full px-4 py-3 border @error('localização') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                                placeholder="Rua, número, cidade, estado">
                            @error('localização') 
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Seção 4: Capacidade -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-indigo-600 text-white mr-3 text-sm font-bold">4</span>
                        Capacidade
                    </h2>

                    <div>
                        <label for="capacidade" class="block text-sm font-medium text-gray-700 mb-2">Número Máximo de Participantes *</label>
                        <input 
                            type="number" 
                            name="capacidade" 
                            id="capacidade" 
                            required 
                            min="1"
                            value="{{ old('capacidade') }}"
                            class="w-full px-4 py-3 border @error('capacidade') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            placeholder="Ex: 500">
                        @error('capacidade') 
                            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> 
                        @enderror
                    </div>
                </div>

                <!-- Seção 5: Mídia -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-indigo-600 text-white mr-3 text-sm font-bold">5</span>
                        Imagem e Flyer
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Imagem de Capa -->
                        <div>
                            <label for="imagem_capa" class="block text-sm font-medium text-gray-700 mb-2">Imagem de Capa</label>
                            <input 
                                type="file" 
                                id="imagem_capa" 
                                name="imagem_capa" 
                                accept="image/*"
                                class="w-full px-4 py-3 border @error('imagem_capa') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                            <p class="text-xs text-gray-500 mt-2">Máximo: 2MB (JPEG, PNG, JPG, GIF, SVG)</p>
                            @error('imagem_capa')
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                    
                    </div>
                </div>                    
                <!-- Botões -->
                <div class="flex gap-4 pt-8 border-t border-gray-200">
                    <button 
                        type="submit" 
                        class="flex-1 bg-indigo-600 text-white font-semibold py-3 rounded-lg hover:bg-indigo-700 transition duration-200 transform hover:scale-105">
                        Criar Evento
                    </button>
                    <a 
                        href="{{ route('empresa-index') }}" 
                        class="flex-1 bg-gray-200 text-gray-900 font-semibold py-3 rounded-lg hover:bg-gray-300 transition text-center">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>