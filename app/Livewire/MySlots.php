<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\EmployeePatientAssignment;
use Illuminate\Support\Facades\Auth;

class MySlots extends Component
{
    public $slots = [];

    public function mount()
    {
        $employeeProfile = Auth::user()->employeeProfile;

        if ($employeeProfile) {
            $this->slots = EmployeePatientAssignment::with(['patient', 'slots'])
                ->where('employee_profile_id', $employeeProfile->id)
                ->get()
                ->flatMap(function ($assignment) {
                    return $assignment->slots->map(function ($slot) use ($assignment) {
                        return [
                            'patient_name' => $assignment->patient->name,
                            'patient_id' => $assignment->patient->id,
                            'day_of_week' => ucfirst($slot->day_of_week),
                            'start_time' => \Carbon\Carbon::parse($slot->start_time)->format('H:i'),
                            'end_time' => \Carbon\Carbon::parse($slot->end_time)->format('H:i'),
                        ];
                    });
                })
                ->toArray();
        }
    }

    public function render()
    {
        return view('livewire.my-slots');
    }
}
