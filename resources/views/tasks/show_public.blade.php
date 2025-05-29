<x-guest-layout>
    <x-slot name="header">
        Publiczny podgląd zadania
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">{{ $task->title }}</h2>
        
        <p><strong>Opis:</strong> {{ $task->description ?: '-' }}</p>
        <p><strong>Priorytet:</strong> {{ ucfirst($task->priority) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($task->status) }}</p>
        <p><strong>Termin wykonania:</strong> {{ $task->due_date->format('Y-m-d') }}</p>
    </div>
</x-guest-layout>
