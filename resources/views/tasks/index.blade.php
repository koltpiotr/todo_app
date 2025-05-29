<x-app-layout>
    <x-slot name="header">
        Lista zadań
        <a href="{{ route('tasks.create') }}" class="ml-4 px-4 py-2 text-sm text-white bg-blue-600 rounded hover:bg-blue-700">
            Dodaj zadanie
        </a>        
    </x-slot>

       <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <form method="GET" action="{{ route('tasks.index') }}" class="flex flex-wrap gap-4 mb-4">
                <select name="priority" class="border rounded px-3 py-2">
                    <option value="">-- Priorytet --</option>
                    <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Niski</option>
                    <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Średni</option>
                    <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>Wysoki</option>
                </select>

                <select name="status" class="border rounded px-3 py-2">
                    <option value="">-- Status --</option>
                    <option value="to-do" {{ request('status') == 'to-do' ? 'selected' : '' }}>Do zrobienia</option>
                    <option value="in progress" {{ request('status') == 'in progress' ? 'selected' : '' }}>W trakcie</option>
                    <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Zakończone</option>
                </select>

                <input type="date" name="due_date" value="{{ request('due_date') }}" class="border rounded px-3 py-2" />

                <button class="bg-blue-500 text-white px-4 py-2 rounded">Filtruj</button>
            </form>

            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b">Tytuł</th>
                            <th class="px-4 py-2 border-b">Priorytet</th>
                            <th class="px-4 py-2 border-b">Status</th>
                            <th class="px-4 py-2 border-b">Termin</th>
                            <th class="px-4 py-2 border-b text-center">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                            <tr>
                                <td class="px-4 py-2 border-b">{{ $task->title }}</td>
                                <td class="px-4 py-2 border-b">{{ ucfirst($task->priority) }}</td>
                                <td class="px-4 py-2 border-b">{{ ucfirst($task->status) }}</td>
                                <td class="px-4 py-2 border-b">{{ $task->due_date }}</td>
                                <td class="px-4 py-2 border-b text-center space-x-2">
                                    <a href="{{ route('tasks.show', $task) }}" class="text-blue-600">Podgląd</a>
                                    <a href="{{ route('tasks.edit', $task) }}" class="text-yellow-500">Edytuj</a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600" onclick="return confirm('Na pewno usunąć?')">Usuń</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="px-4 py-2 text-center">Brak zadań</td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="px-6 py-3">
                    {{ $tasks->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>