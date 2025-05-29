<x-app-layout>
    <x-slot name="header">
        Lista użytkowników
        <a href="{{ route('users.create') }}" class="ml-4 px-4 py-2 text-sm text-white bg-blue-600 rounded hover:bg-blue-700">
            Dodaj użytkownika
        </a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border-b">Imię i nazwisko</th>
                            <th class="px-4 py-2 border-b">Email</th>
                            <th class="px-4 py-2 border-b text-center">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                                <td class="px-4 py-2 border-b text-center space-x-2">
                                    <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600 hover:underline">Edytuj</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Na pewno chcesz usunąć tego użytkownika?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Usuń</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-4 text-center text-gray-500">Brak użytkowników</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="px-6 py-3">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
