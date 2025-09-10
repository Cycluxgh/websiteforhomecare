<?php

namespace App\Http\Controllers;

use App\Models\ProfileCategory;
use App\Models\ProfileSubCategory;
use App\Models\ProfileQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileSetupController extends Controller
{
    /**
     * Display a single view with forms for Profile Categories, Sub-Categories, and Questions.
     */
    public function create()
    {
        $categories = ProfileCategory::with('subCategories.questions')->get();
        $subCategories = ProfileSubCategory::with('questions')->get();

        return view('admin.profile.setup', compact('categories', 'subCategories'));
    }

    /**
     * Store a new Profile Category.
     */
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        ProfileCategory::create($request->all());

        return back()->with('success', 'Profile Category created successfully!');
    }

    /**
     * Show the form for editing a specific Profile Category.
     */
    public function editCategory(ProfileCategory $category)
    {
        return view('admin.profile.edit-category', compact('category'));
    }

    /**
     * Update the specified Profile Category in storage.
     */
    public function updateCategory(Request $request, ProfileCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('profile.setup.create')->with('success', 'Profile Category updated successfully!');
    }

    /**
     * Remove the specified Profile Category from storage.
     */
    public function destroyCategory(ProfileCategory $category)
    {
        try {
            $category->delete(); // onDelete('cascade') will handle sub-categories and questions
            return back()->with('success', 'Profile Category deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting category: ' . $e->getMessage());
        }
    }

    /**
     * Store a new Profile Sub-Category.
     */
    public function storeSubCategory(Request $request)
    {
        $request->validate([
            'profile_category_id' => 'required|exists:profile_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        ProfileSubCategory::create($request->all());

        return back()->with('success', 'Profile Sub-Category created successfully!');
    }

    /**
     * Show the form for editing a specific Profile Sub-Category.
     */
    public function editSubCategory(ProfileSubCategory $subCategory)
    {
        $categories = ProfileCategory::all(); // Need categories for the dropdown
        return view('admin.profile.edit-sub-category', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified Profile Sub-Category in storage.
     */
    public function updateSubCategory(Request $request, ProfileSubCategory $subCategory)
    {
        $request->validate([
            'profile_category_id' => 'required|exists:profile_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $subCategory->update($request->all());

        return redirect()->route('profile.setup.create')->with('success', 'Profile Sub-Category updated successfully!');
    }

    /**
     * Remove the specified Profile Sub-Category from storage.
     */
    public function destroySubCategory(ProfileSubCategory $subCategory)
    {
        try {
            $subCategory->delete(); // onDelete('cascade') will handle questions
            return back()->with('success', 'Profile Sub-Category deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting sub-category: ' . $e->getMessage());
        }
    }

    /**
     * Store a new Profile Question.
     */
    public function storeQuestion(Request $request)
    {
        $request->validate([
            'questionable_type' => 'required|string|in:App\\Models\\ProfileCategory,App\\Models\\ProfileSubCategory',
            'questionable_id' => 'required|integer',
            'question_text' => 'required|string',
            'question_type' => 'required|string|in:boolean,text,rating,multiple_choice,long_text,date,file',
            'options' => 'nullable|json',
        ]);

        if ($request->questionable_type === 'App\\Models\\ProfileCategory') {
            if (!ProfileCategory::find($request->questionable_id)) {
                return back()->withErrors(['questionable_id' => 'The selected category does not exist.'])->withInput();
            }
        } elseif ($request->questionable_type === 'App\\Models\\ProfileSubCategory') {
            if (!ProfileSubCategory::find($request->questionable_id)) {
                return back()->withErrors(['questionable_id' => 'The selected sub-category does not exist.'])->withInput();
            }
        }

        ProfileQuestion::create([
            'questionable_id' => $request->questionable_id,
            'questionable_type' => $request->questionable_type,
            'question_text' => $request->question_text,
            'question_type' => $request->question_type,
            'options' => $request->options ? json_decode($request->options, true) : null,
        ]);

        return back()->with('success', 'Profile Question created successfully!');
    }

    /**
     * Show the form for editing a specific Profile Question.
     */
    public function editQuestion(ProfileQuestion $question)
    {
        $categories = ProfileCategory::all();
        $subCategories = ProfileSubCategory::all();
        return view('admin.profile.edit-question', compact('question', 'categories', 'subCategories'));
    }

    /**
     * Update the specified Profile Question in storage.
     */
    public function updateQuestion(Request $request, ProfileQuestion $question)
    {
        $request->validate([
            'questionable_type' => 'required|string|in:App\\Models\\ProfileCategory,App\\Models\\ProfileSubCategory',
            'questionable_id' => 'required|integer',
            'question_text' => 'required|string',
            'question_type' => 'required|string|in:boolean,text,rating,multiple_choice,long_text,date,file',
            'options' => 'nullable|json',
        ]);

        if ($request->questionable_type === 'App\\Models\\ProfileCategory') {
            if (!ProfileCategory::find($request->questionable_id)) {
                return back()->withErrors(['questionable_id' => 'The selected category does not exist.'])->withInput();
            }
        } elseif ($request->questionable_type === 'App\\Models\\ProfileSubCategory') {
            if (!ProfileSubCategory::find($request->questionable_id)) {
                return back()->withErrors(['questionable_id' => 'The selected sub-category does not exist.'])->withInput();
            }
        }

        $question->update([
            'questionable_id' => $request->questionable_id,
            'questionable_type' => $request->questionable_type,
            'question_text' => $request->question_text,
            'question_type' => $request->question_type,
            'options' => $request->options ? json_decode($request->options, true) : null,
        ]);

        return redirect()->route('profile.setup.create')->with('success', 'Profile Question updated successfully!');
    }

    /**
     * Remove the specified Profile Question from storage.
     */
    public function destroyQuestion(ProfileQuestion $question)
    {
        try {
            $question->delete();
            return back()->with('success', 'Profile Question deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting question: ' . $e->getMessage());
        }
    }
}
