<section class="max-w-6xl mx-auto px-4 py-10">
    {{-- CABECERA + BUSCADOR --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <p class="text-xs uppercase tracking-[0.2em] text-orange-400 mb-1">
                explorar partidas
            </p>
            <h1 class="text-xl sm:text-2xl font-semibold">
                Navega por las campañas de la comunidad
            </h1>
            <p class="text-xs sm:text-sm text-slate-400">
                Filtra por título, autor o juego y descarga los saves que más te llamen.
            </p>
        </div>

        {{-- Toolbar (botón Crear juego, etc.) --}}
        @if(!empty($toolbar))
            <div class="flex items-center gap-2">
                {{ $toolbar }}
            </div>
        @endif
    </div>

    {{-- BUSCADOR --}}
    <form
        action="{{ url()->current() }}"
        method="GET"
        class="w-full bg-slate-900/80 border border-slate-800 rounded-2xl
               px-4 sm:px-5 py-3 sm:py-4 shadow-lg shadow-black/40 mb-6"
    >
        <div class="flex flex-wrap items-center gap-3">

            {{-- Input de búsqueda --}}
            <div class="relative flex-1 min-w-[220px]">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">
                    <img src="{{ asset('img/buscar.png') }}" alt="Search icon" class="w-4 h-4">
                </span>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Buscar partidas por título, autor o juego..."
                    class="w-full rounded-xl bg-slate-950/60 border border-slate-800
                           pl-9 pr-4 py-2.5 text-sm text-slate-100 placeholder-slate-500
                           focus:outline-none focus:ring-2 focus:ring-orange-500/50
                           focus:border-orange-500 transition"
                >
            </div>

            {{-- Botón buscar --}}
            <div class="flex items-center gap-2 text-sm text-slate-300">
                <button type="submit" class="inline-flex items-center justify-center gap-2
                   rounded-xl bg-orange-500 px-5 py-2.5 text-sm font-semibold
                   text-slate-950 shadow-md shadow-orange-500/30
                   hover:bg-orange-400 hover:shadow-lg
                   focus:outline-none focus:ring-2 focus:ring-orange-500/60
                   focus:ring-offset-2 focus:ring-offset-slate-900
                   transition">
                    Buscar
                </button>
            </div>
        </div>
    </form>

    {{-- LISTA DE PARTIDAS --}}
    <ul class="space-y-4">
        @foreach ($items as $item)
            <li class="w-full rounded-2xl border border-slate-800 bg-slate-900/80
                       px-4 sm:px-5 py-4 sm:py-5 flex flex-col lg:flex-row gap-4
                       shadow-md shadow-black/40">
                {{-- Izquierda: imagen + info --}}
                <div class="flex-1 flex gap-4">
                    {{-- Imagen + etiqueta de juego --}}
                    <div class="relative flex-shrink-0">
                        <h2 class="absolute left-2 top-2 text-[11px] font-semibold text-orange-300
                                   border border-orange-500/40 rounded-md px-2 py-0.5
                                   bg-slate-950/80">
                            {{ $item->game_name->name }}
                        </h2>

                        <img
                            class="h-32 w-44 sm:h-36 sm:w-52 rounded-xl object-cover
                                   border border-slate-800
                                   {{ !$item->image ? 'bg-gradient-to-tr from-slate-700 to-zinc-800' : '' }}"
                            src="{{ $item->image ? asset('img/games/'.$item->image) : 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=' }}"
                            alt="{{ $item->title }}"
                        >
                    </div>

                    {{-- Texto --}}
                    <div class="min-w-0 flex-1 space-y-2">
                        <h3 class="text-sm sm:text-base font-semibold text-slate-50 line-clamp-2">
                            {{ $item->title }}
                        </h3>

                        <p class="text-[11px] sm:text-xs text-slate-400">
                            Por <span class="font-medium text-slate-100">{{ $item->user->name }}</span>
                            · Versión 1.12
                            · Última actualización:
                            <span class="text-slate-200">{{ $item->updated_at->format('d/m/Y') }}</span>
                        </p>

                        <p class="text-xs sm:text-sm text-slate-300 line-clamp-3">
                            {{ $item->description }}
                        </p>

                        {{-- Tags (ejemplo genérico, puedes cambiarlos por tags reales) --}}
                        <div class="flex flex-wrap gap-2 mt-2">
                            <span class="inline-flex items-center rounded-full border border-orange-500/60
                                         bg-orange-500/10 text-[11px] text-orange-300 px-3 py-0.5">
                                Histórico
                            </span>
                            <span class="inline-flex items-center rounded-full border border-slate-700
                                         bg-slate-900 text-[11px] text-slate-300 px-3 py-0.5">
                                Ironman
                            </span>
                            <span class="inline-flex items-center rounded-full border border-slate-700
                                         bg-slate-900 text-[11px] text-slate-300 px-3 py-0.5">
                                Singleplayer
                            </span>
                            <span class="inline-flex items-center rounded-full border border-slate-700
                                         bg-slate-900 text-[11px] text-slate-300 px-3 py-0.5">
                                Versión 1.12
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Derecha: stats + acciones --}}
                <div class="flex flex-col justify-between gap-3 lg:items-end">
                    {{-- Stats --}}
                    <div class="flex items-center gap-4 text-[11px] text-slate-300">
                        <div class="flex items-center gap-1.5">
                            <img src="{{ asset('img/download.png') }}"
                                 alt="Download icon"
                                 class="w-4 h-4" />
                            <span class="font-semibold text-slate-50">
                                {{ $item->number_of_Downloads }}
                            </span>
                            <span class="text-slate-400">
                                descargas
                            </span>
                        </div>

                        <span class="h-4 w-px bg-slate-700"></span>

                        <div class="flex items-center gap-1.5">
                            <img src="{{ asset('img/estrella.png') }}"
                                 alt="Favourite icon"
                                 class="w-4 h-4" />
                            <span class="font-semibold text-slate-50">
                                {{ $item->favorite }}
                            </span>
                            <span class="text-slate-400">
                                favoritos
                            </span>
                        </div>
                    </div>

                    {{-- Acciones --}}
                    <div class="flex items-center gap-2">
                        <button
                            type="button"
                            class="inline-flex items-center justify-center gap-2
                                   rounded-xl bg-orange-500 px-4 py-1.5 text-xs sm:text-sm font-semibold
                                   text-slate-950 shadow-md shadow-orange-500/30
                                   hover:bg-orange-400 hover:shadow-lg
                                   focus:outline-none focus:ring-2 focus:ring-orange-500/60
                                   focus:ring-offset-2 focus:ring-offset-slate-950
                                   transition"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12.75 19.5v-.75a7.5 7.5 0 00-7.5-7.5H4.5m0-6.75h.75c7.87 0 14.25 6.38 14.25 14.25v.75M6 18.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                            Editar
                        </button>

                        <button
                            type="button"
                            class="inline-flex items-center justify-center
                                   rounded-full border border-slate-700 bg-slate-900
                                   p-2 text-slate-400
                                   hover:text-yellow-400 hover:border-yellow-300 hover:bg-yellow-500/10
                                   transition"
                        >
                            <span class="text-lg leading-none">★</span>
                        </button>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    {{-- PAGINACIÓN --}}
    <div class="mt-6">
        <div class="py-3 text-sm text-slate-300">
            {!! $items->links() !!}
        </div>
    </div>
</section>
