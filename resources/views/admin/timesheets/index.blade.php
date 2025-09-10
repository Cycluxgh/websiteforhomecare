<x-app-layout>

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Timesheet</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li
                        class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white">
                        <a href="/">Website-For-Homecare</a>
                    </li>
                    <li
                        class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="uil uil-angle-right-b"></i>
                    </li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white"
                        aria-current="page">Timesheet</li>
                </ul>
            </div>

            <div class="grid grid-cols-1 mt-6">
                <div
                    class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                    <table class="w-full text-start">
                        <thead class="text-base">
                            <tr>
                                <th class="text-start p-4 min-w-[150px]">Employee Name</th>
                                <th class="text-center p-4 min-w-[150px]">Work Date</th>
                                <th class="text-center p-4 min-w-[150px]">Clock In</th>
                                <th class="text-center p-4 min-w-[150px]">Clock Out</th>
                                <th class="text-center p-4 min-w-[150px]">Location</th>
                                {{-- <th class="text-center p-4 min-w-[150px]">Total Hours</th> --}}
                                <th class="text-start p-4 min-w-[150px]">Shift Type</th>
                                <th class="text-center p-4 min-w-[150px]">General Notes</th>
                                <th class="text-center p-4 min-w-[150px]">Patient Summaries</th>
                                <th class="text-center p-4 min-w-[100px]">Approved</th>
                                <th class="text-end p-4 min-w-[120px]">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($timesheets->isEmpty())
                            <tr>
                                <td class="px-4 py-8 border-t border-gray-100 dark:border-gray-800" colspan="11"> {{--
                                        Adjust colspan --}}
                                    <div class="text-center text-gray-500 dark:text-gray-400">
                                        No timesheets found.
                                    </div>
                                </td>
                            </tr>
                            @else
                            @foreach ($timesheets as $timesheet)
                            <tr>
                                <th class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                    {{ $timesheet->user->name ?? 'Unknown User' }}
                                </th>
                                <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                    {{ $timesheet->work_date->format('jS F Y') }}
                                </td>
                                <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                    {{ $timesheet->clock_in->format('h:i A') }}
                                </td>
                                <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                    @if ($timesheet->clock_out)
                                    {{ $timesheet->clock_out->format('h:i A') }}
                                    @else
                                    -
                                    @endif
                                </td>
                                <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                    @if ($timesheet->latitude && $timesheet->longitude)
                                    <strong>Lat:</strong> {{ $timesheet->latitude }}<br>
                                    <strong>Long:</strong> {{ $timesheet->longitude }}
                                    @else
                                    -
                                    @endif
                                </td>
                                {{-- <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                            {{ $timesheet->total_hours }}
                                </td> --}}
                                <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                    {{ $timesheet->shift_type }}
                                </td>
                                <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                    @if($timesheet->notes)
                                    <button onclick="showNotes(`{{ addslashes($timesheet->notes) }}`)"
                                        class="text-blue-600 hover:underline">View Notes</button>
                                    @else
                                    <span class="text-gray-400">None</span>
                                    @endif
                                </td>
                                {{-- NEW COLUMN FOR DETAILED TASKS --}}
                                <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                    {{-- This button will now show both tasks and summaries --}}
                                    @php
                                    // Prepare tasks data
                                    $tasksData = $timesheet->taskItemAnswers->map(function ($answer) {
                                    return [
                                    'type' => 'task', // Indicate this is a task
                                    'task_name' => $answer->taskItem->name ?? 'N/A',
                                    'task_category_name' => $answer->taskItem->taskCategory->name ?? 'N/A',
                                    'patient_name' => $answer->employeePatientAssignment->patient->name ?? 'Unassigned Patient',
                                    'is_completed' => $answer->is_completed,
                                    'completed_at' => $answer->completed_at ? $answer->completed_at->format('h:i A') : 'N/A'
                                    ];
                                    })->toArray();

                                    // Prepare summaries data
                                    $summariesData = $timesheet->assignmentSummaries->map(function ($summary) {
                                    return [
                                    'type' => 'summary', // Indicate this is a summary
                                    'patient_name' => $summary->employeePatientAssignment->patient->name ?? 'Unassigned Patient',
                                    'summary_text' => $summary->summary_text ?? 'No summary provided.'
                                    ];
                                    })->toArray();

                                    // Merge and encode for JavaScript
                                    $combinedData = json_encode(array_merge($tasksData, $summariesData));
                                    @endphp

                                    @if($timesheet->taskItemAnswers->isNotEmpty() || $timesheet->assignmentSummaries->isNotEmpty())
                                    <button onclick="showDetailedTasks({{ $combinedData }})" class="text-blue-600 hover:underline">
                                        View Details
                                    </button>
                                    @else
                                    <span class="text-gray-400">No Details Recorded</span>
                                    @endif
                                </td>
                                {{-- END NEW COLUMN --}}
                                <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                    @if ($timesheet->is_approved)
                                    <span class="text-green-500">Yes</span>
                                    @else
                                    <span class="text-red-500">No</span>
                                    @endif
                                </td>
                                <td class="text-end border-t border-gray-100 dark:border-gray-800 p-4">
                                    @if (!$timesheet->is_approved)
                                    <form action="{{ route('admin.timesheets.approve', $timesheet->id) }}" method="POST"
                                        class="inline ms-2">
                                        @csrf
                                        <button type="submit" style="cursor: pointer;"
                                            class="py-1 px-2 inline-block font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md"
                                            title="Approve Timesheet">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        </button>
                                    </form>
                                    @endif
                                    {{-- <form action="#" method="POST" class="inline ms-2">
                                                @method('DELETE')
                                                <button type="submit" style="cursor: pointer;"
                                                    class="py-1 px-2 inline-block font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-blue-600/5 hover:bg-blue-600 border-red-600/10 hover:border-red-600 text-red-600 hover:text-white rounded-md"
                                                    title="Delete Timesheet">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form> --}}
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="mt-5 flex items-center justify-between">
                    <div>
                        @if ($timesheets->onFirstPage())
                        <span
                            class="size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 border-gray-100 dark:border-gray-700 text-slate-400 rounded-full cursor-not-allowed opacity-50"><i
                                class="mdi mdi-arrow-left"></i></span>
                        @else
                        <a href="{{ $timesheets->previousPageUrl() }}"
                            class="size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 border-gray-100 dark:border-gray-700 text-slate-400 hover:text-slate-900 dark:hover:text-white rounded-full"><i
                                class="mdi mdi-arrow-left"></i></a>
                        @endif

                        @if ($timesheets->hasMorePages())
                        <a href="{{ $timesheets->nextPageUrl() }}"
                            class="ms-2 size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 border-gray-100 dark:border-gray-700 text-slate-400 hover:text-slate-900 dark:hover:text-white rounded-full"><i
                                class="mdi mdi-arrow-right"></i></a>
                        @else
                        <span
                            class="ms-2 size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 border-gray-100 dark:border-gray-700 text-slate-400 rounded-full cursor-not-allowed opacity-50"><i
                                class="mdi mdi-arrow-right"></i></span>
                        @endif
                    </div>

                    <span class="text-slate-400">Showing {{ $timesheets->firstItem() }} - {{ $timesheets->lastItem() }}
                        out of {{ $timesheets->total() }}</span>
                </div>
            </div>
        </div>
    </div>

    <dialog id="notesModal"
        class="rounded-md shadow-sm dark:shadow-gray-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white m-auto">
        <div class="relative h-auto md:w-[480px] w-300px">
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                <h3 class="font-bold text-lg">General Notes</h3>
                <form method="dialog">
                    <button
                        class="size-6 flex justify-center items-center shadow-sm dark:shadow-gray-800 rounded-md btn-ghost"><i
                            data-feather="x" class="size-4"></i></button>
                </form>
            </div>
            <div class="p-6 text-center">
                <div id="notesContent"
                    class="whitespace-pre-line text-lg text-gray-700 dark:text-gray-300 overflow-auto flex-grow">
                </div>
            </div>
        </div>
    </dialog>


    <dialog id="detailedTasksModal" class="rounded-lg shadow-xl dark:shadow-2xl bg-white dark:bg-gray-900 text-gray-900 dark:text-white m-auto max-w-2xl">
        <div class="relative">
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="font-extrabold text-2xl text-gray-800 dark:text-white">Detailed Shift Tasks</h3>
                <form method="dialog">
                    <button onclick="closeDetailedTasksModal()"
                        class="size-8 flex justify-center items-center rounded-full text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </form>
            </div>
            <div class="p-6 overflow-y-auto max-h-[70vh]">
                <ul id="modalDetailedTasksContent" class="text-base text-gray-700 dark:text-gray-300 space-y-4 break-words">
                </ul>
            </div>
        </div>
    </dialog>


</x-app-layout>

<script>
    function showNotes(notes) {
        const modal = document.getElementById('notesModal');
        const content = document.getElementById('notesContent');
        content.innerText = notes;
        modal.showModal();
    }

    function showDetailedTasks(combinedData) {
        const modal = document.getElementById('detailedTasksModal');
        const ul = document.getElementById('modalDetailedTasksContent');
        ul.innerHTML = ''; // Clear previous content

        if (combinedData.length === 0) {
            ul.innerHTML = '<li class="text-gray-500 italic">No detailed tasks or summaries recorded for this shift.</li>';
            modal.showModal();
            return;
        }

        // Separate tasks and summaries
        const tasks = combinedData.filter(item => item.type === 'task');
        const summaries = combinedData.filter(item => item.type === 'summary');

        // Group tasks by patient first
        const tasksByPatient = {};
        tasks.forEach(task => {
            const patientName = task.patient_name || 'Unassigned Patient';
            if (!tasksByPatient[patientName]) {
                tasksByPatient[patientName] = {
                    summaries: [],
                    tasks: []
                };
            }
            tasksByPatient[patientName].tasks.push(task);
        });

        // Group summaries by patient
        summaries.forEach(summary => {
            const patientName = summary.patient_name || 'Unassigned Patient';
            if (!tasksByPatient[patientName]) {
                tasksByPatient[patientName] = {
                    summaries: [],
                    tasks: []
                };
            }
            tasksByPatient[patientName].summaries.push(summary);
        });

        // Loop through patients (maintaining order from taskItemAnswers first, then summaries)
        const allPatientNames = [...new Set([...tasks.map(t => t.patient_name), ...summaries.map(s => s.patient_name)])];

        allPatientNames.forEach(patientName => {
            const patientData = tasksByPatient[patientName] || {
                summaries: [],
                tasks: []
            };

            const patientLi = document.createElement('li');
            patientLi.className = 'border-b border-gray-100 dark:border-gray-800 pb-4 mb-4 last:border-b-0 last:pb-0 last:mb-0';
            patientLi.innerHTML = `<h4 class="font-bold text-xl text-blue-950 dark:text-blue-400 mb-2">${patientName}</h4>`;
            ul.appendChild(patientLi);

            const patientContentUl = document.createElement('ul');
            patientContentUl.className = 'list-none space-y-3'; // Use list-none for overall patient content
            patientLi.appendChild(patientContentUl);

            // Display patient-specific summaries first
            if (patientData.summaries.length > 0) {
                patientData.summaries.forEach(summary => {
                    const summaryLi = document.createElement('li');
                    summaryLi.innerHTML = `
                        <p class="font-bold text-gray-800 dark:text-gray-200 mb-1">Overall Shift Summary:</p>
                        <p class="text-gray-700 dark:text-gray-300 ml-4 whitespace-pre-line break-words">${summary.summary_text}</p>
                    `;
                    patientContentUl.appendChild(summaryLi);
                });
            }

            // Display detailed tasks
            if (patientData.tasks.length > 0) {
                const tasksSectionLi = document.createElement('li');
                tasksSectionLi.innerHTML = `<h5 class="font-semibold text-gray-800 dark:text-gray-200 mt-3 mb-2">Detailed Tasks:</h5>`;
                patientContentUl.appendChild(tasksSectionLi);

                const patientTasksUl = document.createElement('ul');
                patientTasksUl.className = 'list-disc ml-8 space-y-2'; // Nested list for tasks
                tasksSectionLi.appendChild(patientTasksUl);

                // Group tasks for the current patient by category
                const tasksByCategory = {};
                patientData.tasks.forEach(task => {
                    const categoryName = task.task_category_name || 'General Tasks';
                    if (!tasksByCategory[categoryName]) {
                        tasksByCategory[categoryName] = [];
                    }
                    tasksByCategory[categoryName].push(task);
                });

                for (const categoryName in tasksByCategory) {
                    const categoryLi = document.createElement('li');
                    categoryLi.className = 'mt-2'; // Margin for categories
                    categoryLi.innerHTML = `<strong class="text-gray-800 dark:text-gray-200">${categoryName}:</strong>`;
                    patientTasksUl.appendChild(categoryLi);

                    const categoryTasksUl = document.createElement('ul');
                    categoryTasksUl.className = 'list-disc ml-5 space-y-1'; // Deeper nested list for specific tasks
                    categoryLi.appendChild(categoryTasksUl);

                    tasksByCategory[categoryName].forEach(task => {
                        const li = document.createElement('li');
                        const status = task.is_completed ? 'Completed' : 'Not Completed';
                        const statusClass = task.is_completed ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400';
                        const completedTime = task.is_completed && task.completed_at !== 'N/A' ? ` at ${task.completed_at}` : '';

                        li.innerHTML = `
                            ${task.task_name} - <span class="${statusClass} font-medium">${status}</span>${completedTime}
                        `;
                        categoryTasksUl.appendChild(li);
                    });
                }
            }
        });

        modal.showModal();
    }

    function closeDetailedTasksModal() {
        const modal = document.getElementById('detailedTasksModal');
        modal.close();
    }
</script>