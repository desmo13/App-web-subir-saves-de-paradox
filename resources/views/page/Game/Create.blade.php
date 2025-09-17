
@extends('layout.app')
@section('title', 'Crear juego')
@section('content')
<h1 class="text-3xl font-bold">Crear juego</h1>
<p class="text-xl">Cree un nuevo juego</p>

<form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="flex flex-col gap-4">
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <div class="mt-1">
                <input id="title" type="text" name="title" value="{{ old('title') }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
            <div class="mt-1">
                <textarea id="description" name="description" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="mt-4">
            <label for="game_name_id" class="block text-sm font-medium text-gray-700">Nombre del juego</label>
            <div class="mt-1">
                <select id="game_name_id" name="game_name_id" class="block w-full pl-7 pr-12 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="">Seleccione un nombre de juego</option>
                    @foreach($gameNames as $gameName)
                        <option value="{{ $gameName->id }}">{{ $gameName->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div>
            <label for="public" class="block text-sm font-medium text-gray-700">¿Es público?</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                </div>
                <select id="public" name="public" class="block w-full pl-7 pr-12 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="w-full rounded-md bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Crear</button>
</form>
@endsection
