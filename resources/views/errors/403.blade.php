<!-- @extends('layouts.app') -->

@section('title', 'Błąd dostępu')

@section('content')
    <div class="text-center mt-10">
        <h1 class="text-4xl font-bold text-red-600">403</h1>
        <p class="mt-4 text-xl text-gray-700">Ten link wygasł lub jest nieprawidłowy.</p>
        <a href="{{ url('/') }}" class="mt-6 inline-block text-blue-500 underline">Powrót na stronę główną</a>
    </div>
@endsection
