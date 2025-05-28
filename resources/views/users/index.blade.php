<x-app-layout>
    <x-slot name="header">Lista użytkowników</x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b">Imię i nazwisko</th>
                            <th class="px-4 py-2 border-b">Email</th>
                            <th class="px-4 py-2 border-b text-center">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                                <td class="px-4 py-2 border-b text-center">
                                    <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500 hover:underline">Edytuj</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Usuń</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="px-6 py-3">
                    {{ $users->links() }} <!-- Paginacja -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
