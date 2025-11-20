<section class="max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8">

<form
    action="{{ url()->current() }}"
    method="GET"
    class="w-full bg-slate-900/80 border border-slate-800 rounded-2xl
           px-5 py-4 shadow-lg shadow-orange-500/10 mb-6"
>
    <div class="flex flex-wrap items-center gap-4">

        {{-- Buscador --}}
        <div class="relative flex-1 min-w-[220px]">
            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">
                <img src="{{asset('img/buscar.png')  }}" alt="Search icon" class="w-4 h-4">
            </span>

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Buscar juegos..."
                class="w-full rounded-xl bg-slate-800 border border-slate-700
                       pl-9 pr-4 py-2.5 text-slate-100 placeholder-slate-400
                       focus:outline-none focus:ring-2 focus:ring-orange-500/40
                       focus:border-orange-500 transition"
            >
        </div>

        {{-- Aquí puedes meter filtros extra en el futuro --}}
        <div class="flex flex-wrap items-center gap-2 text-sm text-slate-300">
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

        {{-- Toolbar (botón Crear juego, etc.) --}}
        @if(!empty($toolbar))
            <div class="flex items-center gap-2 ml-auto">
                {{ $toolbar }}
            </div>
        @endif

    </div>
</form>

    <ul class="flex divide-y divide-gray-200 gap-4 flex-wrap">

        @foreach ($items as $item)
            <li class="border border-gray-200 py-6 sm:py-10 lg:py-6  w-full flex justify-between rounded-xl px-4">
                <div class="flex items-center justify-between space-x-4">
                    <div class="min-w-0 space-y-3">
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0">
                                <h2 class="text-xs font-bold text-slate-200 absolute  border-slate-400 rounded-md px-4 bg-slate-900/50 mt-2 ml-2">Crusader Kings III</h2>
                                <img class="h-38 w-48 rounded-lg {{ !$item->image ? 'bg-gradient-to-tr from-slate-700 to-zinc-800' : '' }}"
                                    src={{ $item->image ? asset('img/games/'.$item->image) : "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" }}
                                    />
                            </div>
                            <div class="min-w-0 flex-1">
                                <h3 class="text-md text-slate-200">
                                    {{ $item->title }}
                                </h3>
                                <p class="mt-1 text-sm text-slate-200 line-clamp-2 mt-2 mb-2">
                                   Por <strong>Mario</strong> · Versión 1.12 · Última actualización: 03/10/2025
                                </p>
                                <p class="mt-1 text-sm text-slate-200">
                                    {{ $item->description }}
                                </p>

                                <div class="flex gap-2 mt-2">
                                    <div class="border border-orange-500 text-orange-500 rounded-full px-4 bg-slate-900">Historico</div>
                                    <div class="border border-slate-200 rounded-full px-4 bg-slate-900">Historico</div>
                                    <div class="border border-slate-200 rounded-full px-4  bg-slate-900">Historico</div>
                                    <div class="border border-slate-200 rounded-full px-4 bg-slate-900">Historico</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-center">
                    <p> 1000 Dowloads</p>
                    <p> 👍 100 likes</p>

                    <div class=" flex gap-2 items-center">
                    <button type="button"
                        class="inline-flex items-center justify-center gap-2
                               rounded-xl bg-orange-500 px-5 py-2.5 text-sm font-semibold
                               text-slate-950 shadow-md shadow-orange-500/30
                               hover:bg-orange-400 hover:shadow-lg
                               focus:outline-none focus:ring-2 focus:ring-orange-500/60
                               focus:ring-offset-2 focus:ring-offset-slate-900
                               transition"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 19.5v-.75a7.5 7.5 0 00-7.5-7.5H4.5m0-6.75h.75c7.87 0 14.25 6.38 14.25 14.25v.75M6 18.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                        Editar
                    </button>
                        <button type="button"
                            class=" color-yellow-400"
                        >
                        ★
                        </button>
                        </div>
                </div>
            </li>
        @endforeach


    </ul>
    <div>
<div class="py-3 color-white ">

    {!! $items->links() !!}
</div>

    </div>
</section>
