<x-app-layout>
    <div class="layout-specing">
        <h5 class="text-lg font-semibold mb-4">Manage Tasks for {{ $assignment->patient->name }}</h5>

        <div class="mt-6">
    <div class="p-6 bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md mb-6">
        <h3 class="text-lg font-semibold mb-2">Patient: {{ $assignment->patient->name }}</h3>
        <p class="text-gray-500 dark:text-gray-400 mb-4">Assigned Days and Times:
            @if ($assignment->slots->isNotEmpty())
                @foreach ($assignment->slots as $slot)
                    <div>
                        {{ ucfirst($slot->day_of_week) }}:
                        {{ \Carbon\Carbon::parse($slot->start_time)->format('H:i') }} -
                        {{ \Carbon\Carbon::parse($slot->end_time)->format('H:i') }}
                    </div>
                @endforeach
            @else
                No time slots set
            @endif
        </p>

        {{-- Display Timesheet Information for Context --}}
        @if ($targetTimesheet)
            <div class="mb-4 p-4 bg-gray-50 dark:bg-gray-800 rounded-md">
                <h4 class="text-md font-semibold text-gray-700 dark:text-gray-300">
                    {{ $targetTimesheet->clock_out ? 'Viewing Tasks for Shift' : 'Recording Tasks for Current Shift' }}
                </h4>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Date: {{ $targetTimesheet->work_date->format('jS F Y') }}
                </p>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Clock In: {{ $targetTimesheet->clock_in->format('H:i') }}
                    @if ($targetTimesheet->clock_out)
                        - Clock Out: {{ $targetTimesheet->clock_out->format('H:i') }}
                    @else
                        (Ongoing)
                    @endif
                </p>
            </div>
        @else
            <div class="mb-4 p-4 bg-red-50 dark:bg-red-800 rounded-md text-red-700 dark:text-red-300">
                No active or specific timesheet found for task management. Please ensure you are clocked in or
                select a valid shift from the previous page.
            </div>
        @endif

        <form method="POST" action="{{ route('tasks.answers.save', $assignment->id) }}">
            @csrf

            {{-- SINGLE Summary Textarea for the entire form/assignment/timesheet --}}
            @if ($targetTimesheet)
                <div class="grid grid-cols-1">
                    <div class="mt-5">
                        <label class="form-label font-medium">Overall Notes for this Assignment & Shift:</label>
                        <div class="form-icon relative mt-2">
                            <i data-feather="message-circle" class="size-4 absolute top-3 start-4"></i>
                            <textarea id="summary_text" name="summary_text"
                                class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                placeholder="Enter any general notes, observations, or summary for all tasks completed for {{ $assignment->patient->name }} during this shift." {{ $targetTimesheet->clock_out ? 'disabled' : '' }}>{{ old('summary_text', optional($summary)->summary_text) }}</textarea>
                        </div>
                    </div>
                </div>
            @endif

            @foreach ($taskCategories as $category)
                <div class="mb-4">
                    <h4 class="text-base font-semibold mb-2">{{ $category->name }}</h4>
                    @if ($category->taskItems->isNotEmpty())
                        @foreach ($category->taskItems as $item)
                            <div class="flex items-center mb-3">
                                <input class="form-checkbox size-4 appearance-none rounded border border-gray-200 dark:border-gray-800 accent-indigo-600 checked:appearance-auto dark:accent-indigo-600 focus:border-indigo-300 focus:ring-0 focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50 me-2" type="checkbox" name="answers[{{ $item->id }}][is_completed]"
                                    id="task_{{ $assignment->id }}_{{ $item->id }}" value="1"
                                    {{ optional($assignment->taskItemAnswers->where('task_item_id', $item->id)->where('timesheet_id', optional($targetTimesheet)->id)->first())->is_completed ? 'checked' : '' }}
                                    {{ $targetTimesheet && $targetTimesheet->clock_out ? 'disabled' : '' }}>
                                <input type="hidden" name="answers[{{ $item->id }}][task_item_id]"
                                    value="{{ $item->id }}">
                                <label for="task_{{ $assignment->id }}_{{ $item->id }}"
                                    class="form-check-label text-slate-400">{{ $item->name }}</label>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-500 dark:text-gray-400">No task items in this category.</p>
                    @endif
                </div>
            @endforeach
            <button type="submit"
                class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md"
                {{ $targetTimesheet && $targetTimesheet->clock_out ? 'disabled' : '' }}>
                Save Task Statuses
            </button>
            <a href="{{ route('tasks.employee.index') }}"
                class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-200 hover:bg-gray-300 border-gray-200 hover:border-gray-300 text-gray-800 rounded-md ml-2">
                Back to Assignments
            </a>
        </form>
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
