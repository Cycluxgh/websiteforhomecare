<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPosting;
use Illuminate\View\View;

class FrontendController extends Controller
{
    public function index(): View
    {
        return view('frontend.welcome');
    }

    public function showJob(JobPosting $jobPosting): View
    {
        return view('frontend.job-detail', [
            'jobPosting' => $jobPosting,
        ]);
    }
}
