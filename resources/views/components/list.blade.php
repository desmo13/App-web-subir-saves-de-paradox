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
            <li class="border-b border-gray-200 py-6 sm:py-10 lg:py-6  w-full">
                <div class="flex items-center justify-between space-x-4">
                    <div class="min-w-0 space-y-3">
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0">
                                <img class="h-24 w-24 rounded-full"
                                    src="https://cdn1.epicgames.com/offer/80d3aeb1d7c3434981e0bcbc47700a83/EGS_EuropaUniversalisIV_ParadoxDevelopmentStudioParadoxTinto_S1_2560x1440-c531c49ba988ee1cb1fcc10f98579146"
                                    alt="">
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-medium text-slate-200">
                                    {{ $item->title }}
                                </p>
                                <p class="mt-1 text-sm text-slate-200">
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
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
