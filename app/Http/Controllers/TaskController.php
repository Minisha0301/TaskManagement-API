<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\FrequencyType;
use App\Services\SummaryService;
use App\Services\TaskService;

class TaskController extends Controller
{

    protected $taskService;
    protected $summaryService;

    public function __construct(TaskService $taskService, SummaryService $summaryService)
    {
        $this->taskService = $taskService;
        $this->summaryService = $summaryService;
    }

    public function index() {
        $Freqency = FrequencyType::all();
        $summary = $this->summaryService->getUserSummary();
        return view('task', compact('Freqency','summary'));
    }

    public function store(TaskRequest $request)
    {

        $task = $this->taskService->createTaskWithSubtasks($request->validated());
         return redirect()->back()->with('success', 'Task created successfully');
    }

  
    
}
