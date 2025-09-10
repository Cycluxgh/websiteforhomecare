<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'work_date',
        'clock_in',
        'clock_out',
        'total_hours',
        'shift_type',
        'is_approved',
        'notes',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'clock_in' => 'datetime',
        'clock_out' => 'datetime',
        'work_date' => 'date',
        'is_approved' => 'boolean',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function taskItemAnswers()
    {
        return $this->hasMany(TaskItemAnswer::class);
    }

    public function assignmentSummaries()
    {
        return $this->hasMany(AssignmentTimesheetSummary::class);
    }
}
