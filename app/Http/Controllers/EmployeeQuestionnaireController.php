<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeQuestionnaire;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EmployeeQuestionnaireController extends Controller
{
    public function index()
    {
        $questionnaires = EmployeeQuestionnaire::latest()->paginate(10);
        return view('admin.questionnaires.index', compact('questionnaires'));
    }

    public function create(): View|\Illuminate\Http\RedirectResponse
    {
        $userId = Auth::id();

        // Check if the authenticated user already has a record in EmployeeQuestionnaire
        $existingRecord = EmployeeQuestionnaire::where('user_id', $userId)->first();

        if ($existingRecord) {
            // If a record exists, redirect to the 'already submitted' view
            return Redirect::route('already-submitted');
        }

        // If no record exists, return the view for creating a new questionnaire
        return view('employee.questionnaires.create');
    }

    public function store(Request $request)
    {
        // Define validation rules
        $rules = [
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:10',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'other_names' => 'nullable|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'date_of_birth' => 'required|date',
            'place_of_birth' => 'required|string|max:255',
            'nationalities' => 'required|string|max:255',
            'passport_details' => 'nullable|string|max:255',
            'current_address' => 'nullable|string',
            'duration_at_address' => 'nullable|string|max:255',
            'ownership_status' => 'nullable|string|max:255',
            'contact_number' => 'required|string|max:20',
            'worked_in_uk' => 'nullable|in:Yes,No',
            'travel_outside_uk' => 'nullable|in:Yes,No',
            'english_test' => 'nullable|in:Yes,No',
            'adverse_immigration' => 'nullable|in:Yes,No',
            'criminal_offence' => 'nullable|in:Yes,No',
            'lived_in_other_countries' => 'nullable|in:Yes,No',
            'current_employer_name' => 'required|string|max:255',
            'current_job_title' => 'required|string|max:255',
            'current_start_date' => 'required|date',
            'current_end_date' => 'nullable|date|after_or_equal:current_start_date',
            'employment_breaks' => 'required|string',
            'previous_employer' => 'nullable|string',
            'previous_job_title' => 'required|string|max:255',
            'previous_start_date' => 'required|date',
            'previous_end_date' => 'required|date|after_or_equal:previous_start_date',
            'qualification' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'awarding_institution' => 'nullable|string|max:255',
            'qualification_date_from' => 'nullable|date',
            'qualification_date_to' => 'nullable|date|after_or_equal:qualification_date_from',
            'taught_in_english' => 'nullable|in:Yes,No',
            'uk_job_title' => 'required|string|max:255',
            'uk_employer_name' => 'nullable|string|max:255',
            'uk_start_date' => 'nullable|date',
            'travel_to_uk_date' => 'nullable|date',
            'skills_experience' => 'nullable|string',
            'governing_body_details' => 'nullable|string',
            'family_given_name' => 'nullable|string|max:255',
            'family_surname' => 'nullable|string|max:255',
            'family_nationality' => 'nullable|string|max:255',
            'family_date_of_birth' => 'nullable|date',
            'family_relationship' => 'nullable|string|max:255',
            'family_travel_with_you' => 'nullable|in:Yes,No',
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
            // Create new EmployeeQuestionnaire record
            $questionnaire = EmployeeQuestionnaire::create([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'other_names' => $request->other_names,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'place_of_birth' => $request->place_of_birth,
                'nationalities' => $request->nationalities,
                'passport_details' => $request->passport_details,
                'current_address' => $request->current_address,
                'duration_at_address' => $request->duration_at_address,
                'ownership_status' => $request->ownership_status,
                'contact_number' => $request->contact_number,
                'worked_in_uk' => $request->worked_in_uk === 'Yes',
                'travel_outside_uk' => $request->travel_outside_uk === 'Yes',
                'english_test' => $request->english_test === 'Yes',
                'adverse_immigration' => $request->adverse_immigration === 'Yes',
                'criminal_offence' => $request->criminal_offence === 'Yes',
                'lived_in_other_countries' => $request->lived_in_other_countries === 'Yes',
                'current_employer_name' => $request->current_employer_name,
                'current_job_title' => $request->current_job_title,
                'current_start_date' => $request->current_start_date,
                'current_end_date' => $request->current_end_date,
                'employment_breaks' => $request->employment_breaks,
                'previous_employer' => $request->previous_employer,
                'previous_job_title' => $request->previous_job_title,
                'previous_start_date' => $request->previous_start_date,
                'previous_end_date' => $request->previous_end_date,
                'qualification' => $request->qualification,
                'subject' => $request->subject,
                'awarding_institution' => $request->awarding_institution,
                'qualification_date_from' => $request->qualification_date_from,
                'qualification_date_to' => $request->qualification_date_to,
                'taught_in_english' => $request->taught_in_english === 'Yes',
                'uk_job_title' => $request->uk_job_title,
                'uk_employer_name' => $request->uk_employer_name,
                'uk_start_date' => $request->uk_start_date,
                'travel_to_uk_date' => $request->travel_to_uk_date,
                'skills_experience' => $request->skills_experience,
                'governing_body_details' => $request->governing_body_details,
                'family_given_name' => $request->family_given_name,
                'family_surname' => $request->family_surname,
                'family_nationality' => $request->family_nationality,
                'family_date_of_birth' => $request->family_date_of_birth,
                'family_relationship' => $request->family_relationship,
                'family_travel_with_you' => $request->family_travel_with_you === 'Yes',
            ]);

            return response()->json([
                'message' => 'Employee questionnaire saved successfully',
                'redirect' => route('employee.questionnaires.thank-you', \Illuminate\Support\Facades\Crypt::encrypt($questionnaire->id))
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while saving the questionnaire',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function thankYou(string $encryptedId)
    {
        $id = \Illuminate\Support\Facades\Crypt::decrypt($encryptedId);
        $questionnaire = EmployeeQuestionnaire::findOrFail($id);
        // Logic to display a thank you page for the submitted questionnaire
        return view('employee.questionnaires.thank-you', ['questionnaire' => $questionnaire]);
    }

    public function show(string $encryptedId): View
    {
        $id = \Illuminate\Support\Facades\Crypt::decrypt($encryptedId);
        $employeeQuestionnaire = EmployeeQuestionnaire::findOrFail($id);
        $employeeQuestionnaire->load('user');

        return view('admin.questionnaires.show', compact('employeeQuestionnaire'));
    }
}
