

@extends('layout.app')

@section('title', 'Panel')

@section('content')

<h1 class="text-3xl font-bold">Panel</h1>
<p class="text-xl">Bienvenido a mi panel de administración</p>

<x-panel-list :items="$items" :sort="$sort" :dir="$dir">
    <x-slot:toolbar>
        <a href="{{ url('/panel/games/create') }}" class=" inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 text-center">
            Crear juego
        </a>

    </x-slot>
</x-panel-list>
@endsection
