<?php

namespace App\Http\Controllers;

use App\Mail\AssignmentScheduleMail;
use App\Models\EmployeePatientAssignment;
use App\Models\EmployeePatientAssignmentSlot;
use App\Models\EmployeeProfile;
use App\Models\Patient;
use App\Models\TaskCategory;
use App\Models\TaskItem;
use App\Models\TaskItemAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Timesheet;
use Illuminate\Support\Facades\Log;
use App\Models\AssignmentTimesheetSummary;
use Illuminate\Support\Facades\Mail;


class TaskController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role:admin|super_admin')->only([
    //         'index', 'createAssignment', 'storeAssignment', 'createCategory', 'storeCategory',
    //         'createItem', 'storeItem', 'indexAssignments', 'editAssignment', 'updateAssignment', 'destroyAssignment'
    //     ]);
    // }

    public function index()
    {
        $taskCategories = TaskCategory::with('taskItems')->get();
        return view('admin.tasks.index', compact('taskCategories'));
    }

    public function indexAssignments()
    {
        $assignments = EmployeePatientAssignment::with([
            'employeeProfile.user',
            'patient',
            'slots',
            'taskItemAnswers.taskItem.taskCategory'
        ])->paginate(10);
        return view('admin.tasks.assignments.index', compact('assignments'));
    }

    public function createCategory()
    {
        return view('admin.tasks.categories.create');
    }

    public function storeCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:task_categories,name',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        TaskCategory::create($request->only(['name', 'description']));

        return redirect()->route('tasks.index')->with('success', 'Task category created successfully.');
    }

    public function editCategory(TaskCategory $category)
    {
        return view('admin.tasks.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, TaskCategory $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:task_categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category->update($request->only(['name', 'description']));

        return redirect()->route('tasks.index')->with('success', 'Task category updated successfully.');
    }

    public function destroyCategory(TaskCategory $category)
    {
        // Detach task items before deleting the category if you have foreign key constraints
        // For example, if task_items table has a foreign key to task_categories and it's not set to CASCADE ON DELETE
        $category->taskItems()->delete(); // Or set task_category_id to null if it's nullable

        $category->delete();
        return redirect()->route('tasks.index')->with('success', 'Task category deleted successfully.');
    }

    // --- Task Item Methods ---

    public function createItem()
    {
        $taskCategories = TaskCategory::pluck('name', 'id');
        return view('admin.tasks.items.create', compact('taskCategories'));
    }

    public function storeItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task_category_id' => 'required|exists:task_categories,id',
            'name' => 'required|string|max:255|unique:task_items,name',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        TaskItem::create($request->only(['task_category_id', 'name', 'description']));

        return redirect()->route('tasks.index')->with('success', 'Task item created successfully.');
    }

    public function editItem(TaskItem $item)
    {
        $taskCategories = TaskCategory::pluck('name', 'id');
        return view('admin.tasks.items.edit', compact('item', 'taskCategories'));
    }

    public function updateItem(Request $request, TaskItem $item)
    {
        $validator = Validator::make($request->all(), [
            'task_category_id' => 'required|exists:task_categories,id',
            'name' => 'required|string|max:255|unique:task_items,name,' . $item->id,
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item->update($request->only(['task_category_id', 'name', 'description']));

        return redirect()->route('tasks.index')->with('success', 'Task item updated successfully.');
    }

    public function destroyItem(TaskItem $item)
    {
        $item->delete();
        return redirect()->route('tasks.index')->with('success', 'Task item deleted successfully.');
    }
    public function createAssignment()
    {
        $employees = EmployeeProfile::with('user')->get();
        $patients = Patient::all();
        return view('admin.tasks.assign', compact('employees', 'patients'));
    }


//     public function storeAssignment(Request $request)
// {
//     $input = $request->all();

//     if (isset($input['slots']) && is_array($input['slots'])) {
//         foreach ($input['slots'] as $day => $slots) {
//             if (is_array($slots)) {
//                 $input['slots'][$day] = array_values(array_filter($slots, fn($slot) => !empty($slot['start_time']) || !empty($slot['end_time'])));
//             }
//         }
//     }

//     $validator = Validator::make($input, [
//         'employee_profile_id' => 'required|exists:employee_profiles,id',
//         'patient_id' => 'required|exists:patients,id',
//         'days_selected' => 'required|array|min:1',
//         'days_selected.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
//         'slots' => 'required|array',
//         'slots.*' => 'array',
//         'slots.*.*.start_time' => ['bail', 'required', 'date_format:H:i'],
//         'slots.*.*.end_time' => ['bail', 'required', 'date_format:H:i', 'after:slots.*.*.start_time'],
//     ]);

//     if ($validator->fails()) {
//         return redirect()->back()->withErrors($validator)->withInput();
//     }

//     DB::transaction(function () use ($input) {
//         $assignment = EmployeePatientAssignment::create([
//             'employee_profile_id' => $input['employee_profile_id'],
//             'patient_id' => $input['patient_id'],
//         ]);

//         foreach ($input['days_selected'] as $dayOfWeek) {
//             if (isset($input['slots'][$dayOfWeek]) && is_array($input['slots'][$dayOfWeek])) {
//                 foreach ($input['slots'][$dayOfWeek] as $slotData) {
//                     if (!empty($slotData['start_time']) && !empty($slotData['end_time'])) {
//                         EmployeePatientAssignmentSlot::create([
//                             'employee_patient_assignment_id' => $assignment->id,
//                             'day_of_week' => $dayOfWeek,
//                             'start_time' => $slotData['start_time'],
//                             'end_time' => $slotData['end_time'],
//                         ]);
//                     }
//                 }
//             }
//         }
//     });

//     return redirect()->route('tasks.assignments.index')->with('success', 'Employee assigned to patient with specific time slots successfully.');
// }


public function storeAssignment(Request $request)
{
    $input = $request->all();

    if (isset($input['slots']) && is_array($input['slots'])) {
        foreach ($input['slots'] as $day => $slots) {
            if (is_array($slots)) {
                $input['slots'][$day] = array_values(array_filter($slots, fn($slot) => !empty($slot['start_time']) || !empty($slot['end_time'])));
            }
        }
    }

    $validator = Validator::make($input, [
        'employee_profile_id' => 'required|exists:employee_profiles,id',
        'patient_id' => 'required|exists:patients,id',
        'days_selected' => 'required|array|min:1',
        'days_selected.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        'slots' => 'required|array',
        'slots.*' => 'array',
        'slots.*.*.start_time' => ['bail', 'required', 'date_format:H:i'],
        'slots.*.*.end_time' => ['bail', 'required', 'date_format:H:i', 'after:slots.*.*.start_time'],
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $assignment = DB::transaction(function () use ($input) {
        $assignment = EmployeePatientAssignment::create([
            'employee_profile_id' => $input['employee_profile_id'],
            'patient_id' => $input['patient_id'],
        ]);

        foreach ($input['days_selected'] as $dayOfWeek) {
            if (isset($input['slots'][$dayOfWeek]) && is_array($input['slots'][$dayOfWeek])) {
                foreach ($input['slots'][$dayOfWeek] as $slotData) {
                    if (!empty($slotData['start_time']) && !empty($slotData['end_time'])) {
                        EmployeePatientAssignmentSlot::create([
                            'employee_patient_assignment_id' => $assignment->id,
                            'day_of_week' => $dayOfWeek,
                            'start_time' => $slotData['start_time'],
                            'end_time' => $slotData['end_time'],
                        ]);
                    }
                }
            }
        }

        return $assignment;
    });

    // Send email to employee
    Mail::to(EmployeeProfile::find($assignment->employee_profile_id)->user->email)
        ->send(new AssignmentScheduleMail($assignment));

    return redirect()->route('tasks.assignments.index')->with('success', 'Employee assigned to patient with specific time slots successfully.');
}

    public function editAssignment($id)
    {
        $assignment = EmployeePatientAssignment::with('slots')->findOrFail($id);
        $employees = EmployeeProfile::with('user')->get();
        $patients = Patient::all();
        return view('admin.tasks.assignments.edit', compact('assignment', 'employees', 'patients'));
    }

    public function updateAssignment(Request $request, $id)
{
    $input = $request->all();

    if (isset($input['slots']) && is_array($input['slots'])) {
        foreach ($input['slots'] as $day => $slots) {
            if (is_array($slots)) {
                $input['slots'][$day] = array_values(array_filter($slots, fn($slot) => !empty($slot['start_time']) || !empty($slot['end_time'])));
            }
        }
    }

    $validator = Validator::make($input, [
        'employee_profile_id' => 'required|exists:employee_profiles,id',
        'patient_id' => 'required|exists:patients,id',
        'days_selected' => 'required|array|min:1',
        'days_selected.*' => 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        'slots' => 'required|array',
        'slots.*' => 'array',
        'slots.*.*.start_time' => ['bail', 'required', 'date_format:H:i'],
        'slots.*.*.end_time' => ['bail', 'required', 'date_format:H:i', 'after:slots.*.*.start_time'],
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $assignment = DB::transaction(function () use ($input, $id) {
        $assignment = EmployeePatientAssignment::findOrFail($id);
        $assignment->update([
            'employee_profile_id' => $input['employee_profile_id'],
            'patient_id' => $input['patient_id'],
        ]);

        $assignment->slots()->delete();

        foreach ($input['days_selected'] as $dayOfWeek) {
            if (isset($input['slots'][$dayOfWeek]) && is_array($input['slots'][$dayOfWeek])) {
                foreach ($input['slots'][$dayOfWeek] as $slotData) {
                    if (!empty($slotData['start_time']) && !empty($slotData['end_time'])) {
                        EmployeePatientAssignmentSlot::create([
                            'employee_patient_assignment_id' => $assignment->id,
                            'day_of_week' => $dayOfWeek,
                            'start_time' => $slotData['start_time'],
                            'end_time' => $slotData['end_time'],
                        ]);
                    }
                }
            }
        }

        return $assignment;
    });

    // Send email to employee
    Mail::to(EmployeeProfile::find($assignment->employee_profile_id)->user->email)
        ->send(new AssignmentScheduleMail($assignment));

    return redirect()->route('tasks.assignments.index')->with('success', 'Assignment updated successfully.');
}

    public function destroyAssignment($id)
    {
        $assignment = EmployeePatientAssignment::findOrFail($id);
        $assignment->delete();

        return redirect()->route('tasks.assignments.index')->with('success', 'Assignment deleted successfully.');
    }

    // public function employeeTasks()
    // {
    //     $employeeProfile = Auth::user()->employeeProfile;
    //     if (!$employeeProfile) {
    //         return redirect()->route('home')->with('error', 'No employee profile found.');
    //     }

    //     $assignments = EmployeePatientAssignment::with(['patient', 'taskItemAnswers' => function($query) {
    //         $query->with('timesheet');
    //     }])
    //         ->where('employee_profile_id', $employeeProfile->id)
    //         ->where(function ($query) {
    //             $query->whereNull('end_date')->orWhere('end_date', '>=', now());
    //         })
    //         ->get();

    //     $taskCategories = TaskCategory::with('taskItems')->get();

    //     return view('employee.tasks.employee', compact('assignments', 'taskCategories'));
    // }

    // public function saveTaskItemAnswer(Request $request, $assignmentId)
    // {
    //     try {
    //         $employeeProfile = Auth::user()->employeeProfile;
    //         if (!$employeeProfile) {
    //             return redirect()->back()->with('error', 'No employee profile found.');
    //         }

    //         $assignment = EmployeePatientAssignment::findOrFail($assignmentId);

    //         // Authorization check: Ensure the employee owns this assignment
    //         if ($assignment->employee_profile_id !== $employeeProfile->id) {
    //             return redirect()->back()->with('error', 'Unauthorized action.');
    //         }

    //         $validator = Validator::make($request->all(), [
    //             'answers' => 'nullable|array',
    //             'answers.*.task_item_id' => 'required|exists:task_items,id',
    //             'answers.*.is_completed' => 'nullable|boolean',
    //         ]);

    //         if ($validator->fails()) {
    //             return redirect()->back()->withErrors($validator)->withInput();
    //         }

    //         // --- Find the current active Timesheet for the user ---
    //         $activeTimesheet = Timesheet::where('user_id', Auth::id())
    //                                     ->where('work_date', Carbon::now()->toDateString())
    //                                     ->whereNull('clock_out') // Ensure it's an active, unclocked-out timesheet
    //                                     ->first();

    //         // --- IMPORTANT: Return error if no active timesheet ---
    //         if (!$activeTimesheet) {
    //             return redirect()->back()->with('error', 'Please clock in first to save task updates for this shift.');
    //         }
    //         // --- End Timesheet lookup and check ---

    //         DB::transaction(function () use ($request, $assignment, $employeeProfile, $activeTimesheet) {
    //             $allRelevantTaskItems = TaskCategory::with('taskItems')
    //                                                 ->get()
    //                                                 ->pluck('taskItems')
    //                                                 ->flatten()
    //                                                 ->unique('id');

    //             foreach ($allRelevantTaskItems as $taskItem) {
    //                 $isCompleted = false;

    //                 if (isset($request->answers[$taskItem->id])) {
    //                     $isCompleted = filter_var($request->answers[$taskItem->id]['is_completed'] ?? false, FILTER_VALIDATE_BOOLEAN);
    //                 }

    //                 TaskItemAnswer::updateOrCreate(
    //                     [
    //                         'employee_patient_assignment_id' => $assignment->id,
    //                         'task_item_id' => $taskItem->id,
    //                         'employee_profile_id' => $employeeProfile->id,
    //                     ],
    //                     [
    //                         'is_completed' => $isCompleted,
    //                         'completed_at' => $isCompleted ? now() : null,
    //                         'timesheet_id' => $activeTimesheet->id,
    //                     ]
    //                 );
    //             }
    //         });

    //         return redirect()->route('tasks.employee')->with('success', 'Task item statuses updated successfully.');
    //     } catch (\Exception $e) {
    //         // Log the exception for debugging purposes
    //         \Log::error('Error saving task item answer: ' . $e->getMessage(), [
    //             'exception' => $e,
    //             'request_data' => $request->all(),
    //             'assignment_id' => $assignmentId,
    //         ]);

    //         // Redirect back with a generic error message
    //         return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
    //     }
    // }

     /**
     * Display a listing of employee-patient assignments with task summaries.
     */
    public function taskIndex()
    {
        $employeeProfile = Auth::user()->employeeProfile;

        if (!$employeeProfile) {
            return redirect()->route('home')->with('error', 'No employee profile found.');
        }

        $currentTime = Carbon::now();
        $currentDayOfWeek = strtolower($currentTime->englishDayOfWeek);

        $assignments = EmployeePatientAssignment::with([
            'patient',
            'employeeProfile',
            'slots' => function ($query) use ($currentDayOfWeek, $currentTime) {
                $query->where('day_of_week', $currentDayOfWeek)
                      ->where('start_time', '<=', $currentTime->format('H:i:s'))
                      ->where('end_time', '>=', $currentTime->format('H:i:s'));
            },
            'taskItemAnswers' => function ($query) {
                $query->with('timesheet')->orderBy('timesheet_id', 'desc')->orderBy('created_at', 'desc');
            }
        ])
            ->where('employee_profile_id', $employeeProfile->id)
            ->whereHas('slots', function ($query) use ($currentDayOfWeek, $currentTime) {
                $query->where('day_of_week', $currentDayOfWeek)
                      ->where('start_time', '<=', $currentTime->format('H:i:s'))
                      ->where('end_time', '>=', $currentTime->format('H:i:s'));
            })
            ->get();

        return view('employee.tasks.index', compact('assignments', 'currentTime'));
    }

    public function edit(EmployeePatientAssignment $assignment, Request $request)
    {
        $employeeProfile = Auth::user()->employeeProfile;

        if (!$employeeProfile) {
            return redirect()->route('home')->with('error', 'No employee profile found.');
        }

        if ((int)$assignment->employee_profile_id !== (int)$employeeProfile->id) {
            return redirect()->route('tasks.employee.index')->with('error', 'Unauthorized action.');
        }

        // Determine which timesheet's tasks to load
        $timesheetToLoadId = $request->query('timesheet_id');
        $targetTimesheet = null;

        if ($timesheetToLoadId) {
            $targetTimesheet = Timesheet::where('id', $timesheetToLoadId)
                                        ->where('user_id', Auth::id())
                                        ->first();
            if (!$targetTimesheet) {
                return redirect()->route('tasks.employee.index')->with('error', 'Invalid timesheet selected.');
            }
        } else {
            $targetTimesheet = Timesheet::where('user_id', Auth::id())
                ->where('work_date', Carbon::now()->toDateString())
                ->whereNull('clock_out')
                ->first();
        }

        if (!$targetTimesheet) {
            return redirect()->route('tasks.employee.index')->with('error', 'No active or specific timesheet found to edit tasks for.');
        }

        $assignment->load([
            'slots',
            'taskItemAnswers' => function ($query) use ($targetTimesheet) {
                $query->where('timesheet_id', $targetTimesheet->id);
            }
        ]);

        $summary = AssignmentTimesheetSummary::where('employee_patient_assignment_id', $assignment->id)
                                             ->where('timesheet_id', $targetTimesheet->id)
                                             ->first();

        $taskCategories = TaskCategory::with('taskItems')->get();

        return view('employee.tasks.edit', compact('assignment', 'taskCategories', 'targetTimesheet', 'summary'));
    }

    /**
     * Store or update task item answers for a specific assignment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeePatientAssignment  $assignment
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function saveTaskItemAnswer(Request $request, EmployeePatientAssignment $assignment)
    {
        try {
            $employeeProfile = Auth::user()->employeeProfile;

            if (!$employeeProfile) {
                return redirect()->back()->with('error', 'No employee profile found.');
            }

            if ((int)$assignment->employee_profile_id !== (int)$employeeProfile->id) {
                return redirect()->back()->with('error', 'Unauthorized action.');
            }

            $validator = Validator::make($request->all(), [
                'answers' => 'nullable|array',
                'answers.*.task_item_id' => 'required|exists:task_items,id',
                'answers.*.is_completed' => 'nullable|boolean',
                'summary_text' => 'nullable|string|max:1000',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $targetTimesheet = Timesheet::where('user_id', Auth::id())
                ->where('work_date', Carbon::now()->toDateString())
                ->whereNull('clock_out')
                ->first();

            if (!$targetTimesheet) {
                return redirect()->back()->with('error', 'No active timesheet found. Please clock in first to save task updates.');
            }

            DB::transaction(function () use ($request, $assignment, $employeeProfile, $targetTimesheet) {
                AssignmentTimesheetSummary::updateOrCreate(
                    [
                        'employee_patient_assignment_id' => $assignment->id,
                        'timesheet_id' => $targetTimesheet->id,
                    ],
                    [
                        'summary_text' => $request->input('summary_text'),
                    ]
                );

                $allRelevantTaskItems = TaskCategory::with('taskItems')
                    ->get()
                    ->pluck('taskItems')
                    ->flatten()
                    ->unique('id');

                foreach ($allRelevantTaskItems as $taskItem) {
                    $isCompleted = false;

                    if (isset($request->answers[$taskItem->id])) {
                        $isCompleted = filter_var($request->answers[$taskItem->id]['is_completed'] ?? false, FILTER_VALIDATE_BOOLEAN);
                    }

                    TaskItemAnswer::updateOrCreate(
                        [
                            'employee_patient_assignment_id' => $assignment->id,
                            'task_item_id' => $taskItem->id,
                            'employee_profile_id' => $employeeProfile->id,
                            'timesheet_id' => $targetTimesheet->id,
                        ],
                        [
                            'is_completed' => $isCompleted,
                            'completed_at' => $isCompleted ? now() : null,
                        ]
                    );
                }
            });

            return redirect()->route('tasks.employee.index')->with('success', 'Task item statuses and shift summary updated successfully.');
        } catch (\Exception $e) {
            \Log::error("Error saving task item answers: " . $e->getMessage() . " on line " . $e->getLine() . " in " . $e->getFile());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
}
