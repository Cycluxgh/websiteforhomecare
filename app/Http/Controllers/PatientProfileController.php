<?php

namespace App\Http\Controllers;

use App\Models\PatientProfile;
use App\Models\ProfileCategory;
use App\Models\ProfileSubCategory;
use App\Models\PatientProfileAnswer;
use App\Models\ProfileQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PatientProfileController extends Controller
{
    public function showQuestions($patientProfileId, $categoryId)
    {
        // Find the patient profile
        $patientProfile = PatientProfile::findOrFail($patientProfileId);

        // Check if categories exist
        if (ProfileCategory::count() === 0) {
            return redirect()->route('patients.index')->with('error', 'No profile categories available. Please create categories first.');
        }

        // Find the category and load its questions and subcategories
        $category = ProfileCategory::with(['questions', 'subCategories.questions'])->findOrFail($categoryId);

        // Get all categories for navigation
        $categories = ProfileCategory::pluck('id')->toArray();
        $currentIndex = array_search($categoryId, $categories);
        $prevCategoryId = $currentIndex > 0 ? $categories[$currentIndex - 1] : null;
        $nextCategoryId = $currentIndex < count($categories) - 1 ? $categories[$currentIndex + 1] : null;

        // Load existing answers
        $questions = $category->questions()->with(['answers' => function ($query) use ($patientProfile) {
            $query->where('patient_profile_id', $patientProfile->id);
        }])->get();

        foreach ($category->subCategories as $subCategory) {
            $subCategory->questions = $subCategory->questions()->with(['answers' => function ($query) use ($patientProfile) {
                $query->where('patient_profile_id', $patientProfile->id);
            }])->get();
        }

        return view('admin.patient-profiles.questions', [
            'patientProfile' => $patientProfile,
            'category' => $category,
            'questions' => $questions,
            'prevCategoryId' => $prevCategoryId,
            'nextCategoryId' => $nextCategoryId,
        ]);
    }

    // public function saveAnswers(Request $request, $patientProfileId, $categoryId)
    // {
    //     // Find the patient profile
    //     $patientProfile = PatientProfile::findOrFail($patientProfileId);

    //     // Find the category
    //     $category = ProfileCategory::with(['questions', 'subCategories.questions'])->findOrFail($categoryId);

    //     // Get all question IDs for the category and its subcategories
    //     $questionIds = $category->questions()->pluck('id')->toArray();
    //     foreach ($category->subCategories as $subCategory) {
    //         $questionIds = array_merge($questionIds, $subCategory->questions()->pluck('id')->toArray());
    //     }

    //     // Validate the request
    //     $rules = [
    //         'answers' => 'required|array',
    //         'answers.*.question_id' => 'required|in:' . implode(',', $questionIds),
    //         'answers.*.answer' => 'required',
    //     ];

    //     // Add specific validation based on question_type
    //     $questions = ProfileQuestion::whereIn('id', $questionIds)->get()->keyBy('id');
    //     foreach ($request->answers as $index => $answerData) {
    //         $question = $questions[$answerData['question_id']] ?? null;
    //         if ($question) {
    //             if ($question->question_type === 'boolean') {
    //                 $rules["answers.$index.answer"] = 'required|in:true,false';
    //             } elseif ($question->question_type === 'rating') {
    //                 $rules["answers.$index.answer"] = 'required|in:' . implode(',', $question->options ?? [1, 2, 3, 4, 5]);
    //             } elseif ($question->question_type === 'multiple_choice') {
    //                 $rules["answers.$index.answer"] = 'required|in:' . implode(',', $question->options ?? []);
    //             } elseif ($question->question_type === 'text' || $question->question_type === 'long_text') {
    //                 $rules["answers.$index.answer"] = 'required|string';
    //             } elseif ($question->question_type === 'date') {
    //                 $rules["answers.$index.answer"] = 'required|date';
    //             }
    //         }
    //     }

    //     $validator = Validator::make($request->all(), $rules);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     // Save answers in a transaction
    //     \DB::transaction(function () use ($patientProfile, $request, $questionIds) {
    //         foreach ($request->answers as $answerData) {
    //             if (in_array($answerData['question_id'], $questionIds)) {
    //                 PatientProfileAnswer::updateOrCreate(
    //                     [
    //                         'patient_profile_id' => $patientProfile->id,
    //                         'profile_question_id' => $answerData['question_id'],
    //                     ],
    //                     [
    //                         'answer' => $answerData['answer'],
    //                     ]
    //                 );
    //             }
    //         }
    //     });

    //     return redirect()->route('patient-profiles.questions', [
    //         'patientProfileId' => $patientProfile->id,
    //         'categoryId' => $categoryId,
    //     ])->with('success', 'Answers saved successfully');
    // }

    public function saveAnswers(Request $request, $patientProfileId, $categoryId)
    {
        // Find the patient profile
        $patientProfile = PatientProfile::findOrFail($patientProfileId);

        // Find the category
        $category = ProfileCategory::with(['questions', 'subCategories.questions'])->findOrFail($categoryId);

        // Get all question IDs for the category and its subcategories
        $questionIds = $category->questions()->pluck('id')->toArray();
        foreach ($category->subCategories as $subCategory) {
            $questionIds = array_merge($questionIds, $subCategory->questions()->pluck('id')->toArray());
        }

        // Prepare validation rules dynamically
        $rules = [
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|in:' . implode(',', $questionIds),
            // 'answers.*.answer' is no longer universally required here
            // Specific rules will be added below based on question type
        ];

        $questions = ProfileQuestion::whereIn('id', $questionIds)->get()->keyBy('id');

        foreach ($request->answers as $index => $answerData) {
            $question = $questions[$answerData['question_id']] ?? null;
            if ($question) {
                if ($question->question_type === 'boolean') {
                    $rules["answers.$index.answer"] = 'required|in:true,false';
                } elseif ($question->question_type === 'rating') {
                    $rules["answers.$index.answer"] = 'required|in:' . implode(',', $question->options ?? [1, 2, 3, 4, 5]);
                } elseif ($question->question_type === 'multiple_choice') {
                    $rules["answers.$index.answer"] = 'required|in:' . implode(',', $question->options ?? []);
                } elseif ($question->question_type === 'text' || $question->question_type === 'long_text') {
                    $rules["answers.$index.answer"] = 'required|string';
                } elseif ($question->question_type === 'date') {
                    $rules["answers.$index.answer"] = 'required|date';
                } elseif ($question->question_type === 'file') {
                    // Make file upload optional for existing answers if you allow saving without re-uploading
                    // If you always require a file on update, remove 'nullable'
                    $rules["answers.$index.answer"] = 'nullable|file|max:10240'; // Max 10MB (10240 KB)
                }
            }
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Save answers in a transaction
        DB::transaction(function () use ($patientProfile, $request, $questionIds, $questions) {
            foreach ($request->answers as $answerData) {
                $questionId = $answerData['question_id'];
                $question = $questions[$questionId] ?? null;

                if (!$question || !in_array($questionId, $questionIds)) {
                    continue; // Skip if question not found or not part of this category
                }

                $answerValue = null;

                if ($question->question_type === 'file') {
                    // Handle file upload
                    if ($request->hasFile("answers.$questionId.answer")) {
                        $uploadedFile = $request->file("answers.$questionId.answer");
                        $filePath = $uploadedFile->store('patient_profile_files', 'public'); // Store in 'storage/app/public/patient_profile_files'
                        $answerValue = $filePath;

                        // Delete old file if it exists
                        $existingAnswer = PatientProfileAnswer::where('patient_profile_id', $patientProfile->id)
                                                              ->where('profile_question_id', $questionId)
                                                              ->first();
                        if ($existingAnswer && $existingAnswer->answer && Storage::disk('public')->exists($existingAnswer->answer)) {
                            Storage::disk('public')->delete($existingAnswer->answer);
                        }
                    } else {
                        // If no new file is uploaded, keep the existing one if any
                        $existingAnswer = PatientProfileAnswer::where('patient_profile_id', $patientProfile->id)
                                                              ->where('profile_question_id', $questionId)
                                                              ->first();
                        $answerValue = $existingAnswer ? $existingAnswer->answer : null;
                    }
                } else {
                    $answerValue = $answerData['answer'];
                }

                PatientProfileAnswer::updateOrCreate(
                    [
                        'patient_profile_id' => $patientProfile->id,
                        'profile_question_id' => $questionId,
                    ],
                    [
                        'answer' => $answerValue,
                    ]
                );
            }
        });

        return redirect()->route('patient-profiles.questions', [
            'patientProfileId' => $patientProfile->id,
            'categoryId' => $categoryId,
        ])->with('success', 'Answers saved successfully!');
    }
}
