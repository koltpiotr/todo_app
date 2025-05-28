<x-app-layout>
    <x-slot name="header">Edytuj użytkownika</x-slot>

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PATCH')

        <x-input-label for="name" value="Imię i nazwisko" />
        <x-text-input name="name" class="mt-1 w-full" value="{{ old('name', $user->name) }}" required />

        <x-input-label for="email" value="Email" class="mt-4" />
        <x-text-input name="email" type="email" class="mt-1 w-full" value="{{ old('email', $user->email) }}" required />

        <x-input-label for="password" value="Hasło" class="mt-4" />
        <x-text-input name="password" type="password" class="mt-1 w-full" />

        <x-input-label for="password_confirmation" value="Potwierdź hasło" class="mt-4" />
        <x-text-input name="password_confirmation" type="password" class="mt-1 w-full" />

        <x-primary-button class="mt-4">Zapisz zmiany</x-primary-button>
    </form>
</x-app-layout>
