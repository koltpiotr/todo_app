<x-app-layout>
    <x-slot name="header">
        Nowe zadanie
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        {{-- Komunikaty błędów --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                <strong>Wystąpiły błędy:</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4 bg-white p-6 shadow rounded">
            @csrf

            {{-- Tytuł --}}
            <div>
                <x-input-label for="title" value="Tytuł" />
                <x-text-input id="title" name="title" type="text" class="block w-full"
                              value="{{ old('title') }}" required maxlength="255" />
                @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Opis --}}
            <div>
                <x-input-label for="description" value="Opis" />
                <textarea id="description" name="description"
                          class="block w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Priorytet --}}
            <div>
                <x-input-label for="priority" value="Priorytet" />
                <select name="priority" id="priority" class="block w-full border rounded px-3 py-2" required>
                    <option value="">-- Wybierz --</option>
                    <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Niski</option>
                    <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Średni</option>
                    <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>Wysoki</option>
                </select>
                @error('priority')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div>
                <x-input-label for="status" value="Status" />
                <select name="status" id="status" class="block w-full border rounded px-3 py-2" required>
                    <option value="">-- Wybierz --</option>
                    <option value="to-do" {{ old('status') == 'to-do' ? 'selected' : '' }}>Do zrobienia</option>
                    <option value="in progress" {{ old('status') == 'in progress' ? 'selected' : '' }}>W trakcie</option>
                    <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Zakończone</option>
                </select>
                @error('status')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Termin wykonania --}}
            <div>
                <x-input-label for="due_date" value="Termin wykonania" />
                <x-text-input id="due_date" name="due_date" type="date" class="block w-full"
                              value="{{ old('due_date') }}" required />
                @error('due_date')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Przyciski --}}
            <div class="flex items-center">
                <x-primary-button>Dodaj</x-primary-button>
                <a href="{{ route('tasks.index') }}" class="ml-4 text-gray-600 hover:underline">Anuluj</a>
            </div>
        </form>
    </div>
</x-app-layout>
