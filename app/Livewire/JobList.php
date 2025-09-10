<?php

namespace App\Livewire;

use App\Models\JobPosting;
use Livewire\Component;
use Livewire\WithPagination;

class JobList extends Component
{
    use WithPagination;

    public $searchKeyword = '';

        public function render()
        {
            $jobPostings = JobPosting::where('is_active', true)
                ->where('status', 'open')
                ->where(function ($query) {
                    $query->where('job_title', 'like', '%' . $this->searchKeyword . '%')
                        ->orWhere('job_description', 'like', '%' . $this->searchKeyword . '%')
                        ->orWhere('job_requirements', 'like', '%' . $this->searchKeyword . '%');
                })
                ->orderBy('created_at', 'DESC')
                ->paginate(12);

            return view('livewire.job-list', [
                'jobPostings' => $jobPostings,
            ]);
        }

    // Optional: Reset pagination when search keyword changes
    public function updatedSearchKeyword()
    {
        $this->resetPage();
    }
}
