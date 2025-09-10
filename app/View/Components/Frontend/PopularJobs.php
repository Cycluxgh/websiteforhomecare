<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\JobPosting;

class PopularJobs extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $popularJobs = JobPosting::where('is_active', true)
            ->latest() // You might want to order them differently, like by creation date
            ->take(6) // Let's show 6 popular jobs for now
            ->get();

        return view('components.frontend.popular-jobs', [
            'popularJobs' => $popularJobs,
        ]);
    }
}
