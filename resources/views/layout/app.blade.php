<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi App Laravel')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- CSS (ejemplo con Tailwind) --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-900">

    {{-- Navbar simple --}}
    <nav class="bg-white shadow mb-4">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-bold">MiApp</a>
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="px-3">Inicio</a>
                <a href="{{ url('/panel') }}" class="px-3">Panel</a>
                <div class="relative inline-block text-left">
                    <button id="menu-button" class="flex items-center focus:outline-none">
                        <img src="{{ asset('img/logo.webp') }}" alt="User" class="h-10 w-auto mr-[-15px]">
                        <img src="{{ asset('img/arrow.svg') }}" alt="arrow" class="h-2 w-auto ml-2  " id="arrow">
                    </button>
                </div>
            </div>
            <div id="menu"
                class="absolute right-4 mt-40 w-48 origin-top-right bg-white border border-gray-200 rounded-lg shadow-lg hidden">
               @if(Auth::check())
                <p class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    {{ Auth::user()->name }}
                </p>
                @endif
                @if(!Auth::check())
                <a href="{{ url('/login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    Iniciar sesión
                </a>
                @endif
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    Configuración
                </a>
                @if(Auth::check())
                <a href="{{ url('/logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    Cerrar sesión
                </a>
                @endif
            </div>
        </div>
    </nav>

    {{-- Contenido principal --}}
    <main class="max-w-7xl mx-auto px-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="mt-10 py-6 text-center text-sm text-gray-500 absolute bottom-0 left-0 right-0">
        &copy; {{ date('Y') }} Mi App Laravel. Todos los derechos reservados.
    </footer>

    {{-- JS (ejemplo con Vite) --}}
    @vite('resources/js/app.js')
</body>
<script>
    const menuButton = document.getElementById('menu-button');
    const menu = document.getElementById('menu');
    const arrow = document.querySelector('#arrow');
    menuButton.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    });
</script>

</html>
