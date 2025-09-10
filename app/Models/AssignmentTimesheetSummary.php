<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentTimesheetSummary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_patient_assignment_id',
        'timesheet_id',
        'summary_text',
    ];

    /**
     * Get the assignment that owns the summary.
     */
    public function employeePatientAssignment()
    {
        return $this->belongsTo(EmployeePatientAssignment::class);
    }

    /**
     * Get the timesheet associated with the summary.
     */
    public function timesheet()
    {
        return $this->belongsTo(Timesheet::class);
    }
}
