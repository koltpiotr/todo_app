<x-app-layout>
    <x-slot name="header">
        Dodaj użytkownika
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
        <form method="POST" action="{{ route('users.store') }}" class="bg-white p-6 shadow-md rounded space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium">Imię i nazwisko</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium">Hasło</label>
                <input id="password" name="password" type="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium">Potwierdź hasło</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                @error('password_confirmation') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Zapisz
                </button>
                <a href="{{ route('users.index') }}" class="ml-2 text-gray-600 hover:underline">Anuluj</a>
            </div>
        </form>
    </div>
</x-app-layout>
