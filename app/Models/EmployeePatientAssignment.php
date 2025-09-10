<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePatientAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_profile_id',
        'patient_id',
    ];

    protected $casts = [
        'assigned_days' => 'array',
    ];

    public function employeeProfile()
    {
        return $this->belongsTo(EmployeeProfile::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function taskItemAnswers()
    {
        return $this->hasMany(TaskItemAnswer::class);
    }

public function slots()
    {
        return $this->hasMany(EmployeePatientAssignmentSlot::class);
    }
}
