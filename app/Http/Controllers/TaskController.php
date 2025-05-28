<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:to-do,in progress,done',
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        auth()->user()->tasks()->create($validated);

        return redirect()->route('tasks.index')->with('success', 'Zadanie utworzone.');
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task); // opcjonalnie: polityka dostępu
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task); // opcjonalnie

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:to-do,in progress,done',
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Zadanie zaktualizowane.');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task); // opcjonalnie

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Zadanie usunięte.');
    }
}

