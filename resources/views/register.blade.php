
@extends('layout.app')
@section('title', 'Registro')
@section('content')
<h1 class="text-3xl font-bold">Registro</h1>
<form action="{{ url('/register') }}" method="POST" class="w-1/3 mx-auto mt-8 bg-grey-200 rounded-lg shadow-lg p-3.5">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
        <div class="mt-1">
            <input id="name" type="text" name="name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Nombre">
        </div>
    </div>
    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <div class="mt-1">
            <input id="email" type="email" name="email" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Email">
        </div>
    </div>
    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <div class="mt-1">
            <input id="password" type="password" name="password" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
    </div>
    <div class="mb-4">
        <label for="password-confirm" class="block text-sm font-medium text-gray-700">Confirmar Password</label>
        <div class="mt-1">
            <input id="password-confirm" type="password" name="password_confirmation" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
        </div>
    </div>
    @if($errors->any())
    <div class="mb-4 text-sm text-red-600">
        <ul class="list-none">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Registrar
    </button>
</form>
@endsection
