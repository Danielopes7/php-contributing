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
<body class="flex flex-col min-h-screen">
    <div class="bg-ink-400 flex flex-col min-h-screen antialiased text-white">
        <header class="w-full py-4 border-b border-ink-200 bg-ink-400 border-black ">
            <nav class="flex items-center justify-center flex-wrap">
                <a href="/" class="flex items-center text-gray-700 font-bold">
                    <!-- <img src="/_nuxt/gfi-logo-white.c30e7ffd.svg" alt="Good First Issue" class="h-12"> -->
                     <span>Good first issues</span>
                </a>
                <span class="text-2xl cursor-pointer">
                    <span class="font-normal ml-2 mr-1 text-slate">/</span>
                    <span class="font-semibold text-juniper">PHP</span>
                </span>
            </nav>
        </header>
        <main class="flex flex-1">
            @yield('content')
        </main>
    </div>

    <footer class="bg-white shadow-md py-4 mt-auto">
        <div class="container mx-auto text-center text-gray-600">
            <p>&copy; {{ date('Y') }} Meu Projeto. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
</body>
</html>
