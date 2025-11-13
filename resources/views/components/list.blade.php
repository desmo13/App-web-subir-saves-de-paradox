<section class="max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8">
    <form action="{{ url()->current() }}" method="GET" class="flex items-center space-x-4">
        <input type="text" name="search" placeholder="Buscar..."
            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        <button type="submit"
            class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Buscar
        </button>
        {{ $toolbar ?? 'No ahi' }}
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
                                <p class="text-sm font-medium text-gray-900">
                                    {{ $item->title }}
                                </p>
                                <p class="mt-1 text-sm text-gray-500">
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
<div class="py-3 color-white">
    {!! $items->links() !!}
</div>

    </div>
</section>
