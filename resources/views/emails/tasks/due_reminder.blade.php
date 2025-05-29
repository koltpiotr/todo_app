@component('mail::message')
# Przypomnienie o zadaniu

Zadanie **{{ $task->title }}** ma termin wykonania jutro ({{ $task->due_date->format('Y-m-d') }}).

Opis: {{ $task->description ?? 'Brak opisu' }}

@component('mail::button', ['url' => route('tasks.show', $task)])
Zobacz zadanie
@endcomponent

Dziękujemy,<br>
{{ config('app.name') }}
@endcomponent
