<?php

namespace App\Mail;

use App\Models\EmployeePatientAssignment;
use App\Models\EmployeeProfile;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssignmentScheduleMail extends Mailable
{
    use Queueable, SerializesModels;

    public $assignment;

    /**
     * Create a new message instance.
     *
     * @param EmployeePatientAssignment $assignment
     * @return void
     */
    public function __construct(EmployeePatientAssignment $assignment)
    {
        $this->assignment = $assignment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $employeeProfile = EmployeeProfile::find($this->assignment->employee_profile_id);
        $patient = Patient::find($this->assignment->patient_id);
        $user = User::find($employeeProfile->user_id);
        $slots = $this->assignment->slots;

        return $this->to($user->email)
                    ->subject('Your Assignment Schedule')
                    ->view('emails.assignment_schedule')
                    ->with([
                        'employeeName' => $employeeProfile->full_name,
                        'patientName' => $patient->name,
                        'slots' => $slots,
                    ]);
    }
}
