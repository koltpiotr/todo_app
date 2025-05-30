<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;
    
    public function index(Request $request)
    {
        $tasks = Task::where('user_id', auth()->id())
            ->when($request->priority, fn($q) => $q->where('priority', $request->priority))
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->when($request->due_date, fn($q) => $q->whereDate('due_date', $request->due_date))
            ->orderBy('due_date')
            ->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:to-do,"in progress",done', // cudzysłowy wokół in progress
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        $validated['user_id'] = auth()->id();

        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Zadanie dodane.');
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task);
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:to-do,"in progress",done',
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Zadanie zaktualizowane.');
    }
    
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Zadanie usunięte.');
    }

    public function generateToken(Task $task)
    {
        $this->authorize('update', $task);

        $task->public_token = Str::random(32);
        $task->token_expires_at = now()->addDay();
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Wygenerowano link do zadania.');
    }

    public function showPublic(string $token)
    {
        $task = Task::where('public_token', $token)->first();

        if (!$task || !$task->token_expires_at || $task->token_expires_at->isPast()) {
            abort(403, 'Link wygasł lub jest nieprawidłowy.');
        }

        return view('tasks.show_public', compact('task'));
    }
}
