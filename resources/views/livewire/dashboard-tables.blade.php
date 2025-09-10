<div class="grid lg:grid-cols-12 grid-cols-1 mt-6 gap-6">
    <!-- Job Applications Table -->
    <div class="xl:col-span-5 lg:col-span-12">
        <div class="relative overflow-hidden rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
            <div class="p-6 flex items-center justify-between border-b border-gray-100 dark:border-gray-800">
                <h6 class="text-lg font-semibold">Job Applications ({{ $jobApplicationsCount }})</h6>

                <a href="{{ route('applications.index') }}"
                    class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-slate-400 dark:text-white/70 hover:text-blue-600 dark:hover:text-white after:bg-red-600 dark:after:bg-white duration-500">
                    View Job Applications <i class="uil uil-arrow-right"></i>
                </a>
            </div>

            <div class="relative overflow-x-auto block w-full max-h-[400px]" data-simplebar>
                <table class="w-full text-start">
                    <thead class="text-base">
                        <tr>
                            <th class="text-start font-semibold text-[15px] p-4 min-w-[50px]">Applicant Name</th>
                            <th class="text-start font-semibold text-[15px] p-4 min-w-[128px]">Applied At</th>
                            <th class="text-end font-semibold text-[15px] p-4 min-w-[128px]">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jobApplications as $application)
                        <tr>
                            <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                {{ $application->first_name }} {{ $application->full_name }}
                            </td>
                            <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                <span class="text-slate-400">{{ $application->created_at->format('jS M Y') }}</span>
                            </td>
                            <td class="text-end border-t border-gray-100 dark:border-gray-800 p-4">
                                @php
                                $statusClass = match(strtolower($application->status)) {
                                'selected' => 'bg-emerald-600/10 dark:bg-emerald-600/20 border-emerald-600/10
                                dark:border-emerald-600/20 text-emerald-600',
                                'rejected' => 'bg-red-600/10 dark:bg-red-600/20 border-red-600/10 dark:border-red-600/20
                                text-red-600',
                                'shortlisted_for_interview' => 'bg-blue-600/10 dark:bg-blue-600/20 border-blue-600/10
                                dark:border-blue-600/20 text-blue-600',
                                default => 'bg-blue-600/10 dark:bg-blue-600/20 border-blue-600/10
                                dark:border-blue-600/20 text-blue-600',
                                };
                                @endphp
                                <span
                                    class="{{ $statusClass }} border text-[12px] font-bold px-2.5 py-0.5 rounded h-5 ms-1 capitalize">
                                    {{ str_replace('_', ' ', ucwords($application->status)) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3"
                                class="text-center border-t border-gray-100 dark:border-gray-800 p-4 text-slate-400">
                                No recent job applications
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Employees Table -->
    <div class="xl:col-span-3 lg:col-span-12">
        <div class="relative overflow-hidden rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
            <div class="p-6 flex items-center justify-between border-b border-gray-100 dark:border-gray-800">
                <h6 class="text-lg font-semibold">Employees ({{ $employeesCount }})</h6>

                <a href="{{ route('admin.employees.index') }}"
                    class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-slate-400 dark:text-white/70 hover:text-blue-600 dark:hover:text-white after:bg-red-600 dark:after:bg-white duration-500">
                    View Employees <i class="uil uil-arrow-right"></i>
                </a>
            </div>

            <div class="relative overflow-x-auto block w-full max-h-[400px]" data-simplebar>
                <table class="w-full text-start">
                    <thead class="text-base">
                        <tr>
                            <th class="text-start font-semibold text-[15px] p-4 min-w-[128px]">Employee Name</th>
                            <th class="text-start font-semibold text-[15px] p-4 min-w-[128px]">Hire Date</th>
                            <th class="text-end font-semibold text-[15px] p-4 min-w-[128px]">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($employees as $employee)
                        <tr>
                            <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                {{ $employee->user->name ?? 'N/A' }}
                            </td>
                            <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                <span class="text-slate-400">{{ $employee->start_date?->format('jS M Y') ?? 'N/A'
                                    }}</span>
                            </td>
                            <td class="text-end border-t border-gray-100 dark:border-gray-800 p-4">
                                @php
                                $statusClass = $employee->active
                                ? 'bg-emerald-600/10 dark:bg-emerald-600/20 border-emerald-600/10
                                dark:border-emerald-600/20 text-emerald-600'
                                : 'bg-red-600/10 dark:bg-red-600/20 border-red-600/10 dark:border-red-600/20
                                text-red-600';
                                @endphp
                                <span
                                    class="{{ $statusClass }} border text-[12px] font-bold px-2.5 py-0.5 rounded h-5 ms-1">
                                    {{ $employee->active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3"
                                class="text-center border-t border-gray-100 dark:border-gray-800 p-4 text-slate-400">
                                No active employees
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Timesheets Table -->
    <div class="xl:col-span-4 lg:col-span-12">
        <div class="relative overflow-hidden rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
            <div class="p-6 flex items-center justify-between border-b border-gray-100 dark:border-gray-800">
                <h6 class="text-lg font-semibold">Timesheets ({{ $timesheetsCount }})</h6>

                <a href="{{ route('admin.timesheets.index') }}"
                    class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-slate-400 dark:text-white/70 hover:text-blue-600 dark:hover:text-white after:bg-red-600 dark:after:bg-white duration-500">
                    View Timesheets <i class="uil uil-arrow-right"></i>
                </a>
            </div>

            <div class="relative overflow-x-auto block w-full max-h-[400px]" data-simplebar>
                <table class="w-full text-start">
                    <thead class="text-base">
                        <tr>
                            <th class="text-start font-semibold text-[15px] p-4 min-w-[128px]">Employee</th>
                            <th class="text-start font-semibold text-[15px] p-4 min-w-[128px]">Work Date</th>
                            <th class="text-end font-semibold text-[15px] p-4 min-w-[128px]">Shift Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($timesheets as $timesheet)
                        <tr>
                            <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                {{ $timesheet->user->name ?? 'N/A' }}
                            </td>
                            <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                <span class="text-slate-400">{{ $timesheet->work_date?->format('jS M Y') ?? 'N/A'
                                    }}</span>
                            </td>
                            <td class="text-end border-t border-gray-100 dark:border-gray-800 p-4">
                                @php
                                $shiftClass = match(strtolower($timesheet->shift_type)) {
                                'day' => 'bg-blue-600/10 dark:bg-blue-600/20 border-blue-600/10 dark:border-blue-600/20
                                text-blue-600',
                                'night' => 'bg-blue-600/10 dark:bg-blue-600/20 border-blue-600/10
                                dark:border-blue-600/20 text-blue-600',
                                default => 'bg-gray-600/10 dark:bg-gray-600/20 border-gray-600/10
                                dark:border-gray-600/20 text-gray-600',
                                };
                                @endphp
                                <span
                                    class="{{ $shiftClass }} border text-[12px] font-bold px-2.5 py-0.5 rounded h-5 ms-1 capitalize">
                                    {{ $timesheet->shift_type ?? 'N/A' }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3"
                                class="text-center border-t border-gray-100 dark:border-gray-800 p-4 text-slate-400">
                                No recent timesheets
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
