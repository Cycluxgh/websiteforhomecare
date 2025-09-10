<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskItemAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_patient_assignment_id',
        'task_item_id',
        'employee_profile_id',
        'is_completed',
        'completed_at',
        'timesheet_id',
    ];

    protected $casts = [
        'is_completed' => 'boolean',
        'completed_at' => 'datetime',
    ];

    public function employeePatientAssignment()
    {
        return $this->belongsTo(EmployeePatientAssignment::class);
    }

    public function taskItem()
    {
        return $this->belongsTo(TaskItem::class);
    }

    public function employeeProfile()
    {
        return $this->belongsTo(EmployeeProfile::class);
    }

    public function timesheet()
    {
        return $this->belongsTo(Timesheet::class);
    }
}
