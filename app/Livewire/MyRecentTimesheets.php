<?php

namespace App\Livewire;

use App\Models\Timesheet; // Make sure this import is correct
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyRecentTimesheets extends Component
{
    public $timesheets;

    public function mount()
    {
        $this->loadRecentTimesheets();
    }

    public function loadRecentTimesheets()
    {
        $user = Auth::user();

        if ($user) {
            // Load the 5 most recent timesheets for the authenticated user.
            // The `work_date` cast in your model ensures it's treated as a date object.
            $this->timesheets = Timesheet::where('user_id', $user->id)
                               ->orderByDesc('work_date')
                               ->limit(5) // Display only the 5 most recent entries
                               ->get();    // Retrieve the collection of Timesheet models
        } else {
            $this->timesheets = collect(); // Return an empty collection if no user is logged in
        }
    }

    public function render()
    {
        return view('livewire.my-recent-timesheets');
    }
}
