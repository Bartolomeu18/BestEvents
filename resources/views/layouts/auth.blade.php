<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'BestEvents - Sua plataforma de eventos')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

@yield('content')

</body>
</html>