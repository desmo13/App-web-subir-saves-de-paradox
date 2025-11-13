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
                    <input id="title" type="text" name="title" value="{{ old('title') }}"
                        class="w-full rounded-md bg-slate-950 border border-slate-700 px-3 py-2 text-sm
                               text-slate-100 placeholder-slate-500
                               focus:outline-none focus:ring-2 focus:ring-orange-500/70 focus:border-orange-500/70">
                </div>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <div class="mt-1">
                    <textarea id="description" name="description" rows="3"
                        class="w-full rounded-md bg-slate-950 border border-slate-700 px-3 py-2 text-sm
                               text-slate-100 placeholder-slate-500
                               focus:outline-none focus:ring-2 focus:ring-orange-500/70 focus:border-orange-500/70">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="mt-4">
                <label for="game_name_id" class="block text-sm font-medium text-gray-700">Nombre del juego</label>
                <div class="mt-1">
                    <select id="game_name_id" name="game_name_id"
                        class="w-full rounded-md bg-slate-950 border border-slate-700 px-3 py-2 text-sm
                               text-slate-100 focus:outline-none focus:ring-2 focus:ring-orange-500/70 focus:border-orange-500/70">
                        <option value="">Seleccione un nombre de juego</option>
                        @foreach ($gameNames as $gameName)
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
                    <select id="public" name="public"
                        class="block w-full pl-7 pr-12 py-2 bg-slate-950 border border-slate-700 px-3 py-2 text-sm
                               text-slate-100 focus:outline-none focus:ring-2 focus:ring-orange-500/70 focus:border-orange-500/70 rounded-md">
                        <option value="0">No</option>
                        <option value="1">Si</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex justify-end gap-3 pt-4">
            <button type="submit"
                class="rounded-md border border-orange-500 bg-orange-500 text-slate-950 px-5 py-2 text-sm font-medium
                               hoverbg-orange-300 transition">Crear</button>
           <button type="button"
                class="rounded-md border border-slate-700 px-4 py-2 text-sm text-slate-200
                               hover:border-slate-500 hover:bg-slate-900 transition" onclick="history.back()">Cancelar</button>
        </div>
    </form>
@endsection
