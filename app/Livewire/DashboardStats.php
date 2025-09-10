<?php

namespace App\Livewire;

use App\Models\Application;
use App\Models\EmployeeProfile;
use App\Models\JobPosting;
use App\Models\Policy;
use App\Models\Timesheet;
use Livewire\Component;

class DashboardStats extends Component
{
    public $jobPostingsCount;
    public $jobApplicationsCount;
    public $employeesCount;
    // public $policiesCount;
    public $timesheetsCount;

    public $jobPostingsChange;
    public $jobApplicationsChange;
    public $employeesChange;
    public $policiesChange;
    public $timesheetsChange;

    public function mount()
    {
        $this->loadStats();
    }

    public function loadStats()
    {
        // Job Postings
        $this->jobPostingsCount = JobPosting::where('is_active', true)->count();
        $previousJobPostings = 42205; // This would normally come from your historical data
        $this->jobPostingsChange = $this->calculateChange($previousJobPostings, $this->jobPostingsCount);

        // Job Applications
        $this->jobApplicationsCount = Application::count();
        $previousApplications = 0;
        $this->jobApplicationsChange = $this->calculateChange($previousApplications, $this->jobApplicationsCount);

        // Employees
        $this->employeesCount = EmployeeProfile::where('active', true)->count();
        $previousEmployees = 0;
        $this->employeesChange = $this->calculateChange($previousEmployees, $this->employeesCount);

        // Policies
        // $this->policiesCount = Policy::where('status', 'published')->count();
        // $previousPolicies = 23;
        // $this->policiesChange = $this->calculateChange($previousPolicies, $this->policiesCount);

        // Timesheets
        $this->timesheetsCount = Timesheet::where('is_approved', true)->count();
        $previousTimesheets = 0;
        $this->timesheetsChange = $this->calculateChange($previousTimesheets, $this->timesheetsCount);
    }

    private function calculateChange($previous, $current)
    {
        if ($previous == 0) return 0;

        $change = (($current - $previous) / $previous) * 100;
        return round($change, 2);
    }

    public function placeholder()
    {
        return view('components.dashboard-stats-placeholder');
    }

    public function render()
    {
        return view('livewire.dashboard-stats');
    }
}
