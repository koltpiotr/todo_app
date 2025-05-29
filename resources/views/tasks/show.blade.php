<x-app-layout>
    <x-slot name="header">
        Szczegóły zadania
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white p-6 rounded shadow space-y-3">
            <h2 class="text-xl font-semibold">{{ $task->title }}</h2>
            <p><strong>Opis:</strong> {{ $task->description ?: '-' }}</p>
            <p><strong>Priorytet:</strong> {{ ucfirst($task->priority) }}</p>
            <p><strong>Status:</strong> {{ ucfirst($task->status) }}</p>
            <p><strong>Termin:</strong> {{ $task->due_date }}</p>

            @if ($task->isTokenValid())
                <p><strong>Link publiczny:</strong> <a href="{{ url('/public/tasks/' . $task->public_token) }}" class="text-blue-600 underline">Zobacz</a></p>
            @endif

            <form action="{{ route('tasks.generate-token', $task) }}" method="POST">
                @csrf
                <button class="bg-indigo-500 text-white px-4 py-2 rounded">Wygeneruj link publiczny</button>
            </form>
        </div>

        <div class="mt-4">
            <a href="{{ route('tasks.edit', $task) }}" class="text-yellow-600">Edytuj</a>
            <a href="{{ route('tasks.index') }}" class="ml-4 text-gray-600">Wróć</a>
        </div>
    </div>
</x-app-layout>