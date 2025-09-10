<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\PatientProfile;
use App\Models\ProfileCategory;
use App\Models\ProfileSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::with('profile')->paginate(10);
        return view('admin.patients.index', compact('patients'));
    }

    public function create()
    {
        return view('admin.patients.add-patient');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'telephone_number' => 'nullable|string|max:20',
            'mobile_phone_number' => 'required|string|max:20',
            'date_of_birth' => 'required|date|before:today',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('patient-images', 'public');
        }

        // Create patient
        $patient = Patient::create([
            'name' => $request->name,
            'telephone_number' => $request->telephone_number,
            'mobile_phone_number' => $request->mobile_phone_number,
            'date_of_birth' => $request->date_of_birth,
            'image_path' => $imagePath,
            'address' => $request->address,
        ]);

        // Create patient profile
        PatientProfile::create([
            'patient_id' => $patient->id,
        ]);

        return redirect()->route('patients.create')->with('success', 'Patient created successfully');
    }

    public function show($id)
    {
        $patient = Patient::with(['profile.answers.question.questionable'])->findOrFail($id);
        $categories = ProfileCategory::with(['questions', 'subCategories.questions'])->get();
        return view('admin.patients.show-patient', compact('patient', 'categories'));
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('admin.patients.edit-patient', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'telephone_number' => 'nullable|string|max:20',
            'mobile_phone_number' => 'required|string|max:20',
            'date_of_birth' => 'required|date|before:today',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle file upload
        $imagePath = $patient->image_path;
        if ($request->hasFile('image_path')) {
            // Delete old image if exists
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image_path')->store('patient-images', 'public');
        }

        // Update patient
        $patient->update([
            'name' => $request->name,
            'telephone_number' => $request->telephone_number,
            'mobile_phone_number' => $request->mobile_phone_number,
            'date_of_birth' => $request->date_of_birth,
            'image_path' => $imagePath,
            'address' => $request->address,
        ]);

        return redirect()->route('patients.index')->with('success', 'Patient updated successfully');
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);

        // Delete image if exists
        if ($patient->image_path) {
            Storage::disk('public')->delete($patient->image_path);
        }

        // Delete patient (cascade will handle patient_profile and patient_profile_answers)
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully');
    }
}
