

@extends('layout.app')

@section('title', 'Panel')

@section('content')

<h1 class="text-3xl font-bold">Panel</h1>
<p class="text-xl">Bienvenido a mi panel de administración</p>
<x-panel-list :items="$items" :sort="$sort" :dir="$dir"></x-panel-list>
@endsection
