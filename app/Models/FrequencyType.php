<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FrequencyType extends Model
{

    public function tasks()
    {
        return $this->hasMany(Task::class, 'frequency_type_id');
    }
}
