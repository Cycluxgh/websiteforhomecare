<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_category_id',
        'name',
        'description',
    ];

    public function taskCategory()
    {
        return $this->belongsTo(TaskCategory::class);
    }

    public function taskItemAnswers()
    {
        return $this->hasMany(TaskItemAnswer::class);
    }
}
