<?php

namespace App\Http\Controllers;

use App\Models\EmployeeProfile;
use Illuminate\Http\Request;
use App\Models\MedicalSelfAssessment;
use Illuminate\View\View;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redirect;


class MedicalSelfAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index(): View
    {
        $assessments = MedicalSelfAssessment::latest()->paginate(10); // Example pagination

            return view('admin.medical_self_assessment.index', compact('assessments'));
    }

    //     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
// {
//     // Get the currently logged-in user
//     $user = Auth::user();
//     $jobTitle = null;

    //     // Check if the user is logged in and their role is 'employee'
//     if ($user && $user->role === 'employee' && $user->application_id) {
//         // Find the specific Application that was converted to create this employee
//         $application = Application::find($user->application_id);

    //         if ($application && $application->jobPosting) {
//             $jobTitle = $application->jobPosting->job_title;
//         }
//     }

    //     return view('employee.medical_self_assessment.create', compact('jobTitle'));
// }

    public function create(): View|\Illuminate\Http\RedirectResponse
    {
      
        $user = Auth::user();
        $jobTitle = null;

        $existingRecord = MedicalSelfAssessment::where('user_id', $user ? $user->id : null)->first();

        if ($existingRecord) {

            return Redirect::route('already-submitted');
        }


        if ($user && $user->role === 'employee' && $user->application_id) {
            // Find the specific Application that was converted to create this employee
            $application = Application::find($user->application_id);

            if ($application && $application->jobPosting) {
                $jobTitle = $application->jobPosting->job_title;
            }
        }


        if ($jobTitle === null && $user && $user->role === 'employee') {
            $employeeProfile = EmployeeProfile::where('user_id', $user->id)->first();

            if ($employeeProfile) {
                $jobTitle = $employeeProfile->position;
            }
        }

        return view('employee.medical_self_assessment.create', compact('jobTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define validation rules for MedicalSelfAssessment
        $rules = [
            'user_id' => 'required|exists:users,id',
            'job_title' => 'nullable|string|max:255',
            'surname' => 'nullable|string|max:255',
            'other_names' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'daytime_contact_number' => 'nullable|string|max:20',
            'alternative_contact_number' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'email' => 'nullable|email|max:255',
            'company_number' => 'nullable|string|max:255',
            'doctor_name' => 'nullable|string|max:255',
            'doctor_address' => 'nullable|string',
            'night_shift_restrictions' => 'nullable|in:Yes,No',
            'nhs_student_nurse' => 'nullable|in:Yes,No',
            'nhs_healthcare_assistant' => 'nullable|in:Yes,No',
            'nhs_nurse_or_the_above' => 'nullable|in:Yes,No',
            'tb_risk' => 'nullable|in:Yes,No',
            'tb_diagnosis' => 'nullable|in:Yes,No',
            'tb_contact' => 'nullable|in:Yes,No',
            'persistent_cough' => 'nullable|in:Yes,No',
            'weight_loss_fever' => 'nullable|in:Yes,No',
            'bcg_vaccination' => 'nullable|in:Yes,No',
            'musculoskeletal_problems' => 'nullable|in:Yes,No',
            'physical_restrictions' => 'nullable|in:Yes,No',
            'fits_faints' => 'nullable|in:Yes,No',
            'allergies' => 'nullable|in:Yes,No',
            'medication' => 'nullable|in:Yes,No',
            'blood_borne_viruses' => 'nullable|in:Yes,No',
            'other_health_issues' => 'nullable|string',
            'work_adjustments' => 'nullable|in:Yes,No',
            'declaration_date' => 'nullable|date',
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
            // Create new MedicalSelfAssessment record
            $medicalSelfAssessment = MedicalSelfAssessment::create($request->all());

            return response()->json([
                'message' => 'Medical self-assessment submitted successfully',
                'redirect' => route('medical-self-assessments.thank-you', Crypt::encrypt($medicalSelfAssessment->id))
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while submitting the medical self-assessment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function thankYou(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $medicalSelfAssessment = MedicalSelfAssessment::findOrFail($id);
        return view('employee.medical_self_assessment.thank-you', ['medicalSelfAssessment' => $medicalSelfAssessment]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $encryptedId)
    {
        try {
            // Decrypt the ID
            $id = Crypt::decrypt($encryptedId);

            // Find the assessment with eager loaded user relationship
            $assessment = MedicalSelfAssessment::with('user')->findOrFail($id);

            return view('admin.medical_self_assessment.show', compact('assessment'));

        } catch (DecryptException $e) {
            abort(404, 'Invalid assessment ID');
        } catch (ModelNotFoundException $e) {
            abort(404, 'Assessment not found');
        }
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
