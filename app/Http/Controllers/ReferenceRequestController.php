<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReferenceRequest;
use App\Models\Application;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\EmployeeProfile;

class ReferenceRequestController extends Controller
{




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $referenceRequests = ReferenceRequest::latest()->paginate(10);
        return view('admin.reference_requests.index', compact('referenceRequests'));
    }
    public function create()
    {

        $user = Auth::user();
        $positionApplied = null;


        $existingRecord = ReferenceRequest::where('user_id', $user ? $user->id : null)->first();

        if ($existingRecord) {

            return Redirect::route('already-submitted');
        }


        if ($user && $user->role === 'employee' && $user->application_id) {

            $application = Application::find($user->application_id);

            if ($application && $application->jobPosting) {
                $positionApplied = $application->jobPosting->job_title;
            }
        }


        if ($positionApplied === null && $user && $user->role === 'employee') {
            $employeeProfile = EmployeeProfile::where('user_id', $user->id)->first();

            if ($employeeProfile) {
                $positionApplied = $employeeProfile->position;
            }
        }

        return view('employee.reference_requests.create', compact('positionApplied'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $toBool = fn($value) => $value === 'Yes';

        // Define validation rules for all form fields
        $rules = [
            'user_id' => 'required|exists:users,id',
            'position_applied' => 'required|string|max:255',
            'referee_first_name' => 'required|string|max:255',
            'referee_last_name' => 'required|string|max:255',
            'referee_email' => 'required|email|max:255',
            'referee_phone' => 'required|string|max:20',
            'referee_job_title' => 'required|string|max:255',
            'referee_company' => 'required|string|max:255',
            'applicant_full_name' => 'required|string|max:255',
            'employment_from' => 'required|date',
            'employment_to' => 'required|date|after_or_equal:employment_from', // Ensure 'to' date is not before 'from' date
            'reemploy' => 'required|in:Yes,No',
            'care_plans_rating' => 'required|in:Excellent,Good,Acceptable,Poor',
            'reliability_rating' => 'required|in:Excellent,Good,Acceptable,Poor',
            'character_rating' => 'required|in:Excellent,Good,Acceptable,Poor',
            'attitude_rating' => 'required|in:Excellent,Good,Acceptable,Poor',
            'dignity_rating' => 'required|in:Excellent,Good,Acceptable,Poor',
            'communication_rating' => 'required|in:Excellent,Good,Acceptable,Poor',
            'relationships_rating' => 'required|in:Excellent,Good,Acceptable,Poor',
            'initiative_rating' => 'required|in:Excellent,Good,Acceptable,Poor',
            'disciplinary_action' => 'required|in:Yes,No',
            'safeguarding_investigations' => 'required|in:Yes,No',
            'not_suitable_for_vulnerable' => 'required|in:Yes,No',
            'criminal_offense' => 'required|in:Yes,No',
            'additional_comments' => 'nullable|string', // Optional field
            'confirmed_accuracy' => 'required|accepted', // 'accepted' means the checkbox must be checked (value '1')
            'signature' => 'required|string|max:255',
            'company_stamp' => 'nullable|file|mimes:jpeg,png,pdf|max:2048', // Optional file, max 2MB, common image/pdf types
            'confirmed_storage' => 'required|accepted',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'message' => 'Validation failed'
            ], 422);
        }

        try {
            $companyStampPath = null;
            // Handle file upload if present
            if ($request->hasFile('company_stamp')) {
                $companyStampPath = $request->file('company_stamp')->store('public/company_stamps');

            }

            // Create new ReferenceRequest record with all validated data
            $referenceRequest = ReferenceRequest::create([
                'user_id' => $request->user_id,
                'position_applied' => $request->position_applied,
                'referee_first_name' => $request->referee_first_name,
                'referee_last_name' => $request->referee_last_name,
                'referee_email' => $request->referee_email,
                'referee_phone' => $request->referee_phone,
                'referee_job_title' => $request->referee_job_title,
                'referee_company' => $request->referee_company,
                'applicant_full_name' => $request->applicant_full_name,
                'employment_from' => $request->employment_from,
                'employment_to' => $request->employment_to,
                'reemploy' => $toBool($request->reemploy),
                'care_plans_rating' => $request->care_plans_rating,
                'reliability_rating' => $request->reliability_rating,
                'character_rating' => $request->character_rating,
                'attitude_rating' => $request->attitude_rating,
                'dignity_rating' => $request->dignity_rating,
                'communication_rating' => $request->communication_rating,
                'relationships_rating' => $request->relationships_rating,
                'initiative_rating' => $request->initiative_rating,
                'disciplinary_action' => $toBool($request->disciplinary_action),
                'safeguarding_investigations' => $toBool($request->safeguarding_investigations),
                'not_suitable_for_vulnerable' => $toBool($request->not_suitable_for_vulnerable),
                'criminal_offense' => $toBool($request->criminal_offense),
                'additional_comments' => $request->additional_comments,
                'confirmed_accuracy' => $request->has('confirmed_accuracy'),
                'signature' => $request->signature,
                'company_stamp' => $companyStampPath,
                'confirmed_storage' => $request->has('confirmed_storage'),
            ]);


            return response()->json([
                'message' => 'Reference request submitted successfully',
                'redirect' => route('reference.requests.thank-you', Crypt::encrypt($referenceRequest->id))
            ], 200);

        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error("Reference request submission failed: " . $e->getMessage());

            return response()->json([
                'message' => 'An error occurred while submitting the reference request. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function thankYou(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $referenceRequest = ReferenceRequest::findOrFail($id);
        return view('employee.reference_requests.thank-you', ['referenceRequest' => $referenceRequest]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // Handle the case where the ID cannot be decrypted,
            // for example, by redirecting back with an error message.
            abort(400, 'Invalid ID.');
        }

        $referenceRequest = ReferenceRequest::findOrFail($id);

        return view('admin.reference_requests.show', compact('referenceRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
