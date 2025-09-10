<?php

namespace App\Http\Controllers;

use App\Mail\ApplicationRejected;
use App\Mail\InterviewScheduled;
use App\Models\Application;
use App\Models\JobPosting;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmployeeCredentials;
use App\Mail\Credentials;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreApplicationRequest;
use App\Mail\ApplicationSubmitted; // Import your Mailable class



use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Application::latest()->paginate(10);
        return view('admin.applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $jobPostings = JobPosting::all();
    return view('admin.employees.create', compact('jobPostings'));
}

 public function jobApply(JobPosting $jobPosting)
{
    return view('frontend.job-apply', compact('jobPosting'));
}


//     public function WorkWithUs()
// {
//     $jobPostings = JobPosting::all();
//     return view('frontend.work-with-us', compact('jobPostings'));
// }

    /**
     * Store a newly created resource in storage.
     */
     public function store(StoreApplicationRequest $request)
    {
        try {
            DB::beginTransaction();

            $application = new Application();
            $application->fill($request->only($application->getFillable()));
            $application->save();

            if ($request->has('education') && is_array($request->education)) {
                foreach ($request->education as $educationData) {
                    $application->educationHistory()->create([
                        'application_id' => $application->id,
                        'type' => $educationData['type'],
                        'qualification_name' => $educationData['qualification_name'],
                    ]);
                }
            }

            DB::commit();

            // Send email to the applicant
            Mail::to($application->email)->send(new ApplicationSubmitted($application));

            return view('frontend.applications-success', [
                'message' => 'Hello! Your application has been submitted successfully.'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Application submission failed: ' . $e->getMessage(), ['exception' => $e]);
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Something went wrong while submitting the application. Please review your form and try again.']);
        }
    }


    public function scheduleInterview(Request $request, Application $application)
    {
        // Validate the request data
        $request->validate([
            'interview_date' => 'required|date',
            'interview_time' => 'required',
            'interview_location' => 'nullable|string|max:255',
            'interview_link' => 'nullable|url|max:255',
            'additional_info' => 'nullable|string',
        ]);

        // Check if the application is still pending
        if ($application->status !== 'pending') {
            return redirect()->back()->with('error', 'Application has already been processed.');
        }

        DB::beginTransaction();
        try {
            // Update the application status to 'shortlisted' or 'interview_scheduled'
            $application->update([
                'status' => 'shortlisted_for_interview',
            ]);

            // Prepare interview details
            $interviewDetails = [
                'date' => $request->input('interview_date'),
                'time' => $request->input('interview_time'),
                'location' => $request->input('interview_location'),
                'link' => $request->input('interview_link'),
                'additional_info' => $request->input('additional_info'),
                'job_title' => $application->jobPosting->job_title ?? 'N/A', // Pass job title to email
            ];

            // Send interview invitation email
            try {
                Mail::to($application->email)->send(new InterviewScheduled($application, $interviewDetails));
            } catch (\Exception $e) {
                Log::error('Failed to send interview invitation email: ' . $e->getMessage());
                DB::rollBack(); // Rollback if email sending fails critically
                return redirect()->back()->with('error', 'Interview scheduled, but failed to send email. Please check logs.');
            }

            DB::commit();
            return redirect()->back()->with('success', 'Interview scheduled and invitation sent successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to schedule interview: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to schedule interview. Please try again.');
        }
    }


/**
     * Approve an application and create an employee user.
     *
     * @param Request $request
     * @param Application $application
     * @return \Illuminate\Http\RedirectResponse
     */

     public function approve(Request $request, Application $application)
    {
        // Validate form data
        $request->validate([
            'position' => 'required|string|max:255',
            'start_date' => 'required|date',
            'employment_type' => 'required|string|max:255',
            'hourly_rate' => 'required|numeric|min:0',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|string|max:255',
            'emergency_contact_relationship' => 'nullable|string|max:255',
            'welcome_message' => 'nullable|string',
        ]);

        // Begin transaction to ensure data consistency
        DB::beginTransaction();
        try {
            // Update application status
            $application->update([
                'status' => 'accepted',
                'selected_at' => now(),
                'converted_to_employee' => true,
            ]);

            // Generate a random password
            $password = Str::random(12);

            // Create a new user and associate the application ID
            $user = User::create([
                'name' => $application->full_name,
                'email' => $application->email,
                'password' => Hash::make($password),
                'role' => 'employee',
                'application_id' => $application->id,
            ]);

            // Create an employee profile with all relevant data
            EmployeeProfile::create([
                'user_id' => $user->id,
                'application_id' => $application->id,
                'position' => $request->position,
                'start_date' => $request->start_date,
                'end_date' => null,
                'employee_code' => 'EMP-' . Str::random(6),
                'employment_type' => $request->employment_type,
                'hourly_rate' => $request->hourly_rate,
                'active' => true,
                'terminated' => false,
                'termination_date' => null,
                'termination_reason' => null,
                'emergency_contact_name' => $request->emergency_contact_name,
                'emergency_contact_phone' => $request->emergency_contact_phone,
                'emergency_contact_relationship' => $request->emergency_contact_relationship,
                'admin_notes' => $request->welcome_message,

                // Personal & Contact Information
                'full_name' => $application->full_name,
                'date_of_birth' => $application->date_of_birth,
                'address_line_1' => $application->address_line_1,
                'city' => $application->city,
                'email' => $application->email,
                'phone_number' => $application->phone_number,
                'national_insurance_number' => $application->national_insurance_number,

                // Employment Specifics
                'currently_employed' => $application->currently_employed ?? null,
                'job_title' => $request->position,
                'duties_description' => null,
                'salary' => $application->salary ?? 0.00,
                'salary_period' => $application->salary_period ?? null,
                'notice_period' => $application->notice_period ?? null,
                'is_only_job' => $application->is_only_job ?? null,
                'other_jobs_details' => $application->other_jobs_details ?? null,

                // Compliance & Eligibility
                'eligible_to_work_uk' => $application->eligible_to_work_uk,
                'requires_adjustments' => $application->requires_adjustments,
                'adjustment_details' => $application->adjustment_details,
                'professional_body_member' => $application->professional_body_member,
                'professional_body_name' => $application->professional_body_name,
                'registration_number' => $application->registration_number,
                'registration_expiry_date' => $application->registration_expiry_date,
                'registration_revoked' => $application->registration_revoked,
                'revocation_details' => $application->revocation_details,

                // Driving & Access
                'uk_driving_license' => $application->uk_driving_license,
                'access_to_car' => $application->access_to_car,
                'endorsements' => $application->endorsements,
                'endorsement_details' => $application->endorsement_details,
                'driving_license_number' => $application->driving_license_number,

                // Reference Information
                'ref1_full_name' => $application->ref1_full_name,
                'ref1_company_name' => $application->ref1_company_name,
                'ref1_job_title' => $application->ref1_job_title,
                'ref1_phone_number' => $application->ref1_phone_number,
                'ref1_email' => $application->ref1_email,
                'ref1_address_line_1' => $application->ref1_address_line_1,
                'ref1_city' => $application->ref1_city,
                'ref2_full_name' => $application->ref2_full_name,
                'ref2_company_name' => $application->ref2_company_name,
                'ref2_job_title' => $application->ref2_job_title,
                'ref2_phone_number' => $application->ref2_phone_number,
                'ref2_email' => $application->ref2_email,
                'ref2_address_line_1' => $application->ref2_address_line_1,
                'ref2_city' => $application->ref2_city,
                'ref_contact_permission' => $application->ref_contact_permission,

                // General Information & Declarations
                'relevant_experience' => $application->relevant_experience,
                'interests_achievements' => $application->interests_achievements,
                'data_processing_consent' => $application->data_processing_consent,
            ]);

            // Send credentials via email with welcome message
           try {
                Mail::to($user->email)->send(new EmployeeCredentials(
                    $user,
                    $password,
                    $request->welcome_message,
                    $request->position,
                    $request->hourly_rate,
                    $request->start_date,
                ));
            } catch (\Exception $e) {
                Log::error('Failed to send credentials email: ' . $e->getMessage());
            }



            DB::commit();
            return redirect()->back()->with('success', 'Application approved and employee created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to approve application: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to approve application. Please try again.');
        }
    }

    // public function approve(Request $request, Application $application)
    // {

    //     // Begin transaction to ensure data consistency
    //     DB::beginTransaction();
    //     try {
    //         // Update application status
    //         $application->update([
    //             'status' => 'accepted',
    //             'selected_at' => now(),
    //             'converted_to_employee' => true,
    //         ]);

    //         // Generate a random password
    //         $password = Str::random(12);

    //         // Create a new user and associate the application ID
    //         // Using $application->full_name as per the Application model's $fillable
    //         $user = User::create([
    //             'name' => $application->full_name,
    //             'email' => $application->email,
    //             'password' => Hash::make($password),
    //             'role' => 'employee',
    //             'application_id' => $application->id,
    //         ]);

    //         // Create an employee profile with all relevant data from the application
    //         EmployeeProfile::create([
    //             'user_id' => $user->id,
    //             'application_id' => $application->id,
    //             // Prioritize the job title from the job posting they applied for
    //             'position' => $application->jobPosting->job_title ?? 'Employee',
    //             'start_date' => now()->format('Y-m-d'),
    //             'end_date' => null,
    //             'employee_code' => 'EMP-' . Str::random(6),
    //             'employment_type' => $application->availability_type ?? 'full_time', // Note: availability_type not in Application $fillable, will be null or default if not handled elsewhere
    //             'hourly_rate' => 0.00, // Default, can be updated later in HR
    //             'active' => true,
    //             'terminated' => false,
    //             'termination_date' => null,
    //             'termination_reason' => null,
    //             // Note: kin_name, kin_mobile/tel, kin_relationship are not in Application $fillable, will be null if not handled elsewhere
    //             'emergency_contact_name' => $application->kin_name ?? null,
    //             'emergency_contact_phone' => $application->kin_mobile ?? $application->kin_tel ?? null,
    //             'emergency_contact_relationship' => $application->kin_relationship ?? null,
    //             'admin_notes' => null,

    //             // Personal & Contact Information
    //             'full_name' => $application->full_name, // Changed to use full_name
    //             'date_of_birth' => $application->date_of_birth,
    //             'address_line_1' => $application->address_line_1,
    //             'city' => $application->city,
    //             'email' => $application->email, // Personal email
    //             'phone_number' => $application->phone_number,
    //             'national_insurance_number' => $application->national_insurance_number,

    //             // Employment Specifics (related to current role with your company)
    //             // Note: Fields like 'employer_name' or 'job_title' from the *application*
    //             // usually refer to *previous* employment. For an EmployeeProfile,
    //             // 'job_title' should reflect their current role with your company.
    //             'currently_employed' => $application->currently_employed ?? null,
    //             'job_title' => $application->jobPosting->job_title ?? 'Employee', // Job title for their role at your company
    //             'duties_description' => null, // Duties for their current role, typically filled post-onboarding
    //             'salary' => $application->salary ?? 0.00, // Salary from application (often expected salary or previous)
    //             'salary_period' => $application->salary_period ?? null,
    //             'notice_period' => $application->notice_period ?? null,
    //             'is_only_job' => $application->is_only_job ?? null,
    //             'other_jobs_details' => $application->other_jobs_details ?? null,

    //             // Compliance & Eligibility
    //             'eligible_to_work_uk' => $application->eligible_to_work_uk,
    //             'requires_adjustments' => $application->requires_adjustments,
    //             'adjustment_details' => $application->adjustment_details,
    //             'professional_body_member' => $application->professional_body_member,
    //             'professional_body_name' => $application->professional_body_name,
    //             'registration_number' => $application->registration_number,
    //             'registration_expiry_date' => $application->registration_expiry_date,
    //             'registration_revoked' => $application->registration_revoked,
    //             'revocation_details' => $application->revocation_details,

    //             // Driving & Access
    //             'uk_driving_license' => $application->uk_driving_license,
    //             'access_to_car' => $application->access_to_car,
    //             'endorsements' => $application->endorsements,
    //             'endorsement_details' => $application->endorsement_details,
    //             'driving_license_number' => $application->driving_license_number,

    //             // Reference Information
    //             'ref1_full_name' => $application->ref1_full_name,
    //             'ref1_company_name' => $application->ref1_company_name,
    //             'ref1_job_title' => $application->ref1_job_title,
    //             'ref1_phone_number' => $application->ref1_phone_number,
    //             'ref1_email' => $application->ref1_email,
    //             'ref1_address_line_1' => $application->ref1_address_line_1,
    //             'ref1_city' => $application->ref1_city,
    //             'ref2_full_name' => $application->ref2_full_name,
    //             'ref2_company_name' => $application->ref2_company_name,
    //             'ref2_job_title' => $application->ref2_job_title,
    //             'ref2_phone_number' => $application->ref2_phone_number,
    //             'ref2_email' => $application->ref2_email,
    //             'ref2_address_line_1' => $application->ref2_address_line_1,
    //             'ref2_city' => $application->ref2_city,
    //             'ref_contact_permission' => $application->ref_contact_permission,

    //             // General Information & Declarations
    //             'relevant_experience' => $application->relevant_experience,
    //             'interests_achievements' => $application->interests_achievements,
    //             'data_processing_consent' => $application->data_processing_consent,
    //         ]);

    //         // Send credentials via email
    //         try {
    //             Mail::to($user->email)->send(new EmployeeCredentials($user, $password));
    //         } catch (\Exception $e) {
    //             // Log the error but don't fail the transaction
    //             Log::error('Failed to send credentials email: ' . $e->getMessage());
    //         }

    //         DB::commit();
    //         return redirect()->back()->with('success', 'Application approved and employee created successfully.');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         Log::error('Failed to approve application: ' . $e->getMessage());
    //         return redirect()->back()->with('error', 'Failed to approve application. Please try again.');
    //     }
    // }



    /**
     * Reject an application.
     *
     * @param Request $request
     * @param Application $application
     * @return \Illuminate\Http\RedirectResponse
     */

    /**
     * Rejects an application and sends a rejection email.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Application $application
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, Application $application)
    {

        DB::beginTransaction();

        try {
            $application->update([
                'status' => 'rejected',
            ]);


            try {
                Mail::to($application->email)->send(new ApplicationRejected($application));
            } catch (\Exception $e) {

                Log::error('Failed to send rejection email for application ' . $application->id . ': ' . $e->getMessage());
            }

            DB::commit();

            return redirect()->back()->with('success', 'Application rejected successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to reject application ' . $application->id . ': ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to reject application. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $encryptedId)
{
    $id = \Illuminate\Support\Facades\Crypt::decrypt($encryptedId);
    $application = Application::findOrFail($id);

    return view('admin.applications.show', compact('application'));
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

    public function employees()
    {
        $employees = User::where('role', 'employee')
                         ->with('employeeProfile')
                         ->paginate(10);

        return view('admin.employees.index', compact('employees'));
    }

    public function saveEmployee(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => ['required', Rule::in(['super_admin', 'admin', 'employee'])],
            'job_posting_id' => 'required|exists:job_postings,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'employee_code' => 'nullable|string|max:255',
            'employment_type' => 'nullable|string|max:255',
            'hourly_rate' => 'nullable|numeric',
            'active' => 'boolean',
            'terminated' => 'boolean',
            'termination_date' => 'nullable|date|required_if:terminated,1',
            'termination_reason' => 'nullable|string|required_if:terminated,1',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|string|max:255',
            'emergency_contact_relationship' => 'nullable|string|max:255',
            'admin_notes' => 'nullable|string',
             'address_line_1' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            // Generate a random password
            $password = Str::random(12);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($password),
                'role' => $request->role,
            ]);

            if ($request->hasFile('profile_image')) {
                $imagePath = $request->file('profile_image')->store('profile_images', 'public');
                $user->profile_image = $imagePath;
                $user->save();
            }

            $jobPosting = JobPosting::find($request->job_posting_id);

            EmployeeProfile::create([
                'user_id' => $user->id,
                'position' => $jobPosting->job_title,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'employee_code' => $request->employee_code,
                'employment_type' => $request->employment_type,
                'hourly_rate' => $request->hourly_rate,
                'active' => $request->boolean('active'),
                'terminated' => $request->boolean('terminated'),
                'termination_date' => $request->boolean('terminated') ? $request->termination_date : null,
                'termination_reason' => $request->boolean('terminated') ? $request->termination_reason : null,
                'emergency_contact_name' => $request->emergency_contact_name,
                'emergency_contact_phone' => $request->emergency_contact_phone,
                'emergency_contact_relationship' => $request->emergency_contact_relationship,
                'admin_notes' => $request->admin_notes,
                'address_line_1' => $request->address_line_1,
                'phone_number' => $request->phone_number,
            ]);

            // Send credentials via email
            try {
                Mail::to($user->email)->send(new Credentials($user, $password));
            } catch (\Exception $e) {
                // Log the error but don't fail the transaction
                Log::error('Failed to send credentials email: ' . $e->getMessage());
            }

            DB::commit();

            return redirect()->route('admin.employees.index')->with('success', 'Employee created successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Error creating employee: ' . $e->getMessage()]);
        }
    }
}
