<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeDocuments;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class EmployeeDocumentController extends Controller
{
    public function index()
    {
        $documents = EmployeeDocuments::with('user')->latest()->paginate(10);
        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('employee.documents.create');
    }

    public function store(Request $request)
{
    // Validation rules
    $rules = [
        'user_id' => 'required|exists:users,id',
        'passport' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'english_qualification' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'certificate_of_qualification' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'overseas_police_certificate' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'overseas_tb_test' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'covid_vaccination_certificate' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'current_dbs' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        'care_training_certificates' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors(),
            'message' => 'Validation failed'
        ], 422);
    }

    try {
        $filePaths = [];
        $documentFields = array_keys($rules);
        unset($documentFields[array_search('user_id', $documentFields)]);

        foreach ($documentFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('employee_documents/' . $request->user_id, $filename, 'public');
                $filePaths[$field] = $path;
            }
        }

        $matchingCriteria = ['user_id' => $request->user_id];

        $attributesToUpdate = array_filter($filePaths, function ($value) {
            return $value !== null;
        });

        $document = EmployeeDocuments::updateOrCreate(
            $matchingCriteria,
            $attributesToUpdate
        );

        return response()->json([
            'message' => 'Documents saved successfully',
            // Redirect to a thank you page for documents, passing the encrypted ID
            'redirect' => route('employee.supported_documents.thank-you', Crypt::encrypt($document->id))
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'message' => 'An error occurred while saving/updating the documents',
            'error' => $e->getMessage()
        ], 500);
    }
}

/**
 * Display a thank you page for submitted employee documents.
 *
 * @param string $encryptedId
 * @return \Illuminate\View\View
 */
public function thankYou(string $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $document = EmployeeDocuments::findOrFail($id);
        // Logic to display a thank you page for the submitted document
        return view('employee.documents.thank-you', ['document' => $document]);
    }
}
