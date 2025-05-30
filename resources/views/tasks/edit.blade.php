<x-app-layout>
    <x-slot name="header">
        Edytuj zadanie
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-4 bg-white p-6 shadow rounded">
            @csrf
            @method('PUT')

            <x-input-label for="title" value="Tytuł" />
            <x-text-input id="title" name="title" type="text" class="block w-full" required maxlength="255" value="{{ old('title', $task->title) }}" />
            @error('title')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            <x-input-label for="description" value="Opis" />
            <textarea id="description" name="description" class="block w-full border rounded px-3 py-2">{{ old('description', $task->description) }}</textarea>
            @error('description')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror

            <x-input-label for="priority" value="Priorytet" />
            <select name="priority" id="priority" class="block w-full border rounded px-3 py-2" required>
                @foreach(['low' => 'Niski', 'medium' => 'Średni', 'high' => 'Wysoki'] as $val => $label)
                    <option value="{{ $val }}" {{ $task->priority == $val ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            @error('priority')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror            

            <x-input-label for="status" value="Status" />
            <select name="status" id="status" class="block w-full border rounded px-3 py-2" required>
                @foreach(['to-do' => 'Do zrobienia', 'in progress' => 'W trakcie', 'done' => 'Zakończone'] as $val => $label)
                    <option value="{{ $val }}" {{ $task->status == $val ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            @error('status')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror                

            <x-input-label for="due_date" value="Termin wykonania" />
            <x-text-input id="due_date" name="due_date" type="date" class="block w-full" required value="{{ $task->due_date }}" />
            @error('due_date')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror        

            <x-primary-button>Zapisz</x-primary-button>
            <a href="{{ route('tasks.index') }}" class="ml-4 text-gray-600">Anuluj</a>
        </form>
    </div>
</x-app-layout>