<h1>Przypomnienie o zadaniu</h1>

<p>Cześć {{ $task->user->name }},</p>

<p>Przypominamy o zadaniu: <strong>{{ $task->title }}</strong></p>

<p>Opis: {{ $task->description }}</p>
<p>Termin: {{ $task->due_date->format('d.m.Y') }}</p>

<p>Miłego dnia!</p>
