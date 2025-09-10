<x-app-layout>

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">My Timesheet</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white"><a href="/">Website-For-Homecare</a></li>
                    <li class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="uil uil-angle-right-b"></i></li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white" aria-current="page">My Timesheet</li>
                </ul>
            </div>

            <div class="grid grid-cols-1 mt-6">
                <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                    <table class="w-full text-start">
                        <thead class="text-base">
                            <tr>
                                <th class="text-center p-4 min-w-[150px]">Work Date</th>
                                <th class="text-center p-4 min-w-[150px]">Clock In</th>
                                <th class="text-center p-4 min-w-[150px]">Clock Out</th>
                                <th class="text-center p-4 min-w-[150px]">Total Hours</th>
                                <th class="text-start p-4 min-w-[150px]">Shift Type</th>
                                <th class="text-center p-4 min-w-[100px]">Tasks Completed</th>
                                <th class="text-center p-4 min-w-[100px]">Approved</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($timesheets->isEmpty())
                                <tr>
                                    <td class="px-4 py-8 border-t border-gray-100 dark:border-gray-800" colspan="8">
                                        <div class="text-center text-gray-500 dark:text-gray-400">
                                            No timesheets found.
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($timesheets as $timesheet)
                                    <tr>
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
                                            {{ $timesheet->total_hours }}
                                        </td>
                                        <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                            {{ $timesheet->shift_type }}
                                        </td>
                                        <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                            @if($timesheet->notes)
                                                <button onclick="showNotes(`{{ addslashes($timesheet->notes) }}`)" class="text-blue-600 hover:underline">View</button>
                                            @else
                                                <span class="text-gray-400">None</span>
                                            @endif
                                        </td>
                                        <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                            @if ($timesheet->is_approved)
                                                <span class="text-green-500">Yes</span>
                                            @else
                                                <span class="text-red-500">No</span>
                                            @endif
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
                            <span class="size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 border-gray-100 dark:border-gray-700 text-slate-400 rounded-full cursor-not-allowed opacity-50"><i class="mdi mdi-arrow-left"></i></span>
                        @else
                            <a href="{{ $timesheets->previousPageUrl() }}" class="size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 border-gray-100 dark:border-gray-700 text-slate-400 hover:text-slate-900 dark:hover:text-white rounded-full"><i class="mdi mdi-arrow-left"></i></a>
                        @endif

                        @if ($timesheets->hasMorePages())
                            <a href="{{ $timesheets->nextPageUrl() }}" class="ms-2 size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 border-gray-100 dark:border-gray-700 text-slate-400 hover:text-slate-900 dark:hover:text-white rounded-full"><i class="mdi mdi-arrow-right"></i></a>
                        @else
                            <span class="ms-2 size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 border-gray-100 dark:border-gray-700 text-slate-400 rounded-full cursor-not-allowed opacity-50"><i class="mdi mdi-arrow-right"></i></span>
                        @endif
                    </div>

                    <span class="text-slate-400">Showing {{ $timesheets->firstItem() }} - {{ $timesheets->lastItem() }} out of {{ $timesheets->total() }}</span>
                </div>
            </div>
            <!-- End Content -->
        </div>
    </div>


    <dialog id="notesModal" class="rounded-md shadow-sm dark:shadow-gray-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white m-auto">
        <div class="relative h-auto md:w-[480px] w-300px">
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                <h3 class="font-bold text-lg">Tasks Completed</h3>
                <form method="dialog">
                    <button class="size-6 flex justify-center items-center shadow-sm dark:shadow-gray-800 rounded-md btn-ghost"><i data-feather="x" class="size-4"></i></button>
                </form>
            </div>
            <div class="p-6 text-center">
                <div id="notesContent" class="whitespace-pre-line text-lg text-gray-700 dark:text-gray-300 overflow-auto flex-grow">
                </div>
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
</script>

