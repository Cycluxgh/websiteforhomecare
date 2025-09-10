<x-app-layout>

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Show Job</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li
                        class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white">
                        <a href="/">Website-For-Homecare</a></li>
                    <li
                        class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="uil uil-angle-right-b"></i></li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white"
                        aria-current="page">Show Job</li>
                </ul>
            </div>
            <div class="container relative mt-6">
                <div class="md:flex justify-center">
                    <div class="lg:w-4/5 w-full">
                        <div class="p-6 bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                            <h5 class="text-lg font-semibold mb-6">Job Details :</h5>

                            <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Job Title:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $jobPosting->job_title }}
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label font-medium">Job Category:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="folder" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $jobPosting->job_category }}
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label font-medium">Employment Type:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="users" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ ucfirst(str_replace('-', ' ', $jobPosting->employment_type)) }}
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label font-medium">Status:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="info" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $jobPosting->status }}
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label font-medium">Active:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $jobPosting->is_active ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $jobPosting->is_active ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label font-medium">Posted By:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $jobPosting->creator->name ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label font-medium">Start Date:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $jobPosting->start_date->format('Y-m-d') }}
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label font-medium">End Date:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $jobPosting->end_date->format('Y-m-d') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-lg font-semibold mb-4 mt-6">Job Description :</h5>
                            <div class="form-icon relative mt-2">
                                <i data-feather="file-text" class="size-4 absolute top-3 start-4"></i>
                                <div
                                    class="form-input ps-11 w-full py-2 px-3 min-h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 whitespace-pre-wrap">
                                    {!! $jobPosting->job_description !!}
                                </div>
                            </div>

                            <h5 class="text-lg font-semibold mb-4 mt-6">Job Requirements :</h5>
                            <div class="form-icon relative mt-2">
                                <i data-feather="list" class="size-4 absolute top-3 start-4"></i>
                                <div
                                    class="form-input ps-11 w-full py-2 px-3 min-h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 whitespace-pre-wrap">
                                    {!! $jobPosting->job_requirements !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Content -->
        </div>
    </div>


</x-app-layout>
