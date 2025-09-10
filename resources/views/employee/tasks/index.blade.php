<x-app-layout>
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">My Assigned Patients & Tasks Summary | Time Now:
                    {{ $currentTime->format('g:i A') }}</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li
                        class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li
                        class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="uil uil-angle-right-b"></i>
                    </li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white"
                        aria-current="page">My Tasks</li>
                </ul>
            </div>

            {{-- <div class="grid grid-cols-1 mt-6">
                <div
                    class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                    @if ($assignments->isNotEmpty())
                        <table class="w-full text-start">
                            <thead class="text-base">
                                <tr>
                                    <th class="text-start p-4 min-w-[192px]">Service User</th>
                                    <th class="text-center p-4 min-w-[150px]">Assigned Time</th>
                                    <th class="text-center p-4 min-w-[150px]">End Time</th>
                                    <th class="text-start p-4 min-w-[250px]">Shift / Task Records</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assignments as $assignment)
                                                    <tr>
                                                        <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                                            <div class="flex items-center">
                                                                <span class="font-medium">{{ $assignment->patient->name }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                                            <span class="text-slate-400">{{ $assignment->assigned_date }}</span>
                                                        </td>
                                                        <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                                            <span class="text-slate-400">{{ $assignment->end_date ? $assignment->end_date :
                                    'No end time' }}</span>
                                                        </td>
                                                        <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                                            @php
                                                                // Group task item answers by timesheet for this assignment
                                                                $taskRecordsByTimesheet = $assignment->taskItemAnswers->groupBy('timesheet_id');
                                                                $totalTasks = \App\Models\TaskItem::count();
                                                                $hasActiveTimesheetRecord = false;
                                                                $activeTimesheetId = \App\Models\Timesheet::where('user_id', Auth::id())
                                                                    ->where('work_date', \Carbon\Carbon::now()->toDateString())
                                                                    ->whereNull('clock_out')
                                                                    ->value('id');
                                                            @endphp

                                                            @if ($taskRecordsByTimesheet->isNotEmpty())
                                                                @foreach ($taskRecordsByTimesheet as $timesheetId => $taskAnswers)
                                                                                    @php
                                                                                        $timesheet = $taskAnswers->first()->timesheet;
                                                                                        $completedTasksForShift = $taskAnswers->where('is_completed', true)->count();
                                                                                        $isCurrentShift = ($activeTimesheetId === $timesheetId);
                                                                                        if ($isCurrentShift)
                                                                                            $hasActiveTimesheetRecord = true;
                                                                                    @endphp
                                                                                    <div class="mb-2">
                                                                                        <span class="font-semibold">Shift: {{ $timesheet->work_date->format('jS M Y') }}
                                                                                            ({{ $timesheet->clock_in->format('H:i') }} - {{ $timesheet->clock_out ?
                                                                    $timesheet->clock_out->format('H:i') : 'Ongoing' }})</span>
                                                                                        <br>
                                                                                        @if ($totalTasks > 0)
                                                                                            <span
                                                                                                class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                                                                {{ $completedTasksForShift }} / {{ $totalTasks }} completed
                                                                                            </span>
                                                                                        @else
                                                                                            <span class="text-slate-400">No tasks defined</span>
                                                                                        @endif
                                                                                        <a href="{{ route('tasks.employee.edit', $assignment->id) }}?timesheet_id={{ $timesheetId }}"
                                                                                            class="ml-2 text-blue-600 hover:text-blue-800 text-sm font-semibold">
                                                                                            {{ $isCurrentShift ? 'Edit Current Shift' : 'View/Edit' }}
                                                                                        </a>
                                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <p class="text-gray-600 dark:text-gray-400">No task records for this patient yet.
                                                                </p>
                                                            @endif

                                                            @if ($activeTimesheetId && !$hasActiveTimesheetRecord)
                                                                <div class="mt-3">
                                                                    <a href="{{ route('tasks.employee.edit', $assignment->id) }}"
                                                                        class="py-1 px-4 inline-block font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-green-600/5 hover:bg-green-600 border-green-600/10 hover:border-green-600 text-green-600 hover:text-white rounded-md">
                                                                        Record Tasks for Current Shift
                                                                    </a>
                                                                </div>
                                                            @elseif (!$activeTimesheetId)
                                                                <p class="text-red-600 dark:text-red-400 mt-2">Clock in to record tasks.</p>
                                                            @endif
                                                        </td>
                                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="p-6 text-center">
                            <p class="text-gray-600 dark:text-gray-400">No patient assignments found for you.</p>
                        </div>
                    @endif
                </div>
            </div> --}}

            <div class="grid grid-cols-1 mt-6">
    <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
        @if ($assignments->isNotEmpty())
            <table class="w-full text-start">
                <thead class="text-base">
                    <tr>
                        <th class="text-start p-4 min-w-[192px]">Service User</th>
                        <th class="text-center p-4 min-w-[250px]">Assigned Days and Times</th>
                        <th class="text-start p-4 min-w-[250px]">Shift / Task Records</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assignments as $assignment)
                        <tr>
                            <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $assignment->patient->name }}</span>
                                </div>
                            </td>
                            <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                @if ($assignment->slots->isNotEmpty())
                                    @foreach ($assignment->slots as $slot)
                                        <div class="text-slate-400">
                                            {{ ucfirst($slot->day_of_week) }}:
                                            {{ \Carbon\Carbon::parse($slot->start_time)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($slot->end_time)->format('H:i') }}
                                        </div>
                                    @endforeach
                                @else
                                    <span class="text-slate-400">No time slots set</span>
                                @endif
                            </td>
                            <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                @php
                                    $taskRecordsByTimesheet = $assignment->taskItemAnswers->groupBy('timesheet_id');
                                    $totalTasks = \App\Models\TaskItem::count();
                                    $hasActiveTimesheetRecord = false;
                                    $activeTimesheetId = \App\Models\Timesheet::where('user_id', Auth::id())
                                        ->where('work_date', \Carbon\Carbon::now()->toDateString())
                                        ->whereNull('clock_out')
                                        ->value('id');
                                @endphp
                                @if ($taskRecordsByTimesheet->isNotEmpty())
                                    @foreach ($taskRecordsByTimesheet as $timesheetId => $taskAnswers)
                                        @php
                                            $timesheet = $taskAnswers->first()->timesheet;
                                            $completedTasksForShift = $taskAnswers->where('is_completed', true)->count();
                                            $isCurrentShift = ($activeTimesheetId === $timesheetId);
                                            if ($isCurrentShift)
                                                $hasActiveTimesheetRecord = true;
                                        @endphp
                                        <div class="mb-2">
                                            <span class="font-semibold">Shift: {{ $timesheet->work_date->format('jS M Y') }}
                                                ({{ $timesheet->clock_in->format('H:i') }} - {{ $timesheet->clock_out ? $timesheet->clock_out->format('H:i') : 'Ongoing' }})</span>
                                            <br>
                                            @if ($totalTasks > 0)
                                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    {{ $completedTasksForShift }} / {{ $totalTasks }} completed
                                                </span>
                                            @else
                                                <span class="text-slate-400">No tasks defined</span>
                                            @endif
                                            <a href="{{ route('tasks.employee.edit', $assignment->id) }}?timesheet_id={{ $timesheetId }}"
                                                class="ml-2 text-blue-600 hover:text-blue-800 text-sm font-semibold">
                                                {{ $isCurrentShift ? 'Edit Current Shift' : 'View/Edit' }}
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-gray-600 dark:text-gray-400">No task records for this patient yet.</p>
                                @endif
                                @if ($activeTimesheetId && !$hasActiveTimesheetRecord)
                                    <div class="mt-3">
                                        <a href="{{ route('tasks.employee.edit', $assignment->id) }}"
                                            class="py-1 px-4 inline-block font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-green-600/5 hover:bg-green-600 border-green-600/10 hover:border-green-600 text-green-600 hover:text-white rounded-md">
                                            Record Tasks for Current Shift
                                        </a>
                                    </div>
                                @elseif (!$activeTimesheetId)
                                    <p class="text-red-600 dark:text-red-400 mt-2">Clock in to record tasks.</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="p-6 text-center">
                <p class="text-gray-600 dark:text-gray-400">No patient assignments found for you.</p>
            </div>
        @endif
    </div>
</div>
        </div>
    </div>


    <div class="fixed-alert-container">
        @if (session('success'))
            <div class="relative px-4 py-2 rounded-md font-medium bg-emerald-600/10 border border-emerald-600/10 text-emerald-600 shadow-lg alert-auto-dismiss"
                role="alert" data-duration="5000">
                <i class="uil uil-check-circle me-1"></i>
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="relative px-4 py-2 rounded-md font-medium bg-red-600/10 border border-red-600/10 text-red-600 shadow-lg alert-auto-dismiss"
                role="alert" data-duration="5000">
                <i class="uil uil-exclamation-octagon me-1"></i>
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="relative px-4 py-2 rounded-md font-medium bg-red-600/10 border border-red-600/10 text-red-600 shadow-lg alert-auto-dismiss"
                role="alert" data-duration="5000">
                <i class="uil uil-exclamation-triangle me-1"></i>
                <strong class="font-bold">Validation Error!</strong>
                <ul class="mt-1 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const alerts = document.querySelectorAll('.alert-auto-dismiss');
                alerts.forEach(alert => {
                    const duration = parseInt(alert.getAttribute('data-duration')) || 5000;

                    setTimeout(() => {
                        alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                        alert.style.opacity = '0';
                        alert.style.transform = 'translateX(100%)';

                        setTimeout(() => {
                            alert.remove();
                        }, 500);
                    }, duration);
                });
            });
        </script>
    @endpush

</x-app-layout>
