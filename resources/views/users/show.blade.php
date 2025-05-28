<x-app-layout>
    <x-slot name="header">Szczegóły użytkownika</x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <div class="space-y-4">
                    <div>
                        <x-input-label for="name" value="Imię i nazwisko" />
                        <x-text-input name="name" class="mt-1 w-full" value="{{ $user->name }}" disabled />
                    </div>

                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-text-input name="email" class="mt-1 w-full" value="{{ $user->email }}" disabled />
                    </div>

                    <div>
                        <x-input-label for="created_at" value="Data utworzenia" />
                        <x-text-input name="created_at" class="mt-1 w-full" value="{{ $user->created_at->format('d.m.Y H:i') }}" disabled />
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:underline">Edytuj użytkownika</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
