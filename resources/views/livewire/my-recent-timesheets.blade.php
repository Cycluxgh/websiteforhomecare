<div class="xl:col-span-12 lg:col-span-12">
    <div class="relative overflow-hidden rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
        <div class="p-6 flex items-center justify-between border-b border-gray-100 dark:border-gray-800">
            <h6 class="text-lg font-semibold">My Recent Timesheet</h6>

            <a href="{{ route('employee.timesheets.index') }}"
                class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-slate-400 dark:text-white/70 hover:text-blue-600 dark:hover:text-white after:bg-red-600 dark:after:bg-white duration-500">
                View My Recent Timesheet <i class="uil uil-arrow-right"></i>
            </a>
        </div>

        <div class="relative overflow-x-auto block w-full max-h-[400px]" data-simplebar>
            @if ($timesheets->isEmpty())
                <p class="p-4 text-center text-gray-500 dark:text-gray-400">No recent timesheets found.</p>
            @else
                <table class="w-full text-start">
                    <thead class="text-base">
                        <tr>
                            <th class="text-start font-semibold text-[15px] p-4 min-w-[128px]">Timesheet ID</th>
                            <th class="text-start font-semibold text-[15px] p-4 min-w-[128px]">Work Date</th>
                            <th class="text-end font-semibold text-[15px] p-4 min-w-[128px]">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($timesheets as $timesheet)
                            <tr>
                                <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">#{{ $timesheet->id }}</td>
                                <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                    {{-- `work_date` is already a Carbon instance due to model casting --}}
                                    <span class="text-slate-400">{{ $timesheet->work_date->format('jS M Y') }}</span>
                                </td>
                                <td class="text-end border-t border-gray-100 dark:border-gray-800 p-4">
                                    @if ($timesheet->is_approved)
                                        <span class="bg-emerald-600/10 dark:bg-emerald-600/20 border border-emerald-600/10 dark:border-emerald-600/20 text-emerald-600 text-[12px] font-bold px-2.5 py-0.5 rounded h-5 ms-1">Approved</span>
                                    @else
                                        <span class="bg-amber-600/10 dark:bg-amber-600/20 border border-amber-600/10 dark:border-amber-600/20 text-amber-600 text-[12px] font-bold px-2.5 py-0.5 rounded h-5 ms-1">Pending</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
