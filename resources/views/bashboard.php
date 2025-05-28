@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Witaj, {{ auth()->user()->name }}!</h1>
    <p class="text-gray-600">To jest twój panel zarządzania zadaniami.</p>
</div>
@endsection
