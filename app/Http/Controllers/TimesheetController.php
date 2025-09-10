<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class TimesheetController extends Controller
{
    /**
     * Show logged-in user's timesheets (Employee View)
     */
    public function index()
{
    $user = Auth::user();
    $timesheets = Timesheet::where('user_id', $user->id)
                         ->orderByDesc('work_date')
                         ->paginate(10);

    return view('employee.timesheets.index', compact('timesheets'));
}

    /**
     * Clock In
     */
    // public function clockIn()
    // {
    //     $user = Auth::user();
    //     $today = Carbon::now()->toDateString();

    //     // Prevent duplicate clock-in for today
    //     $existing = Timesheet::where('user_id', $user->id)->where('work_date', $today)->first();
    //     if ($existing) {
    //         return back()->with('error', 'You have already clocked in today.');
    //     }

    //     Timesheet::create([
    //         'user_id'   => $user->id,
    //         'work_date' => $today,
    //         'clock_in'  => Carbon::now(),
    //     ]);

    //     return back()->with('success', 'Clock-in successful.');
    // }

    public function clockIn(Request $request)
    {
        $user = Auth::user();
        $today = Carbon::now()->toDateString();

        $validatedData = $request->validate([
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
        ]);

        $existing = Timesheet::where('user_id', $user->id)
                            ->where('work_date', $today)
                            ->whereNull('clock_out')
                            ->first();

        if ($existing) {
            return back()->with('error', 'You have already clocked in today and not clocked out yet.');
        }

        Timesheet::create([
            'user_id'   => $user->id,
            'work_date' => $today,
            'clock_in'  => Carbon::now(),
            'latitude'  => $validatedData['latitude'] ?? null,
            'longitude' => $validatedData['longitude'] ?? null,
        ]);

        return back()->with('success', 'Clock-in successful.');
    }

     public function clockOut(Request $request)
    {
        $user = Auth::user();
        $today = Carbon::now()->toDateString();

        $timesheet = Timesheet::where('user_id', $user->id)
            ->where('work_date', $today)
            ->whereNull('clock_out')
            ->first();

        if (!$timesheet) { // Removed || $timesheet->clock_out as whereNull('clock_out') already handles it
            return back()->with('error', 'No active clock-in found for today.');
        }

        // Validate incoming latitude and longitude for clock-out
        $validatedData = $request->validate([
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
        ]);

        $clockOutLatitude = $validatedData['latitude'] ?? null;
        $clockOutLongitude = $validatedData['longitude'] ?? null;

        // --- Location Check Logic ---
        // Only perform check if both clock-in and clock-out locations are available
        if ($timesheet->latitude !== null && $timesheet->longitude !== null && $clockOutLatitude !== null && $clockOutLongitude !== null) {
            $distance = $this->calculateDistance(
                $timesheet->latitude,
                $timesheet->longitude,
                $clockOutLatitude,
                $clockOutLongitude
            );

            // Define a tolerance for distance in kilometers (e.g., 0.1 km = 100 meters)
            $toleranceKm = 0.1; // Adjust as needed, e.g., 0.5 for 500 meters

            if ($distance > $toleranceKm) {
                return back()->with('error', 'Your current location is too far from your clock-in location. Cannot clock out.');
            }
        }
        // --- End Location Check Logic ---

        $clockIn = Carbon::parse($timesheet->clock_in);
        $clockOut = Carbon::now();
        $totalHours = $clockIn->diffInMinutes($clockOut) / 60;

        $shiftType = $this->determineShiftType($clockIn, $clockOut);

        $notes = '';
        if ($request->has('tasks')) {
            // Filter out empty task inputs to avoid empty list items
            $tasks = array_filter($request->input('tasks'), function($task) {
                return !empty(trim($task));
            });

            if (!empty($tasks)) {
                $notes = "- " . implode("\n- ", $tasks);
            }
        }

        $timesheet->update([
            'clock_out' => $clockOut,
            'total_hours' => round($totalHours, 2),
            'shift_type' => $shiftType,
            'notes' => $notes, // Save the general task notes here
            'latitude' => $clockOutLatitude,    // Save clock-out latitude
            'longitude' => $clockOutLongitude,  // Save clock-out longitude
        ]);

        return back()->with('success', 'Clock-out successful. Hours logged. Shift type: ' . ucfirst($shiftType) . '. Notes saved.');
    }

    // ---
    ## Helper Functions


    protected function determineShiftType(Carbon $clockIn, Carbon $clockOut): string
    {
        $clockInHour = $clockIn->hour;
        $clockOutHour = $clockOut->hour;

        if ($clockInHour >= 6 && $clockOutHour <= 12) {
            return 'morning';
        } elseif ($clockInHour >= 12 && $clockOutHour <= 17) {
            return 'afternoon';
        } elseif ($clockInHour >= 17 && $clockOutHour <= 22) {
            return 'evening';
        } else {
            return 'night';
        }
    }

    /**
     * Calculates the distance between two points on Earth using the Haversine formula.
     *
     * @param float $lat1 Latitude of point 1 (in degrees)
     * @param float $lon1 Longitude of point 1 (in degrees)
     * @param float $lat2 Latitude of point 2 (in degrees)
     * @param float $lon2 Longitude of point 2 (in degrees)
     * @return float Distance in kilometers
     */
    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // Earth's radius in kilometers

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c; // Distance in kilometers

        return $distance;
    }

    public function adminIndex()
    {
        $timesheets = Timesheet::with([
            'user',
            'taskItemAnswers' => function ($query) {
                $query->where('is_completed', true);
            },
            'taskItemAnswers.taskItem.taskCategory',
            'taskItemAnswers.employeePatientAssignment.patient',
            'assignmentSummaries.employeePatientAssignment.patient'
        ])
        ->orderByDesc('work_date')
        ->paginate(10);

        return view('admin.timesheets.index', compact('timesheets'));
    }

    public function approve($id)
    {
        $timesheet = Timesheet::findOrFail($id);
        $timesheet->update(['is_approved' => true]);

        return back()->with('success', 'Timesheet approved.');
    }


    /**
     * Clock Out
     */
//     public function clockOut()
// {
//     $user = Auth::user();
//     $today = Carbon::now()->toDateString();

//     $timesheet = Timesheet::where('user_id', $user->id)->where('work_date', $today)->first();

//     if (!$timesheet || $timesheet->clock_out) {
//         return back()->with('error', 'No active clock-in found for today.');
//     }

//     $clockIn = Carbon::parse($timesheet->clock_in);
//     $clockOut = Carbon::now();
//     $totalHours = $clockIn->diffInMinutes($clockOut) / 60;

//     $shiftType = $this->determineShiftType($clockIn, $clockOut);

//     $timesheet->update([
//         'clock_out' => $clockOut,
//         'total_hours' => round($totalHours, 2),
//         'shift_type' => $shiftType,
//     ]);

//     return back()->with('success', 'Clock-out successful. Hours logged. Shift type: ' . ucfirst($shiftType));
// }


}
