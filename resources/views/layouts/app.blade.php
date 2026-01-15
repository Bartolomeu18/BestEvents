<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BestEvents - Sua plataforma de eventos')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        secondary: '#ec4899',
                        dark: '#1f2937',
                        light: '#f9fafb',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        h1, h2, h3 {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-light text-dark">
    <!-- Header/Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                    <span class="text-white text-lg font-bold">🎭</span>
                </div>
                <span class="text-2xl font-bold text-primary">EventHub</span>
            </div>

            <!-- Nav Links - Desktop -->
            <div class="hidden md:flex gap-8">
                <a href="#" class="text-dark hover:text-primary transition">Explorar</a>
                <a href="#" class="text-dark hover:text-primary transition">Categorias</a>
                <a href="#" class="text-dark hover:text-primary transition">Contato</a>
            </div>

            <!-- Auth Buttons -->
            <div class="flex gap-3">
                <a href="{{ route('login') }}" class="px-4 py-2 text-primary font-medium hover:bg-blue-50 rounded-lg transition">Login</a>
                <a href="{{route('tela-cadastro')}}" class="px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-blue-700 transition">Cadastro</a>
            </div>
        </nav>
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-dark text-white py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                            <span class="text-white text-lg font-bold">🎭</span>
                        </div>
                        <span class="text-xl font-bold">EventHub</span>
                    </div>
                    <p class="text-gray-400 text-sm">A plataforma perfeita para descobrir e participar de eventos incríveis.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Empresa</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Sobre</a></li>
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition">Carreira</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Suporte</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Central de Ajuda</a></li>
                        <li><a href="#" class="hover:text-white transition">Contato</a></li>
                        <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Legal</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Privacidade</a></li>
                        <li><a href="#" class="hover:text-white transition">Termos</a></li>
                        <li><a href="#" class="hover:text-white transition">Cookies</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">© 2026 EventHub. Todos os direitos reservados.</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white transition">Twitter</a>
                    <a href="#" class="text-gray-400 hover:text-white transition">Facebook</a>
                    <a href="#" class="text-gray-400 hover:text-white transition">Instagram</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
