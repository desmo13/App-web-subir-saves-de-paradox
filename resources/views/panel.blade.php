

@extends('layout.app')

@section('title', 'Panel')

@section('content')

<h1 class="text-3xl font-bold">Panel</h1>
<p class="text-xl">Bienvenido a mi panel de administración</p>

<x-panel-list :items="$items" :sort="$sort" :dir="$dir">
<x-slot:toolbar>
    <a
        href="{{ url('/panel/games/create') }}"
        class="inline-flex items-center justify-center gap-2
               rounded-xl bg-orange-500 px-5 py-2.5 text-sm font-semibold
               text-slate-950 shadow-md shadow-orange-500/30
               hover:bg-orange-400 hover:shadow-lg
               focus:outline-none focus:ring-2 focus:ring-orange-500/60
               focus:ring-offset-2 focus:ring-offset-slate-900
               transition"
    >
        ➕ Crear juego
    </a>
</x-slot>

</x-panel-list>
@endsection
