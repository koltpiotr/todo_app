<x-app-layout>
    <x-slot name="header">
        Nowe zadanie
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4 bg-white p-6 shadow rounded">
            @csrf

            <x-input-label for="title" value="Tytuł" />
            <x-text-input id="title" name="title" type="text" class="block w-full" required maxlength="255" />

            <x-input-label for="description" value="Opis" />
            <textarea id="description" name="description" class="block w-full border rounded px-3 py-2"></textarea>

            <x-input-label for="priority" value="Priorytet" />
            <select name="priority" id="priority" class="block w-full border rounded px-3 py-2" required>
                <option value="low">Niski</option>
                <option value="medium">Średni</option>
                <option value="high">Wysoki</option>
            </select>

            <x-input-label for="status" value="Status" />
            <select name="status" id="status" class="block w-full border rounded px-3 py-2" required>
                <option value="to-do">Do zrobienia</option>
                <option value="in progress">W trakcie</option>
                <option value="done">Zakończone</option>
            </select>

            <x-input-label for="due_date" value="Termin wykonania" />
            <x-text-input id="due_date" name="due_date" type="date" class="block w-full" required />

            <x-primary-button>Dodaj</x-primary-button>
            <a href="{{ route('tasks.index') }}" class="ml-4 text-gray-600">Anuluj</a>
        </form>
    </div>
</x-app-layout>