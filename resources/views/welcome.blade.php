<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Paradox Saves') }}</title>

    {{-- Fuente opcional, puedes quitarla si no la usas --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    {{-- Tailwind (asumiendo que ya lo tienes configurado con Vite) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 flex flex-col">

    {{-- HEADER / NAV --}}
    <header class="border-b border-slate-800">
        <div class="max-w-6xl mx-auto flex items-center justify-between px-4 py-4">
            {{-- LOGO / NOMBRE --}}
            <div class="flex items-center gap-2">
                <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-orange-500/10 border border-orange-500/40 text-orange-400 font-semibold text-sm">
                    PS
                </span>
                <div class="leading-tight">
                    <span class="block font-semibold text-sm">
                        {{ config('app.name', 'Paradox Saves') }}
                    </span>
                    <span class="block text-xs text-slate-400">
                        Comparte tus partidas de Paradox
                    </span>
                </div>
            </div>

            {{-- LINKS DERECHA --}}
            @if (Route::has('login'))
                <nav class="flex items-center gap-3 text-sm">
                    @auth
                        <a
                            href="{{ url('/panel/games') }}"
                            class="hidden sm:inline-flex items-center rounded-md border border-orange-500/70 bg-orange-500 text-slate-950 px-4 py-1.5 font-medium hover:bg-orange-400 transition"
                        >
                            Ir al panel
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-flex items-center rounded-md border border-slate-700 px-4 py-1.5 hover:border-slate-500 transition"
                        >
                            Iniciar sesión
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="hidden sm:inline-flex items-center rounded-md border border-orange-500/70 bg-orange-500 text-slate-950 px-4 py-1.5 font-medium hover:bg-orange-400 transition"
                            >
                                Crear cuenta
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    {{-- CONTENIDO PRINCIPAL --}}
    <main class="flex-1 flex items-center">
        <div class="max-w-6xl mx-auto w-full px-4 py-10 grid lg:grid-cols-2 gap-10">

            {{-- COLUMNA IZQUIERDA: HERO --}}
            <section class="flex flex-col justify-center">
                <p class="text-xs uppercase tracking-[0.2em] text-orange-400 mb-3">
                    comunidad de saves
                </p>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold mb-4">
                    Comparte tus campañas
                    <span class="text-orange-400">absurdamente rotas</span>
                    de Paradox.
                </h1>

                <p class="text-sm sm:text-base text-slate-300 mb-6 max-w-xl">
                    Sube tus archivos guardados de juegos como
                    <span class="font-medium text-slate-100">Crusader Kings, Europa Universalis, Hearts of Iron</span>
                    y más. Descubre partidas de otros jugadores, descárgalas
                    y continúa sus historias alternativas.
                </p>

                {{-- BOTONES PRINCIPALES --}}
                <div class="flex flex-wrap gap-3 mb-8 text-sm">
                    <a
                        href="{{ url('/panel/games') }}"
                        class="inline-flex items-center rounded-md border border-orange-500/80 bg-orange-500 text-slate-950 px-5 py-2 font-medium hover:bg-orange-400 transition"
                    >
                        Explorar partidas
                    </a>

                    @auth
                        <a
                            href="{{ url('/panel/games/create') }}"
                            class="inline-flex items-center rounded-md border border-slate-700 px-5 py-2 hover:border-slate-500 transition"
                        >
                            Subir mi save
                        </a>
                    @else
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-flex items-center rounded-md border border-slate-700 px-5 py-2 hover:border-slate-500 transition"
                            >
                                Crear cuenta
                            </a>
                        @endif
                    @endauth
                </div>

                {{-- "Juegos soportados" --}}
                <div class="mb-6">
                    <h2 class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400 mb-2">
                        Juegos soportados
                    </h2>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-xs">
                        <div class="rounded-lg border border-slate-800 bg-slate-900/60 px-3 py-2">
                            <div class="flex items-center justify-between mb-1">
                                <span class="font-semibold text-orange-300">CK3</span>
                                <span class="text-[10px] px-1.5 py-0.5 rounded-full bg-orange-500/10 text-orange-300">Dinastías</span>
                            </div>
                            <p class="text-[11px] text-slate-400 leading-snug">
                                Historias dinásticas absurdas.
                            </p>
                        </div>

                        <div class="rounded-lg border border-slate-800 bg-slate-900/60 px-3 py-2">
                            <div class="flex items-center justify-between mb-1">
                                <span class="font-semibold text-orange-300">EU4</span>
                                <span class="text-[10px] px-1.5 py-0.5 rounded-full bg-orange-500/10 text-orange-300">Mapas</span>
                            </div>
                            <p class="text-[11px] text-slate-400 leading-snug">
                                Mapas totalmente fuera de control.
                            </p>
                        </div>

                        <div class="rounded-lg border border-slate-800 bg-slate-900/60 px-3 py-2">
                            <div class="flex items-center justify-between mb-1">
                                <span class="font-semibold text-orange-300">HOI4</span>
                                <span class="text-[10px] px-1.5 py-0.5 rounded-full bg-orange-500/10 text-orange-300">Guerras</span>
                            </div>
                            <p class="text-[11px] text-slate-400 leading-snug">
                                Guerras imposibles pero ganadas.
                            </p>
                        </div>

                        <div class="rounded-lg border border-slate-800 bg-slate-900/60 px-3 py-2">
                            <div class="flex items-center justify-between mb-1">
                                <span class="font-semibold text-orange-300">Stellaris</span>
                                <span class="text-[10px] px-1.5 py-0.5 rounded-full bg-orange-500/10 text-orange-300">Galaxias</span>
                            </div>
                            <p class="text-[11px] text-slate-400 leading-snug">
                                Imperios galácticos y crisis finales.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- "Cómo funciona" --}}
                <div>
                    <h2 class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400 mb-2">
                        Cómo funciona
                    </h2>
                    <ol class="space-y-1 text-xs text-slate-300">
                        <li>1. Crea una cuenta o inicia sesión.</li>
                        <li>2. Sube tu archivo de save y selecciona el juego.</li>
                        <li>3. Añade título, descripción y etiquetas (Ironman, MP, mods...).</li>
                        <li>4. Comparte el enlace, deja que otros descarguen y jueguen tu partida.</li>
                    </ol>
                </div>
            </section>

            {{-- COLUMNA DERECHA: TARJETAS / MOCK DE SAVES --}}
            <section class="relative flex items-center justify-center">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-500/10 via-orange-500/0 to-purple-500/10 blur-3xl"></div>

                <div class="relative w-full max-w-md space-y-4">
                    {{-- Card grande: save destacado --}}
                    <div class="rounded-2xl border border-slate-800 bg-slate-900/80 p-4 shadow-xl shadow-black/40">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex flex-col">
                                <span class="text-xs uppercase tracking-[0.2em] text-slate-400">
                                    Save destacado
                                </span>
                                <span class="text-sm font-semibold">
                                    La Dinastía de los Jiménez
                                </span>
                            </div>
                            <span class="text-[11px] px-2 py-1 rounded-full bg-orange-500/15 text-orange-300 border border-orange-500/40">
                                CK3 · Ironman
                            </span>
                        </div>
                        <p class="text-xs text-slate-300 mb-3">
                            Desde un pequeño condado en el norte de Hispania hasta dominar medio mundo
                            gracias a asesinatos creativos y matrimonios muy poco sanos.
                        </p>
                        <div class="flex items-center justify-between text-[11px] text-slate-400">
                            <span>Año 1324 · 19 generaciones</span>
                            <span>Subido hace 3 horas</span>
                        </div>
                    </div>

                    {{-- Lista pequeña de últimos saves (fake) --}}
                    <div class="rounded-2xl border border-slate-800 bg-slate-900/70 p-4">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-semibold text-slate-200">
                                Últimas partidas subidas
                            </span>
                            <span class="text-[11px] text-slate-400">
                                Datos de ejemplo
                            </span>
                        </div>

                        <div class="space-y-2 text-xs">
                            <div class="flex items-center justify-between">
                                <div class="flex flex-col">
                                    <span class="font-medium">Gran campaña castellana</span>
                                    <span class="text-slate-400">EU4 · 1820 · WC casi</span>
                                </div>
                                <span class="px-2 py-0.5 rounded-full bg-slate-800 text-slate-200 text-[10px]">
                                    EU4
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex flex-col">
                                    <span class="font-medium">España sin aliados</span>
                                    <span class="text-slate-400">HOI4 · Difícil</span>
                                </div>
                                <span class="px-2 py-0.5 rounded-full bg-slate-800 text-slate-200 text-[10px]">
                                    HOI4
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex flex-col">
                                    <span class="font-medium">Hegemonía madrileña</span>
                                    <span class="text-slate-400">Stellaris · Crisis 25x</span>
                                </div>
                                <span class="px-2 py-0.5 rounded-full bg-slate-800 text-slate-200 text-[10px]">
                                    STEL
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Chip informativo --}}
                    <div class="flex items-center gap-2 text-[11px] text-slate-400">
                        <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-orange-500/15 text-orange-300 border border-orange-500/40 text-xs px-2 py-0.5">
                            i
                        </span>
                        <span>
                            Mario del futuro recuerda cambiar estas tarjetas se pueden rellenar con datos reales de tu base de datos.
                        </span>
                    </div>
                </div>
            </section>
        </div>
    </main>

</body>
</html>
