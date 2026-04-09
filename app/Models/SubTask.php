<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Task;


class SubTask extends Model
{

    protected $table = 'sub_tasks';

    protected $fillable = [
        'title',
        'task_id',
        'time'
    ];

    
    public function task() {
        return $this->belongsTo(Task::class);
    }
}
