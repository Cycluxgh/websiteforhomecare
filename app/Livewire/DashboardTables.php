<?php

namespace App\Livewire;

use App\Models\Application;
use App\Models\EmployeeProfile;
use App\Models\Timesheet;
use Livewire\Component;

class DashboardTables extends Component
{
    public $jobApplications;
    public $employees;
    public $timesheets;

    public $jobApplicationsCount;
    public $employeesCount;
    public $timesheetsCount;

    protected $listeners = ['refreshDashboardTables' => '$refresh'];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        // Job Applications (latest 5)
        $this->jobApplications = Application::with('jobPosting')
            ->latest()
            ->take(5)
            ->get();
        $this->jobApplicationsCount = Application::count();

        // Employees (latest 5 active)
        $this->employees = EmployeeProfile::with('user')
            ->where('active', true)
            ->latest()
            ->take(5)
            ->get();
        $this->employeesCount = EmployeeProfile::where('active', true)->count();

        // Timesheets (latest 5 approved)
        $this->timesheets = Timesheet::with('user')
            ->where('is_approved', true)
            ->latest()
            ->take(5)
            ->get();
        $this->timesheetsCount = Timesheet::where('is_approved', true)->count();
    }

    public function placeholder()
    {
        return view('components.dashboard-tables-placeholder');
    }

    public function render()
    {
        return view('livewire.dashboard-tables');
    }
}
