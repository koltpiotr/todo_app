<?php

namespace App\Console\Commands;

use App\Jobs\SendTaskDueReminderEmail;
use App\Models\Task;
use Illuminate\Console\Command;

class SendTaskDueReminders extends Command
{
    protected $signature = 'tasks:send-due-reminders';

    protected $description = 'Wysyła przypomnienia e-mail o zadaniach z terminem za 1 dzień';

    public function handle()
    {
        $tasks = Task::whereDate('due_date', now()->addDay()->toDateString())
                     ->where('status', '!=', 'done') // wysyłaj tylko dla nieukończonych
                     ->with('user')
                     ->get();

        foreach ($tasks as $task) {
            SendTaskDueReminderEmail::dispatch($task);
        }

        $this->info('Wysłano przypomnienia dla zadań z terminem jutro: ' . $tasks->count());
    }
}
