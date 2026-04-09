<?php

namespace App\Services;

use App\Models\FrequencyType;

class SummaryService
{
    public function getUserSummary($userId)
    {
        $frequencies = FrequencyType::with(['tasks.subtasks'])->get();


        $result = [
            'total_tasks' => 0,
            'Total_estimated_time' => 0,
            'frequencies' => []
        ];

        foreach ($frequencies as $frequency) {

            $tasks = $frequency->tasks;

            $totalTime = $tasks->sum(function ($task) {
                return $task->subtasks->sum('time');
            });

            $result['frequencies'][$frequency->name] = [
                'total_time' => $totalTime,
                'tasks' => $tasks->map(function ($task) {
                    return [
                        'id' => $task->id,
                        'name' => $task->title
                    ];
                })->values()
            ];

            $result['total_tasks'] += $tasks->count();
            $result['Total_estimated_time'] += $totalTime;
        }

        return $result;
    }
}