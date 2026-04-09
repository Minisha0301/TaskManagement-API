<?php

namespace App\Models;

use App\Models\SubTask;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description','frequency_type_id'];
    
    public function subtasks() {
        return $this->hasMany(SubTask::class);
    }

    public function frequency()
    {
        return $this->belongsTo(FrequencyType::class);
    }
}
