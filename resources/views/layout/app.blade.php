<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi App Laravel')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- CSS (Tailwind con Vite) --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-950 text-slate-100">

    {{-- Navbar --}}
    <nav class="border-b border-slate-800 bg-slate-950/95 backdrop-blur">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center relative">

            {{-- Logo / nombre --}}
            <a href="{{ url('/') }}" class="flex items-center gap-2">
                <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-orange-500/10 border border-orange-500/40 text-orange-400 font-semibold text-sm">
                    MA
                </span>
                <span class="text-lg font-semibold tracking-tight">
                    MiApp
                </span>
            </a>

            {{-- Links derecha --}}
            <div class="flex items-center gap-2 text-sm">
                <a href="{{ url('/') }}"
                   class="px-3 py-1 rounded-md text-slate-200 hover:text-orange-400 hover:bg-slate-900 transition">
                    Inicio
                </a>

                <a href="{{ route('games.index') }}"
                   class="px-3 py-1 rounded-md text-slate-200 hover:text-orange-400 hover:bg-slate-900 transition">
                    Juegos
                </a>

                {{-- Dropdown usuario --}}
                <div class="relative inline-block text-left">
                    <button id="menu-button"
                            class="flex items-center focus:outline-none focus-visible:ring-2 focus-visible:ring-orange-500/60 rounded-md">
                        <img src="{{ asset('img/logo.webp') }}" alt="User"
                             class="h-9 w-auto rounded-full border border-slate-700 object-cover">
                        <img src="{{ asset('img/arrow.svg') }}" alt="arrow"
                             class="h-2 w-auto ml-2 transition-transform duration-150 contrast-0" id="arrow">
                    </button>

                    <div id="menu"
                         class="absolute right-0 top-full mt-2 w-48 origin-top-right bg-slate-900 border border-slate-800 rounded-lg shadow-xl shadow-black/40 hidden z-20">
                        @if(Auth::check())
                            <p class="block px-4 py-2 text-sm text-slate-200 border-b border-slate-800">
                                {{ Auth::user()->name }}
                            </p>
                        @endif

                        @if(!Auth::check())
                            <a href="{{ url('/login') }}"
                               class="block px-4 py-2 text-sm text-slate-200 hover:bg-slate-800 hover:text-orange-300 transition">
                                Iniciar sesión
                            </a>
                        @endif

                        <a href="#"
                           class="block px-4 py-2 text-sm text-slate-200 hover:bg-slate-800 hover:text-orange-300 transition">
                            Configuración
                        </a>

                        @if(Auth::check())
                            <a href="{{ url('/logout') }}"
                               class="block px-4 py-2 text-sm text-slate-200 hover:bg-slate-800 hover:text-orange-300 transition">
                                Cerrar sesión
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{-- Contenido principal --}}
    <main class="max-w-7xl mx-auto px-4 pt-6 pb-24">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="py-4 text-center text-xs text-slate-400 border-t border-slate-800 bg-slate-950/95 backdrop-blur fixed bottom-0 left-0 right-0">
        &copy; {{ date('Y') }} Mi App Laravel. Todos los derechos reservados.
    </footer>

    <script>
        const menuButton = document.getElementById('menu-button');
        const menu = document.getElementById('menu');
        const arrow = document.getElementById('arrow');

        if (menuButton && menu && arrow) {
            menuButton.addEventListener('click', () => {
                menu.classList.toggle('hidden');
                arrow.classList.toggle('rotate-180');
            });

            // Cerrar al hacer click fuera
            document.addEventListener('click', (e) => {
                if (!menuButton.contains(e.target) && !menu.contains(e.target)) {
                    if (!menu.classList.contains('hidden')) {
                        menu.classList.add('hidden');
                        arrow.classList.remove('rotate-180');
                    }
                }
            });
        }
    </script>
</body>
</html>
