<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Services\SummaryService;
use App\Services\TaskService;

class TaskController extends Controller
{

    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function store(TaskRequest $request)
    {

        $task = $this->taskService->createTaskWithSubtasks($request->validated());
        return $this->sendsuccess(null,"Task credated successfully", 201);
    }


    public function summary(SummaryService $summaryService)
    {
        $userId = 1;
        $data = $summaryService->getUserSummary($userId);
        return $this->sendsuccess($data, "Summary fetched", 200);
    }

    
}
