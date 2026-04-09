<?php

namespace App\Services;

use App\Models\Task;
use App\Models\SubTask;
use Illuminate\Support\Facades\DB;

class TaskService
{
    public function createTaskWithSubtasks(array $data)
    {

        return DB::transaction(function () use ($data) {

            $task = $this->createTask($data);

            $this->createSubtasks($task->id, $data['subtasks']);

            return $task;
        });
    }

    private function createTask($data)
    {
        return Task::create([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'frequency_type_id' => $data['frequency_type_id']
        ]);
    }

    private function createSubtasks($taskId, $subtasks)
    {
        foreach ($subtasks as $sub) {
            SubTask::create([
                'task_id' => $taskId,
                'title' => $sub['title'],              
                'time' => $sub['time']
            ]);
        }
    }
}