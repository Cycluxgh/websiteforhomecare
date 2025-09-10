<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $policies = Policy::latest()->paginate(12);
        return view('employee.policies.index', compact('policies'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.policies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
{
    try {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:policies,slug',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'pdf_file' => 'nullable|file|mimes:pdf|max:2048',
            'status' => 'required|in:draft,published,archived',
            'is_featured' => 'nullable|boolean',
        ]);

        $policyData = $request->except('pdf_file');
        $policyData['user_id'] = auth()->id();
        $policyData['slug'] = $request->slug ? \Str::slug($request->slug) : \Str::slug($request->title);
        $policyData['is_featured'] = $validatedData['is_featured'] ?? false;
        $policyData['effective_date'] = $request->effective_date ?? null;
        $policyData['expiry_date'] = $request->expiry_date ?? null;

        if ($request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->store('policies', 'public');
            $policyData['pdf_path'] = $pdfPath;
        }

        Policy::create($policyData);

        return response()->json([
            'success' => true,
            'message' => 'Policy created successfully.',
            'redirect' => route('ourPolicies'),
        ]);

    } catch (ValidationException $e) {
        return response()->json([
            'success' => false,
            'errors' => $e->errors(),
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to create policy.',
        ], 500);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $slug): View
{
    $policy = Policy::where('slug', $slug)->firstOrFail();
    return view('employee.policies.show', compact('policy'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $policy = Policy::where('slug', $slug)->firstOrFail();

        return view('admin.policies.edit', compact('policy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $policy = Policy::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:policies,slug,' . $policy->id,
            'description' => 'required|string',
            'content' => 'nullable|string',
            'effective_date' => 'nullable|date',
            'expiry_date' => 'nullable|date|after:effective_date',
            'pdf_file' => 'nullable|file|mimes:pdf|max:2048',
            'status' => 'required|in:draft,published,archived',
            'is_featured' => 'nullable|boolean',
        ]);

        $policy->title = $request->input('title');
        $policy->slug = $request->input('slug');
        $policy->description = $request->input('description');
        $policy->content = $request->input('content');
        $policy->effective_date = $request->input('effective_date');
        $policy->expiry_date = $request->input('expiry_date');
        $policy->status = $request->input('status');
        $policy->is_featured = $request->boolean('is_featured');

        if ($request->hasFile('pdf_file')) {
            // Store the new PDF and update the path (you might want to delete the old one)
            $path = $request->file('pdf_file')->store('policies', 'public');
            $policy->pdf_path = 'storage/' . $path;
        }

        $policy->save();

        // return redirect()->route('admin.policies.index')->with('success', 'Policy updated successfully!');

        return response()->json([
            'success' => true,
            'message' => 'Policy updated successfully!',
            'redirect' => route('ourPolicies'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
 {
  try {
   $policy = Policy::findOrFail($id);

   // Perform any necessary authorization checks
   // if (auth()->user()->cannot('delete', $policy)) {
   //     return redirect()->back()->with('error', 'You are not authorized to delete this policy.');
   // }

   // Check if a PDF file is associated with the policy
   if ($policy->pdf_path) {
    // Delete the PDF file from storage
    \Storage::disk('public')->delete($policy->pdf_path);
   }

   $policy->delete();

   return redirect()->route('ourPolicies')->with('success', 'Policy and associated PDF deleted successfully!');

  } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
   return redirect()->route('ourPolicies')->with('error', 'Policy not found.');
  } catch (\Exception $e) {
   // Log the error for debugging purposes
   \Log::error('Error deleting policy and/or PDF: ' . $e->getMessage());
   return redirect()->route('ourPolicies')->with('error', 'Failed to delete policy and/or associated PDF.');
  }
 }
}
