<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\JobPosting;
use Illuminate\Validation\ValidationException;

class JobPostingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jobPostings = JobPosting::paginate(10);
        return view('admin.job_postings.index', compact('jobPostings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.job_postings.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'job_title' => 'required|string|max:255',
                'job_category' => 'required|string|max:255',
                'employment_type' => 'required|in:full-time,part-time,contract,temporary',
                'status' => 'nullable|string|max:255',
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date|after_or_equal:start_date',
                'is_active' => 'nullable|boolean',
                'job_description' => 'nullable|string',
                'job_requirements' => 'nullable|string',
                'created_by' => 'required|exists:users,id'
            ]);

            JobPosting::create($validatedData);

            return response()->json([
                'success' => true,
                'redirect' => route('admin.job_postings.index')
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $encryptedId)
    {
        $id = \Illuminate\Support\Facades\Crypt::decrypt($encryptedId);
        $jobPosting = JobPosting::findOrFail($id);

        return view('admin.job_postings.show', compact('jobPosting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $encryptedId)
    {
        $id = \Illuminate\Support\Facades\Crypt::decrypt($encryptedId);
        $jobPosting = JobPosting::findOrFail($id);

        return view('admin.job_postings.edit', compact('jobPosting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jobPosting = JobPosting::findOrFail($id);

        try {
            $validatedData = $request->validate([
                'job_title' => 'required|string|max:255',
                'job_category' => 'required|string|max:255',
                'employment_type' => 'required|in:full-time,part-time,contract,temporary',
                'status' => 'nullable|string|max:255',
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date|after_or_equal:start_date',
                'is_active' => 'nullable|boolean',
                'job_description' => 'nullable|string',
                'job_requirements' => 'nullable|string',
                'updated_by' => 'nullable|exists:users,id'
            ]);

            $jobPosting->update($validatedData);

            return response()->json([
                'success' => true,
                'redirect' => route('admin.job_postings.index')
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $encryptedId)
    {
        $id = \Illuminate\Support\Facades\Crypt::decrypt($encryptedId);
        $jobPosting = JobPosting::findOrFail($id);
        $jobPosting->delete();

        return redirect()->route('admin.job_postings.index')->with('success', 'Job posting deleted successfully!');
    }

    public function close(Request $request, string $encryptedJobPostingId): RedirectResponse
    {
        $jobPostingId = \Illuminate\Support\Facades\Crypt::decrypt($encryptedJobPostingId);
        $jobPosting = JobPosting::findOrFail($jobPostingId);

        $jobPosting->update(['status' => 'closed']);
        return redirect()->route('admin.job_postings.index')->with('success', 'Job posting closed successfully.');
    }


    public function jobList()
{
    return view('frontend.job-list');
}
//     public function jobList(Request $request)
// {
//     $jobPostings = JobPosting::where('is_active', true)
//         ->where('status', 'open')
//         ->orderBy('created_at', 'DESC')
//         ->paginate(12);

//     return view('frontend.job-list', compact('jobPostings'));
// }
}
