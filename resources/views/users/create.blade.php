<x-app-layout>
    <x-slot name="header">Dodaj użytkownika</x-slot>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <x-input-label for="name" value="Imię i nazwisko" />
        <x-text-input name="name" class="mt-1 w-full" required />

        <x-input-label for="email" value="Email" class="mt-4" />
        <x-text-input name="email" type="email" class="mt-1 w-full" required />

        <x-input-label for="password" value="Hasło" class="mt-4" />
        <x-text-input name="password" type="password" class="mt-1 w-full" required />

        <x-input-label for="password_confirmation" value="Potwierdź hasło" class="mt-4" />
        <x-text-input name="password_confirmation" type="password" class="mt-1 w-full" required />

        <x-primary-button class="mt-4">Zapisz</x-primary-button>
    </form>
</x-app-layout>
