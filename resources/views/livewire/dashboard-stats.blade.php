<div class="grid xl:grid-cols-4 md:grid-cols-3 grid-cols-1 mt-6 gap-6">
    <!-- Job Postings Card -->
    <div class="relative overflow-hidden rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
        <div class="p-5 flex items-center">
            <span class="flex justify-center items-center rounded-md size-14 min-w-[56px] bg-blue-600/5 dark:bg-blue-600/10 shadow-sm shadow-blue-600/5 dark:shadow-blue-600/10 text-blue-600">
                <i data-feather="users" class="size-5"></i>
            </span>

            <span class="ms-3">
                <span class="text-slate-400 font-semibold block">Job Postings</span>
                <span class="flex items-center justify-between mt-1">
                    <span class="text-xl font-semibold"><span>{{ number_format($jobPostingsCount) }}</span></span>
                    <span class="{{ $jobPostingsChange >= 0 ? 'text-emerald-600' : 'text-blue-600' }} text-sm ms-1 font-semibold">
                        <i class="uil {{ $jobPostingsChange >= 0 ? 'uil-arrow-growth' : 'uil-chart-down' }}"></i>
                        {{ abs($jobPostingsChange) }}%
                    </span>
                </span>
            </span>
        </div>

        <div class="px-5 py-4 bg-gray-50 dark:bg-slate-800">
            <a href="{{ route('admin.job_postings.index') }}"
                class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-blue-600 dark:text-white/70 hover:text-blue-600 dark:hover:text-white after:bg-blue-600 dark:after:bg-white duration-500">
                View data <i class="uil uil-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- Job Applications Card -->
    <div class="relative overflow-hidden rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
        <div class="p-5 flex items-center">
            <span class="flex justify-center items-center rounded-md size-14 min-w-[56px] bg-blue-600/5 dark:bg-blue-600/10 shadow-sm shadow-blue-600/5 dark:shadow-blue-600/10 text-blue-600">
                <i data-feather="award" class="size-5"></i>
            </span>

            <span class="ms-3">
                <span class="text-slate-400 font-semibold block">Job Applications</span>
                <span class="flex items-center justify-between mt-1">
                    <span class="text-xl font-semibold">{{ number_format($jobApplicationsCount) }}</span>
                    <span class="{{ $jobApplicationsChange >= 0 ? 'text-emerald-600' : 'text-blue-600' }} text-sm ms-1 font-semibold">
                        <i class="uil {{ $jobApplicationsChange >= 0 ? 'uil-arrow-growth' : 'uil-chart-down' }}"></i>
                        {{ abs($jobApplicationsChange) }}%
                    </span>
                </span>
            </span>
        </div>

        <div class="px-5 py-4 bg-gray-50 dark:bg-slate-800">
            <a href="{{ route('applications.index') }}"
                class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-blue-600 dark:text-white/70 hover:text-blue-600 dark:hover:text-white after:bg-blue-600 dark:after:bg-white duration-500">
                View data <i class="uil uil-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- Employees Card -->
    <div class="relative overflow-hidden rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
        <div class="p-5 flex items-center">
            <span class="flex justify-center items-center rounded-md size-14 min-w-[56px] bg-blue-600/5 dark:bg-blue-600/10 shadow-sm shadow-blue-600/5 dark:shadow-blue-600/10 text-blue-600">
                <i data-feather="shopping-cart" class="size-5"></i>
            </span>

            <span class="ms-3">
                <span class="text-slate-400 font-semibold block">Employees</span>
                <span class="flex items-center justify-between mt-1">
                    <span class="text-xl font-semibold">{{ number_format($employeesCount) }}+</span>
                    <span class="{{ $employeesChange >= 0 ? 'text-emerald-600' : 'text-blue-600' }} text-sm ms-1 font-semibold">
                        <i class="uil {{ $employeesChange >= 0 ? 'uil-arrow-growth' : 'uil-chart-down' }}"></i>
                        {{ abs($employeesChange) }}%
                    </span>
                </span>
            </span>
        </div>

        <div class="px-5 py-4 bg-gray-50 dark:bg-slate-800">
            <a href="{{ route('admin.employees.index') }}"
                class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-blue-600 dark:text-white/70 hover:text-blue-600 dark:hover:text-white after:bg-blue-600 dark:after:bg-white duration-500">
                View data <i class="uil uil-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- Policies Card -->
    {{-- <div class="relative overflow-hidden rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
        <div class="p-5 flex items-center">
            <span class="flex justify-center items-center rounded-md size-14 min-w-[56px] bg-blue-600/5 dark:bg-blue-600/10 shadow-sm shadow-blue-600/5 dark:shadow-blue-600/10 text-blue-600">
                <i data-feather="shopping-bag" class="size-5"></i>
            </span>

            <span class="ms-3">
                <span class="text-slate-400 font-semibold block">Policies</span>
                <span class="flex items-center justify-between mt-1">
                    <span class="text-xl font-semibold">{{ number_format($policiesCount) }}</span>
                    <span class="{{ $policiesChange >= 0 ? 'text-emerald-600' : 'text-blue-600' }} text-sm ms-1 font-semibold">
                        <i class="uil {{ $policiesChange >= 0 ? 'uil-arrow-growth' : 'uil-chart-down' }}"></i>
                        {{ abs($policiesChange) }}%
                    </span>
                </span>
            </span>
        </div>

        <div class="px-5 py-4 bg-gray-50 dark:bg-slate-800">
            <a href="{{ route('policies.index') }}"
                class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-blue-600 dark:text-white/70 hover:text-blue-600 dark:hover:text-white after:bg-blue-600 dark:after:bg-white duration-500">
                View data <i class="uil uil-arrow-right"></i>
            </a>
        </div>
    </div> --}}

    <!-- Timesheets Card -->
    <div class="relative overflow-hidden rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
        <div class="p-5 flex items-center">
            <span class="flex justify-center items-center rounded-md size-14 min-w-[56px] bg-blue-600/5 dark:bg-blue-600/10 shadow-sm shadow-blue-600/5 dark:shadow-blue-600/10 text-blue-600">
                <i data-feather="watch" class="size-5"></i>
            </span>

            <span class="ms-3">
                <span class="text-slate-400 font-semibold block">Timesheets</span>
                <span class="flex items-center justify-between mt-1">
                    <span class="text-xl font-semibold">{{ number_format($timesheetsCount) }}</span>
                    <span class="{{ $timesheetsChange >= 0 ? 'text-emerald-600' : 'text-blue-600' }} text-sm ms-1 font-semibold">
                        <i class="uil {{ $timesheetsChange >= 0 ? 'uil-arrow-growth' : 'uil-chart-down' }}"></i>
                        {{ abs($timesheetsChange) }}%
                    </span>
                </span>
            </span>
        </div>

        <div class="px-5 py-4 bg-gray-50 dark:bg-slate-800">
            <a href="{{ route('admin.timesheets.index') }}"
                class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:transition-all after:duration-500 text-blue-600 dark:text-white/70 hover:text-blue-600 dark:hover:text-white after:bg-blue-600 dark:after:bg-white duration-500">
                View data <i class="uil uil-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
