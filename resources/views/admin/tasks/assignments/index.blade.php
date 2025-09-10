<x-app-layout>
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Employee-Patient Assignments</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li
                        class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white">
                        <a href="index.html">Dashboard</a>
                    </li>
                    <li
                        class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="uil uil-angle-right-b"></i>
                    </li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white"
                        aria-current="page">Assignments</li>
                </ul>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 mt-6">
                <div
                    class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                    @if ($assignments->isNotEmpty())
                        <table class="w-full text-start">
                            <thead class="text-base">
                                <tr>
                                    <th class="text-start p-4 min-w-[192px]">Employee</th>
                                    <th class="text-start p-4 min-w-[192px]">Patient</th>
                                    <th class="text-center p-4 min-w-[150px]">Assigned Days and Times</th>
                                    <th class="text-center p-4 min-w-[200px]">Task Completion</th>
                                    <th class="text-end p-4 min-w-[200px]">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assignments as $assignment)
                                    <tr>
                                        <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                            <a href="#" class="hover:text-blue-600">
                                                <div class="flex items-center">
                                                    <span
                                                        class="font-medium">{{ $assignment->employeeProfile->user->name ?? 'Unknown User' }}</span>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                            <a href="#" class="hover:text-blue-600">
                                                <div class="flex items-center">
                                                    <span class="font-medium">{{ $assignment->patient->name }}</span>
                                                </div>
                                            </a>
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
                                        <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                            @php
                                                $completed = $assignment->taskItemAnswers->where('is_completed', true)->count();
                                                $total = $assignment->taskItemAnswers->count();
                                            @endphp
                                            @if ($total > 0)
                                                <span
                                                    class="bg-blue-600/10 dark:bg-blue-600/20 text-blue-600 text-[12px] font-bold px-2.5 py-0.5 rounded h-5">
                                                    {{ $completed }} / {{ $total }} completed
                                                </span>
                                            @else
                                                <span class="text-slate-400">No tasks recorded</span>
                                            @endif
                                        </td>
                                        <td class="text-end border-t border-gray-100 dark:border-gray-800 p-4">
                                            <a href="{{ route('tasks.assignments.edit', $assignment->id) }}"
                                                class="py-1 px-4 inline-block font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-blue-600/5 hover:bg-blue-600 border-blue-600/10 hover:border-blue-600 text-blue-600 hover:text-white rounded-md">
                                                Edit
                                            </a>
                                            <form action="{{ route('tasks.assignments.destroy', $assignment->id) }}"
                                                method="POST" class="inline-block"
                                                onsubmit="return confirm('Are you sure you want to delete this assignment?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="py-1 px-4 inline-block font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-red-600/5 hover:bg-red-600 border-red-600/10 hover:border-red-600 text-red-600 hover:text-white rounded-md ms-2">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="p-6 text-center">
                            <p class="text-gray-600 dark:text-gray-400">No assignments found.</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-5 flex items-center justify-between">
                <div>
                    @if ($assignments->onFirstPage())
                        <span
                            class="size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 border-gray-100 dark:border-gray-700 text-slate-400 rounded-full cursor-not-allowed opacity-50"><i
                                class="mdi mdi-arrow-left"></i></span>
                    @else
                        <a href="{{ $assignments->previousPageUrl() }}"
                            class="size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 border-gray-100 dark:border-gray-700 text-slate-400 hover:text-slate-900 dark:hover:text-white rounded-full"><i
                                class="mdi mdi-arrow-left"></i></a>
                    @endif

                    @if ($assignments->hasMorePages())
                        <a href="{{ $assignments->nextPageUrl() }}"
                            class="ms-2 size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 border-gray-100 dark:border-gray-700 text-slate-400 hover:text-slate-900 dark:hover:text-white rounded-full"><i
                                class="mdi mdi-arrow-right"></i></a>
                    @else
                        <span
                            class="ms-2 size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 border-gray-100 dark:border-gray-700 text-slate-400 rounded-full cursor-not-allowed opacity-50"><i
                                class="mdi mdi-arrow-right"></i></span>
                    @endif
                </div>

                <span class="text-slate-400">Showing {{ $assignments->firstItem() }} -
                    {{ $assignments->lastItem() }} out of {{ $assignments->total() }}</span>
            </div>

            <div class="mt-6">
                <a href="{{ route('tasks.assign.create') }}"
                    class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md">
                    Create New Assignment
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
