@extends('layout.app')

@section('title', 'Login')

@section('content')
<h1 class="text-3xl font-bold">Login</h1>

<form action="{{ url('/login') }}" method="POST" class="w-1/3 mx-auto mt-8 bg-grey-200 rounded-lg shadow-lg p-3.5">
    @csrf
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
    @if($errors->any())
    <div class="mb-4 text-sm text-red-600">
        <ul class="list-none">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <input id="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
            <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                Remember me
            </label>
        </div>
        <div class="text-sm">
            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                Forgot your password?
            </a>
        </div>
        <div class="mt-4">
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Login
            </button>
        </div>
    </div>
</form>



@endsection
