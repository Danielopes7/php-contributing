<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Meu Projeto Laravel')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @vite('resources/css/app.css')

    @livewireStyles
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <a class="text-xl font-bold text-gray-800" href="{{ url('/') }}">Meu Projeto</a>
                <div class="hidden md:flex space-x-4">
                    <a class="text-gray-600 hover:text-gray-900" href="{{ url('/pedidos') }}">Pedidos</a>
                    <!-- Adicione mais links conforme necessário -->
                </div>
                <div class="md:hidden">
                    <button class="text-gray-600 focus:outline-none focus:text-gray-900">
                        <!-- Ícone do menu responsivo -->
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-white shadow-md py-4 mt-auto">
        <div class="container mx-auto text-center text-gray-600">
            <p>&copy; {{ date('Y') }} Meu Projeto. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
</body>
</html>
