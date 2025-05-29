<x-app-layout>
    <x-slot name="header">
        Edytuj użytkownika
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
        <form method="POST" action="{{ route('users.update', $user->id) }}" class="bg-white p-6 shadow-md rounded space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium">Imię i nazwisko</label>
                <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium">Hasło (opcjonalnie)</label>
                <input id="password" name="password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                <p class="text-sm text-gray-500">Zostaw puste, jeśli nie chcesz zmieniać.</p>
                @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Zapisz zmiany
                </button>
                <a href="{{ route('users.index') }}" class="ml-2 text-gray-600 hover:underline">Anuluj</a>
            </div>
        </form>
    </div>
</x-app-layout>
