<x-app-layout>

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Application Details</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li
                        class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-[#002A57] dark:hover:text-white">
                        <a href="/">Website-For-Homecare</a>
                    </li>
                    <li
                        class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="uil uil-angle-right-b"></i>
                    </li>
                    <li class="inline-block capitalize text-[14px] font-bold text-[#002A57] dark:text-white"
                        aria-current="page">Application Details</li>
                </ul>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('info'))
                <div class="bg-blue-100 border border-blue-400 text-blue-950 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Heads up!</strong>
                    <span class="block sm:inline">{{ session('info') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif


            <div class="container relative mt-6">
                <div class="md:flex justify-center">
                    <div class="lg:w-4/5 w-full">
                        <div class="p-6 bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                            <h5 class="text-lg font-semibold mb-6">Application Details:</h5>

                            <h6 class="text-md font-semibold mb-4">Job Posting Information</h6>
                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Applied Job Title:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->jobPosting->job_title ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Vacancy Source:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="link" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->vacancy_source ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-6 border-gray-200 dark:border-gray-800">

                            <h6 class="text-md font-semibold mb-4">Personal Information</h6>
                            <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Full Name:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->full_name) }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Date of Birth:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->date_of_birth ? e($application->date_of_birth->format('Y-m-d')) : 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Email:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->email) }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Phone Number:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="phone" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->phone_number) }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">National Insurance Number:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="hash" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->national_insurance_number ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Address Line 1:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="map-pin" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->address_line_1 ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">City:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="map" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->city ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Have you worked with us before?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->worked_with_us_before ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->worked_with_us_before ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Have you ever applied for a job with us
                                        before? </label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->applied_with_us_before ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->applied_with_us_before ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Are you related to any person employed by this
                                        Company?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->related_to_employee ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->related_to_employee ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                @if($application->related_to_employee)
                                    <div class="lg:col-span-3">
                                        <label class="form-label font-medium">Related Details:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="align-left" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ e($application->related_details ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div>
                                    <label class="form-label font-medium">Are you entitled to enter or remain in the UK
                                        and undertake the work in question? If successful, you must provide satisfactory
                                        evidence of your eligibility to work in the UK:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->eligible_to_work_uk ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->eligible_to_work_uk ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Do you require any adjustments to your work
                                        place or environment to accomodate any disability or medical problems?:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->requires_adjustments ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->requires_adjustments ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                @if($application->requires_adjustments)
                                    <div class="lg:col-span-3">
                                        <label class="form-label font-medium">Adjustment Details:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="align-left" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ e($application->adjustment_details ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <hr class="my-6 border-gray-200 dark:border-gray-800">

                            <h6 class="text-md font-semibold mb-4">Professional Body Information</h6>
                            <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Are you or have you ever been a member of any
                                        professional regulatory body (i.e. SSSC or NMC)?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->professional_body_member ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->professional_body_member ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                @if($application->professional_body_member)
                                    <div>
                                        <label class="form-label font-medium">Professional Body Name:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="award" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ e($application->professional_body_name ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Registration Number:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="tag" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ e($application->registration_number ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Registration Expiry Date:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ $application->registration_expiry_date ? e($application->registration_expiry_date->format('Y-m-d')) : 'N/A' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Registration Revoked?</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="{{ $application->registration_revoked ? 'check-circle' : 'x-circle' }}"
                                                class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ $application->registration_revoked ? 'Yes' : 'No' }}
                                            </div>
                                        </div>
                                    </div>
                                    @if($application->registration_revoked)
                                        <div class="lg:col-span-3">
                                            <label class="form-label font-medium">Revocation Details:</label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="align-left" class="size-4 absolute top-3 start-4"></i>
                                                <div
                                                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                    {{ e($application->revocation_details ?? 'N/A') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif {{-- End of professional_body_member conditional --}}
                            </div>

                            <hr class="my-6 border-gray-200 dark:border-gray-800">

                            <h6 class="text-md font-semibold mb-4">Employment History</h6>
                            <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Currently Employed?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->currently_employed ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->currently_employed ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                @if(!$application->currently_employed)
                                    <div class="lg:col-span-2">
                                        <label class="form-label font-medium">Not Employed Details:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="align-left" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ e($application->not_employed_details ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            @if($application->currently_employed || $application->employer_name) {{-- Show previous
                                employer details if currently employed or had a past employer --}}
                                <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mb-6">
                                    <div>
                                        <label class="form-label font-medium">Employer Name:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ e($application->employer_name ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Job Title:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="tag" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ e($application->job_title ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Nature of Business:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="info" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ e($application->nature_of_business ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Employer Address Line 1:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="map-pin" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ e($application->employer_address_line_1 ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Employer City:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="map" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ e($application->employer_city ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Employer Phone Number:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="phone" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ e($application->employer_phone_number ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Employer Email:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ e($application->employer_email ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Date Started:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ $application->date_started ? e($application->date_started->format('Y-m-d')) : 'N/A' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Date Left:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ $application->date_left ? e($application->date_left->format('Y-m-d')) : 'N/A' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lg:col-span-3">
                                        <label class="form-label font-medium">Duties Description:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="align-left" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-20 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 overflow-auto">
                                                {{ e($application->duties_description ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Reason for Leaving:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="log-out" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ e($application->reason_for_leaving ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Salary:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="database" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                £ {{ e($application->salary ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Salary Period:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="repeat" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ e(ucfirst($application->salary_period ?? 'N/A')) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Notice Period:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="clock" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ e($application->notice_period ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Please confirm whether this is your only
                                            job?</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="{{ $application->is_only_job ? 'check-circle' : 'x-circle' }}"
                                                class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ $application->is_only_job ? 'Yes' : 'No' }}
                                            </div>
                                        </div>
                                    </div>
                                    @if(!$application->is_only_job)
                                        <div class="lg:col-span-3">
                                            <label class="form-label font-medium">Other Jobs Details:</label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="align-left" class="size-4 absolute top-3 start-4"></i>
                                                <div
                                                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                    {{ e($application->other_jobs_details ?? 'N/A') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif {{-- End of currently_employed / employer_name conditional --}}

                            <hr class="my-6 border-gray-200 dark:border-gray-800">

                            <h6 class="text-md font-semibold mb-4">Education History</h6>
                            @if($application->educationHistory->isNotEmpty())
                                @foreach($application->educationHistory as $education)
                                    <div
                                        class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-4 border border-gray-200 dark:border-gray-700 p-4 rounded-md">
                                        <div>
                                            <label class="form-label font-medium">Type:</label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="book-open" class="size-4 absolute top-3 start-4"></i>
                                                <div
                                                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                    {{ e(preg_replace('/(?<!^)([A-Z])/', ' $1', $education->type->name ?? 'N/A')) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="form-label font-medium">Qualification Name:</label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="award" class="size-4 absolute top-3 start-4"></i>
                                                <div
                                                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                    {{ e($education->qualification_name ?? 'N/A') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-gray-500 dark:text-gray-400 mb-6">No education history provided.</p>
                            @endif

                            <hr class="my-6 border-gray-200 dark:border-gray-800">

                            <h6 class="text-md font-semibold mb-4">References</h6>
                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Reference 1 Full Name:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->ref1_full_name ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Reference 1 Company Name:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->ref1_company_name ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Reference 1 Job Title:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="tag" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->ref1_job_title ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Reference 1 Phone Number:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="phone" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->ref1_phone_number ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Reference 1 Email:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->ref1_email ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Reference 1 Address Line 1:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="map-pin" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->ref1_address_line_1 ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Reference 1 City:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="map" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->ref1_city ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Reference 2 Full Name:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->ref2_full_name ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Reference 2 Company Name:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->ref2_company_name ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Reference 2 Job Title:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="tag" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->ref2_job_title ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Reference 2 Phone Number:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="phone" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->ref2_phone_number ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Reference 2 Email:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->ref2_email ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Reference 2 Address Line 1:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="map-pin" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->ref2_address_line_1 ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Reference 2 City:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="map" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->ref2_city ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="lg:col-span-2">
                                    <label class="form-label font-medium">Permission to Contact References?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->ref_contact_permission ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->ref_contact_permission ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-6 border-gray-200 dark:border-gray-800">

                            <h6 class="text-md font-semibold mb-4">Additional Information & Statements</h6>
                            <div class="grid grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Relevant Experience:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="align-left" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-32 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 overflow-auto">
                                            {{ e($application->relevant_experience ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Supporting Statement:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="file-text" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-32 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 overflow-auto">
                                            {{ e($application->supporting_statement ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Interests & Achievements:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="star" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-32 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 overflow-auto">
                                            {{ e($application->interests_achievements ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-6 border-gray-200 dark:border-gray-800">

                            <h6 class="text-md font-semibold mb-4">Declarations & Disclosures</h6>
                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Understood Rehabilitation of Offenders
                                        Act?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->understood_rehabilitation_act ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->understood_rehabilitation_act ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Have you ever been the subject of disciplinary
                                        action with the H.M Forces and/or Professional Bodies, including the Police
                                        Force? </label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->disciplinary_action_hm_forces ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->disciplinary_action_hm_forces ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Unspent Convictions?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->unspent_convictions ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->unspent_convictions ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Spent Convictions to Disclose?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->spent_convictions_disclose ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->spent_convictions_disclose ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Pending Charges?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->pending_charges ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->pending_charges ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Regulatory Investigation?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->regulatory_investigation ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->regulatory_investigation ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Registration Conditions?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->registration_conditions ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->registration_conditions ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div class="lg:col-span-2">
                                    <label class="form-label font-medium">Conviction Details:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="align-left" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-20 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 overflow-auto">
                                            {{ e($application->conviction_details ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-6 border-gray-200 dark:border-gray-800">

                            <h6 class="text-md font-semibold mb-4">Driving Information</h6>
                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">UK Driving License?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->uk_driving_license ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->uk_driving_license ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Access to Car?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->access_to_car ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->access_to_car ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Endorsements?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->endorsements ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->endorsements ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                @if($application->endorsements)
                                    <div class="lg:col-span-2">
                                        <label class="form-label font-medium">Endorsement Details:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="align-left" class="size-4 absolute top-3 start-4"></i>
                                            <div
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                                {{ e($application->endorsement_details ?? 'N/A') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div>
                                    <label class="form-label font-medium">Driving License Number:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="credit-card" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e($application->driving_license_number ?? 'N/A') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-6 border-gray-200 dark:border-gray-800">

                            <h6 class="text-md font-semibold mb-4">Consent</h6>
                            <div class="grid grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Data Processing Consent:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $application->data_processing_consent ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $application->data_processing_consent ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-6 border-gray-200 dark:border-gray-800">

                            <h6 class="text-md font-semibold mb-4 mt-6">Application Metadata</h6>
                            <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Applied At:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e(\Carbon\Carbon::parse($application->created_at)->format('jS F Y, H:i')) }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Last Updated:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e(\Carbon\Carbon::parse($application->updated_at)->format('jS F Y, H:i')) }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Status:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="info" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ e(ucfirst($application->status ?? 'N/A')) }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($application->status === 'pending' || $application->status === 'shortlisted_for_interview')
    <hr class="my-6 border-gray-200 dark:border-gray-800">
    <h6 class="text-md font-semibold mb-4">Application Actions</h6>
    <div class="flex gap-4">
        @if($application->status === 'shortlisted_for_interview')
            <button type="button" onclick="document.getElementById('approveModal').showModal()"
                class="btn bg-green-600 hover:bg-green-700 text-white rounded-md px-4 py-2">
                Approve
            </button>
        @endif

        <form action="{{ route('applications.reject', $application->id) }}" method="POST">
            @csrf
            <button type="submit"
                class="btn bg-red-600 hover:bg-red-700 text-white rounded-md px-4 py-2">
                Reject
            </button>
        </form>

        @if($application->status === 'shortlisted_for_interview')
            <p class="text-blue-600 font-semibold self-center">Interview email sent.</p>
            <button type="button"
                class="btn bg-blue-400 text-white rounded-md px-4 py-2 cursor-not-allowed" disabled>
                Shortlist for Interview
            </button>
        @else
            <button type="button" onclick="document.getElementById('interviewModal').showModal()"
                class="btn bg-blue-600 hover:bg-blue-700 text-white rounded-md px-4 py-2">
                Shortlist for Interview
            </button>
        @endif
    </div>
@endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Content -->
        </div>
    </div>

    <dialog id="interviewModal"
        class="rounded-md shadow-sm dark:shadow-gray-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white m-auto">
        <div class="relative h-auto md:w-[480px] w-300px">
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                <h3 class="font-bold text-lg">Schedule Interview</h3>
                <button onclick="document.getElementById('interviewModal').close()"
                    class="size-6 flex justify-center items-center shadow-sm dark:shadow-gray-800 rounded-md btn-ghost">
                    <i data-feather="x" class="size-4"></i>
                </button>
            </div>
            <div class="p-6">
                <form action="{{ route('applications.schedule-interview', $application->id) }}" method="POST"
                    class="mt-4">
                    @csrf
                    <input type="hidden" name="applicant_email" value="{{ e($application->email) }}">

                    <div class="mb-4 text-left">
                        <label for="interview_date" class="form-label font-medium">Interview Date:</label>
                        <div class="form-icon relative mt-2">
                            <i data-feather="calendar"
                                class="size-4 absolute top-3 start-4 text-gray-500 dark:text-gray-400"></i>
                            <input type="date" id="interview_date" name="interview_date" required
                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-blue-600 dark:focus:border-blue-600 focus:ring-0">
                        </div>
                    </div>

                    <div class="mb-4 text-left">
                        <label for="interview_time" class="form-label font-medium">Interview Time:</label>
                        <div class="form-icon relative mt-2">
                            <i data-feather="clock"
                                class="size-4 absolute top-3 start-4 text-gray-500 dark:text-gray-400"></i>
                            <input type="time" id="interview_time" name="interview_time" required
                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-blue-600 dark:focus:border-blue-600 focus:ring-0">
                        </div>
                    </div>

                    <div class="mb-4 text-left">
                        <label for="interview_location" class="form-label font-medium">Location (Physical):</label>
                        <div class="form-icon relative mt-2">
                            <i data-feather="map-pin"
                                class="size-4 absolute top-3 start-4 text-gray-500 dark:text-gray-400"></i>
                            <input type="text" id="interview_location" name="interview_location"
                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-blue-600 dark:focus:border-blue-600 focus:ring-0"
                                placeholder="e.g., Company HQ, Meeting Room 3">
                        </div>
                    </div>

                    <div class="mb-4 text-left">
                        <label for="interview_link" class="form-label font-medium">Virtual Meeting Link (Zoom, Google
                            Meet, etc.):</label>
                        <div class="form-icon relative mt-2">
                            <i data-feather="video"
                                class="size-4 absolute top-3 start-4 text-gray-500 dark:text-gray-400"></i>
                            <input type="url" id="interview_link" name="interview_link"
                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-blue-600 dark:focus:border-blue-600 focus:ring-0"
                                placeholder="e.g., https://zoom.us/j/1234567890">
                        </div>
                    </div>

                    <div class="mb-4 text-left">
                        <label for="additional_info" class="form-label font-medium">Additional Information:</label>
                        <div class="form-icon relative mt-2">
                            <textarea id="additional_info" name="additional_info" rows="4"
                                class="form-input w-full py-2 px-3 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-blue-600 dark:focus:border-blue-600 focus:ring-0"
                                placeholder="Any specific instructions or details for the applicant..."></textarea>
                        </div>
                    </div>

                    <div class="flex justify-center gap-4 mt-6">
                        <button type="submit"
                            class="py-[7px] px-6 font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 text-white rounded-md">
                            Send Interview Invitation
                        </button>
                        <button type="button" onclick="document.getElementById('interviewModal').close()"
                            class="py-[7px] px-6 font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-300 hover:bg-gray-400 border-gray-300 text-gray-700 hover:text-gray-900 rounded-md">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </dialog>

    <dialog id="approveModal"
        class="rounded-md shadow-sm dark:shadow-gray-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white m-auto">
    <div class="relative h-auto md:w-[580px] w-300px">
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100 dark:border-gray-700">
            <h3 class="font-bold text-lg">Approve Application</h3>
            <button onclick="document.getElementById('approveModal').close()"
                class="size-6 flex justify-center items-center shadow-sm dark:shadow-gray-800 rounded-md btn-ghost">
                <i data-feather="x" class="size-4"></i>
            </button>
        </div>
        <div class="p-6">
            <form action="{{ route('applications.approve', $application->id) }}" method="POST" class="mt-4">
                @csrf
                <input type="hidden" name="applicant_email" value="{{ e($application->email) }}">

                <div class="mb-4 text-left">
                    <label for="position" class="form-label font-medium">Position:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="briefcase"
                           class="size-4 absolute top-3 start-4 text-gray-500 dark:text-gray-400"></i>
                        <input readonly  type="text" id="position" name="position" required
                               value="{{ $application->jobPosting->job_title ?? 'Employee' }}"
                               class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-blue-600 dark:focus:border-blue-600 focus:ring-0">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4 text-left">
                        <label for="start_date" class="form-label font-medium">Start Date:</label>
                        <div class="form-icon relative mt-2">
                            <i data-feather="calendar"
                               class="size-4 absolute top-3 start-4 text-gray-500 dark:text-gray-400"></i>
                            <input type="date" id="start_date" name="start_date" required
                                   class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-blue-600 dark:focus:border-blue-600 focus:ring-0">
                        </div>
                    </div>

                    <div class="mb-4 text-left">
                        <label for="employment_type" class="form-label font-medium">Employment Type:</label>
                        <div class="form-icon relative mt-2">
                            <i data-feather="user-check"
                               class="size-4 absolute top-3 start-4 text-gray-500 dark:text-gray-400"></i>
                            <select id="employment_type" name="employment_type" required
                                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-blue-600 dark:focus:border-blue-600 focus:ring-0">
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Contract">Contract</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4 text-left">
                        <label for="hourly_rate" class="form-label font-medium">Hourly Rate (£):</label>
                        <div class="form-icon relative mt-2">
                            <svg class="size-4 absolute top-3 start-4" xmlns="http://www.w3.org/2000/svg"
                                        fill="oklch(20.8% 0.042 265.755)" width="800px" height="800px" viewBox="0 0 8 8">
                                        <path
                                            d="M3 0c-.62 0-1.16.26-1.5.69-.34.43-.5.99-.5 1.56 0 .69.16 1.25.25 1.75h-1.25v1h1.22c-.11.45-.37.96-1.06 1.66l-.16.13v1.22h6v-1h-4.91c.64-.73.98-1.4 1.13-2h1.78v-1h-1.72c-.08-.68-.28-1.24-.28-1.75 0-.39.11-.73.28-.94.17-.21.37-.31.72-.31.39 0 .61.11.75.25s.25.36.25.75h1c0-.58-.17-1.1-.53-1.47-.37-.37-.89-.53-1.47-.53z"
                                            transform="translate(1)" />
                                    </svg>
                            <input type="number" id="hourly_rate" name="hourly_rate" step="0.01" min="0" required
                                   class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-blue-600 dark:focus:border-blue-600 focus:ring-0"
                                   placeholder="e.g., 15.50">
                        </div>
                    </div>

                    <div class="mb-4 text-left">
                        <label for="emergency_contact_name" class="form-label font-medium">Emergency Contact Name:</label>
                        <div class="form-icon relative mt-2">
                            <i data-feather="user"
                               class="size-4 absolute top-3 start-4 text-gray-500 dark:text-gray-400"></i>
                            <input type="text" id="emergency_contact_name" name="emergency_contact_name"
                                   value="{{ $application->kin_name ?? '' }}"
                                   class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-blue-600 dark:focus:border-blue-600 focus:ring-0"
                                   placeholder="e.g., John Doe">
                        </div>
                    </div>

                    <div class="mb-4 text-left">
                        <label for="emergency_contact_phone" class="form-label font-medium">Emergency Contact Phone:</label>
                        <div class="form-icon relative mt-2">
                            <i data-feather="phone"
                               class="size-4 absolute top-3 start-4 text-gray-500 dark:text-gray-400"></i>
                            <input type="tel" id="emergency_contact_phone" name="emergency_contact_phone"
                                   value="{{ $application->kin_mobile ?? $application->kin_tel ?? '' }}"
                                   class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-blue-600 dark:focus:border-blue-600 focus:ring-0"
                                   placeholder="e.g., +44 123 456 7890">
                        </div>
                    </div>

                    <div class="mb-4 text-left">
                        <label for="emergency_contact_relationship" class="form-label font-medium">Emergency Contact Relationship:</label>
                        <div class="form-icon relative mt-2">
                            <i data-feather="users"
                               class="size-4 absolute top-3 start-4 text-gray-500 dark:text-gray-400"></i>
                            <input type="text" id="emergency_contact_relationship" name="emergency_contact_relationship"
                                   value="{{ $application->kin_relationship ?? '' }}"
                                   class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-blue-600 dark:focus:border-blue-600 focus:ring-0"
                                   placeholder="e.g., Spouse">
                        </div>
                    </div>
                </div>

                <div class="mb-4 text-left">
                    <label for="welcome_message" class="form-label font-medium">Welcome Message:</label>
                    <div class="form-icon relative mt-2">
                        <textarea id="welcome_message" name="welcome_message"
                                  class="form-input w-full py-2 px-3 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-blue-600 dark:focus:border-blue-600 focus:ring-0"
                                  placeholder="Enter a personalized welcome message for the new employee..."></textarea>
                    </div>
                </div>

                <div class="flex justify-center gap-4 mt-6">
                    <button type="submit"
                            class="py-[7px] px-6 font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-green-600 hover:bg-green-700 border-green-600 text-white rounded-md">
                        Confirm Approval
                    </button>
                    <button type="button" onclick="document.getElementById('approveModal').close()"
                            class="py-[7px] px-6 font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-300 hover:bg-gray-400 border-gray-300 text-gray-700 hover:text-gray-900 rounded-md">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</dialog>

<script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#welcome_message'))
        .catch(error => {
            console.error(error);
        });
</script>
</x-app-layout>
