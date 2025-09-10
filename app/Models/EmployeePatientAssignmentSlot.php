<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePatientAssignmentSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_patient_assignment_id',
        'day_of_week',
        'start_time',
        'end_time',
    ];

    
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function assignment()
    {
        return $this->belongsTo(EmployeePatientAssignment::class, 'employee_patient_assignment_id');
    }
}
