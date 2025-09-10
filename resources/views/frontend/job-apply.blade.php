<x-frontend-layout>
    <!-- Start Hero -->
    <section
        class="relative table w-full py-36 lg:py-44 bg-[url('../../assets/images/job/job.jpg')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-slate-900 opacity-80"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center mt-12">
                <h3 class="mb-4 md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">
                    {{ $jobPosting->job_title }}</h3>

                <ul class="list-none">
                    <li class="inline text-slate-400 me-3">{{ $jobPosting->job_category }}</span></li>
                </ul>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
            <ul class="tracking-[0.5px] mb-0 inline-block">
                <li
                    class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
                    <a href="{{ route('home') }}">Website-For-Homecare</a></li>
                <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i
                        class="uil uil-angle-right-b"></i></li>
                <li
                    class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
                    <a href="{{ route('home') }}">Job</a></li>
                <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i
                        class="uil uil-angle-right-b"></i></li>
                <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white"
                    aria-current="page">Job Application</li>
            </ul>
        </div>
    </section><!--end section-->
    <div class="relative">
        <div
            class="shape absolute sm:-bottom-px -bottom-[2px] start-0 end-0 overflow-hidden text-white dark:text-slate-900">
            <svg class="w-full h-auto scale-[2.0] origin-top" viewBox="0 0 2880 48" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- End Hero -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid lg:grid-cols-16 grid-cols-1" id="reserve-form">
                <div class="lg:col-start-2 lg:col-span-10">
                    <div class="rounded-md shadow-sm dark:shadow-gray-800 bg-white dark:bg-slate-900 p-6">
                        <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="job_posting_id" value="{{ $jobPosting->id }}">

                            <div class="grid lg:grid-cols-12 gap-6">

                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="full_name" class="font-semibold">Full Name *</label>
                                        <input name="full_name" id="full_name" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            placeholder="Full Name" required>
                                    </div>
                                </div>

                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="date_of_birth" class="font-semibold">Date of Birth *</label>
                                        <input name="date_of_birth" id="date_of_birth" type="date"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            required>
                                    </div>
                                </div>

                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="address_line_1" class="font-semibold">Address Line 1 *</label>
                                        <input name="address_line_1" id="address_line_1" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            placeholder="Address Line 1" required>
                                    </div>
                                </div>

                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="city" class="font-semibold">City *</label>
                                        <input name="city" id="city" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            placeholder="City" required>
                                    </div>
                                </div>

                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="email" class="font-semibold">Email *</label>
                                        <input name="email" id="email" type="email"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            placeholder="Email" required>
                                    </div>
                                </div>

                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="phone_number" class="font-semibold">Phone Number *</label>
                                        <input name="phone_number" id="phone_number" type="tel"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            placeholder="Phone Number" required>
                                    </div>
                                </div>

                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="national_insurance_number" class="font-semibold">National Insurance
                                            Number</label>
                                        <input name="national_insurance_number" id="national_insurance_number"
                                            type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            placeholder="National Insurance Number">
                                    </div>
                                </div>

                                <div class="lg:col-span-6">
                                    <label class="font-semibold">Have you worked with us before? *</label>
                                    <div class="mt-3 flex gap-4">
                                        <div class="flex space-x-3 items-center">
                                            <input type="radio" id="worked_us_yes" name="worked_with_us_before"
                                                value="1" required>
                                            <label for="worked_us_yes" class="ml-2">Yes</label>
                                        </div>
                                        <div class="flex space-x-3 items-center">
                                            <input type="radio" id="worked_us_no" name="worked_with_us_before" value="0"
                                                required>
                                            <label for="worked_us_no" class="ml-2">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-6">
                                    <label class="font-semibold">Have you ever applied for a job with us before?
                                        *</label>
                                    <div class="mt-3 flex gap-4">
                                        <div class="flex space-x-3 items-center">
                                            <input type="radio" id="applied_us_yes" name="applied_with_us_before"
                                                value="1" required>
                                            <label for="applied_us_yes" class="ml-2">Yes</label>
                                        </div>
                                        <div class="flex space-x-3 items-center">
                                            <input type="radio" id="applied_us_no" name="applied_with_us_before"
                                                value="0" required>
                                            <label for="applied_us_no" class="ml-2">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-6">
                                    <label class="font-semibold">Are you related to any person employed by this Company?
                                        *</label>
                                    <div class="mt-3 flex gap-4">
                                        <div class="flex space-x-3 items-center">
                                            <input type="radio" id="related_yes" name="related_to_employee" value="1"
                                                required>
                                            <label for="related_yes" class="ml-2">Yes</label>
                                        </div>
                                        <div class="flex space-x-3 items-center">
                                            <input type="radio" id="related_no" name="related_to_employee" value="0"
                                                required>
                                            <label for="related_no" class="ml-2">No</label>
                                        </div>
                                    </div>
                                    <div class="text-start mt-3" id="related_details_div" style="display:none;">
                                        <label for="related_details" class="font-semibold">If you have answered 'Yes' to
                                            any of the above questions, please give full details below:</label>
                                        <textarea name="related_details" id="related_details"
                                            class="form-input mt-3 w-full py-2 px-3 h-24 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            placeholder="Details"></textarea>
                                    </div>
                                </div>

                                <div class="lg:col-span-6">
                                    <label class="font-semibold">Are you entitled to enter or remain in the UK and
                                        undertake the work in question? If successful, you must provide satisfactory
                                        evidence of your eligibility to work in the UK *</label>
                                    <div class="mt-3 flex gap-4">
                                        <div class="flex space-x-3 items-center">
                                            <input type="radio" id="eligible_uk_yes" name="eligible_to_work_uk"
                                                value="1" required>
                                            <label for="eligible_uk_yes" class="ml-2">Yes</label>
                                        </div>
                                        <div class="flex space-x-3 items-center">
                                            <input type="radio" id="eligible_uk_no" name="eligible_to_work_uk" value="0"
                                                required>
                                            <label for="eligible_uk_no" class="ml-2">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-6">
                                    <label class="font-semibold">Do you require any adjustments to your work place or
                                        environment to accomodate any disability or medical problems? *</label>
                                    <div class="mt-3 flex gap-4">
                                        <div class="flex space-x-3 items-center">
                                            <input type="radio" id="adjustments_yes" name="requires_adjustments"
                                                value="1" required>
                                            <label for="adjustments_yes" class="ml-2">Yes</label>
                                        </div>
                                        <div class="flex space-x-3 items-center">
                                            <input type="radio" id="adjustments_no" name="requires_adjustments"
                                                value="0" required>
                                            <label for="adjustments_no" class="ml-2">No</label>
                                        </div>
                                    </div>
                                    <div class="text-start mt-3" id="adjustment_details_div" style="display:none;">
                                        <label for="adjustment_details" class="font-semibold">If yes, please specify the
                                            adjustments:</label>
                                        <textarea name="adjustment_details" id="adjustment_details"
                                            class="form-input mt-3 w-full py-2 px-3 h-24 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            placeholder="Details"></textarea>
                                    </div>
                                </div>

                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="vacancy_source" class="font-semibold">How did you hear about this
                                            vacancy?</label>
                                        <input name="vacancy_source" id="vacancy_source" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            placeholder="e.g., Website, Friend, Job Board">
                                    </div>
                                </div>

                                <div class="lg:col-span-12 mt-6">
                                    <h3 class="text-xl font-semibold mb-4">Educational History</h3>
                                    <div id="educational_history_container">
                                    </div>
                                    <button type="button" id="add_education_btn"
                                    class="py-[5px] px-4 inline-block font-semibold tracking-wide align-middle duration-500 text-sm text-center bg-blue-600 hover:bg-blue-950 border-blue-600 hover:border-blue-950 text-white rounded-md">
                                    Add Education</button>
                                </div>

                                <template id="education_entry_template">
                                    <div
                                        class="education-entry border border-gray-200 dark:border-gray-700 p-4 rounded-md mb-4 relative">
                                        <button type="button"
                                            class="remove-education-btn absolute top-2 right-2 text-gray-400 hover:text-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-5">
                                            <div>
                                                <label for="education_type_INDEX" class="font-semibold">Type *</label>
                                                <select name="education[INDEX][type]" id="education_type_INDEX"
                                                    class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                    required>
                                                    <option value="">Select Type</option>
                                                    <option value="school_qualification">School Qualification</option>
                                                    <option value="other_training">Other Training</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="qualification_name_INDEX"
                                                    class="font-semibold">Qualification Name *</label>
                                                <input type="text" name="education[INDEX][qualification_name]"
                                                    id="qualification_name_INDEX"
                                                    class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                    placeholder="e.g., High School Diploma, Bachelor of Science, Certification"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </template>


                                <div class="lg:col-span-12 mt-6">
                                    <h3 class="text-xl font-semibold mb-4">Interests, Achievements, Leisure Activities &
                                        Volunteering</h3>
                                    <div class="text-start">
                                        <label for="interests_achievements" class="font-semibold">Please tell us about
                                            your interests, achievements, leisure activities, and any volunteering
                                            experience:</label>
                                        <textarea name="interests_achievements" id="interests_achievements"
                                            class="form-input mt-3 w-full py-2 px-3 h-24 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                            placeholder="Details"></textarea>
                                    </div>
                                </div>

                                <div class="lg:col-span-12 mt-6">
                                    <h3 class="text-xl font-semibold mb-4">Professional Registrations</h3>
                                    <label class="font-semibold">Are you or have you ever been a member of any
                                        professional regulatory body (i.e. SSSC or NMC)? *</label>
                                    <div class="mt-3 flex gap-4">
                                        <div class="flex space-x-3 items-center">
                                            <input type="radio" id="prof_reg_yes" name="professional_body_member"
                                                value="1" required>
                                            <label for="prof_reg_yes" class="ml-2">Yes</label>
                                        </div>
                                        <div class="flex space-x-3 items-center">
                                            <input type="radio" id="prof_reg_no" name="professional_body_member"
                                                value="0" required>
                                            <label for="prof_reg_no" class="ml-2">No</label>
                                        </div>
                                    </div>
                                    <div class="text-start mt-3" id="professional_registration_details_div"
                                        style="display:none;">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label for="prof_reg_name" class="font-semibold">Name of professional
                                                    regulatory body *</label>
                                                <input name="professional_body_name" id="prof_reg_name" type="text"
                                                    class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                    placeholder="e.g., SSSC, NMC">
                                            </div>
                                            <div>
                                                <label for="prof_reg_number" class="font-semibold">Registration Number
                                                    *</label>
                                                <input name="registration_number" id="prof_reg_number" type="text"
                                                    class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                    placeholder="Registration Number">
                                            </div>
                                            <div class="md:col-span-2">
                                                <label for="prof_reg_expiry" class="font-semibold">Expiry Date *</label>
                                                <input name="registration_expiry_date" id="prof_reg_expiry" type="date"
                                                    class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
                                            </div>
                                        </div>
                                        <div class="text-start mt-4">
                                            <label class="font-semibold">Have you ever had your registration to a
                                                professional body revoked? *</label>
                                            <div class="mt-3 flex gap-4">
                                                <div class="flex space-x-3 items-center">
                                                    <input type="radio" id="reg_revoked_yes" name="registration_revoked"
                                                        value="1">
                                                    <label for="reg_revoked_yes" class="ml-2">Yes</label>
                                                </div>
                                                <div class="flex space-x-3 items-center">
                                                    <input type="radio" id="reg_revoked_no" name="registration_revoked"
                                                        value="0">
                                                    <label for="reg_revoked_no" class="ml-2">No</label>
                                                </div>
                                            </div>
                                            <div class="text-start mt-3" id="registration_revoked_details_div"
                                                style="display:none;">
                                                <label for="revocation_details" class="font-semibold">If yes, please
                                                    provide details:</label>
                                                <textarea name="revocation_details" id="revocation_details"
                                                    class="form-input mt-3 w-full py-2 px-3 h-24 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                    placeholder="Details"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-12 mt-6">
                                    <h3 class="text-xl font-semibold mb-4">Employment History</h3>
                                    <p class="mb-4">(Please provide your most recent employment history from age 18)</p>
                                    <label class="font-semibold">Are you currently employed? *</label>
                                    <div class="mt-3 flex gap-4">
                                        <div class="flex space-x-3 items-center">
                                            <input type="radio" id="currently_employed_yes" name="currently_employed"
                                                value="1" required>
                                            <label for="currently_employed_yes" class="ml-2">Yes</label>
                                        </div>
                                        <div class="flex space-x-3 items-center">
                                            <input type="radio" id="currently_employed_no" name="currently_employed"
                                                value="0" required>
                                            <label for="currently_employed_no" class="ml-2">No</label>
                                        </div>
                                    </div>
                                    <div class="text-start mt-3" id="not_currently_employed_details_div"
                                        style="display:none;">
                                        <label for="not_employed_details" class="font-semibold">If you are not currently
                                            employed, please give full details:</label>
                                        <textarea name="not_employed_details" id="not_employed_details"
                                            class="form-input mt-3 w-full py-2 px-3 h-24 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                            placeholder="Details"></textarea>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                                        <div class="md:col-span-2">
                                            <label for="employer_name" class="font-semibold">Name of present or most
                                                recent employer: *</label>
                                            <input name="employer_name" id="employer_name" type="text"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Employer Name" required>
                                        </div>
                                        <div>
                                            <label for="job_title" class="font-semibold">Job Title *</label>
                                            <input name="job_title" id="job_title" type="text"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Job Title" required>
                                        </div>
                                        <div>
                                            <label for="nature_of_business" class="font-semibold">Nature of
                                                Business</label>
                                            <input name="nature_of_business" id="nature_of_business" type="text"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="e.g., Retail, Healthcare">
                                        </div>
                                        <div class="md:col-span-2">
                                            <label for="employer_address_line_1" class="font-semibold">Address *</label>
                                            <input name="employer_address_line_1" id="employer_address_line_1"
                                                type="text"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Address" required>
                                        </div>
                                        <div>
                                            <label for="employer_city" class="font-semibold">City *</label>
                                            <input name="employer_city" id="employer_city" type="text"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="City" required>
                                        </div>
                                        <div>
                                            <label for="employer_phone_number" class="font-semibold">Phone Number
                                                *</label>
                                            <input name="employer_phone_number" id="employer_phone_number" type="tel"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Phone Number" required>
                                        </div>
                                        <div class="md:col-span-2">
                                            <label for="employer_email" class="font-semibold">Email</label>
                                            <input name="employer_email" id="employer_email" type="email"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Email">
                                        </div>
                                        <div class="md:col-span-2">
                                            <label for="duties_description" class="font-semibold">Brief Description of
                                                your Duties *</label>
                                            <textarea name="duties_description" id="duties_description"
                                                class="form-input mt-3 w-full py-2 px-3 h-24 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Describe your main duties" required></textarea>
                                        </div>
                                        <div>
                                            <label for="date_started" class="font-semibold">Date Started *</label>
                                            <input name="date_started" id="date_started" type="date"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                required>
                                        </div>
                                        <div>
                                            <label for="date_left" class="font-semibold">Date Left (if
                                                applicable)</label>
                                            <input name="date_left" id="date_left" type="date"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
                                        </div>
                                        <div class="md:col-span-2">
                                            <label for="reason_for_leaving" class="font-semibold">Reason for Leaving (if
                                                applicable)</label>
                                            <textarea name="reason_for_leaving" id="reason_for_leaving"
                                                class="form-input mt-3 w-full py-2 px-3 h-24 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Details"></textarea>
                                        </div>
                                        <div>
                                            <label for="salary" class="font-semibold">Salary</label>
                                            <input name="salary" id="salary" type="number"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="e.g., £25,000">
                                        </div>
                                        <div>
                                            <label for="salary_period" class="font-semibold">Salary Period</label>
                                            <select name="salary_period" id="salary_period"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
                                                <option value="">Select Period</option>
                                                <option value="Per Hour">Per Hour</option>
                                                <option value="Per Week">Per Week</option>
                                                <option value="Per Month">Per Month</option>
                                                <option value="Per Annum">Per Annum</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="notice_period" class="font-semibold">Notice Period</label>
                                            <input name="notice_period" id="notice_period" type="text"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="e.g., 1 month, 2 weeks">
                                        </div>
                                    </div>
                                    <div class="mt-6">
                                        <label class="font-semibold">Please confirm whether this is your only job?
                                            *</label>
                                        <div class="mt-3 flex gap-4">
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="only_job_yes" name="is_only_job" value="1"
                                                    required>
                                                <label for="only_job_yes" class="ml-2">Yes</label>
                                            </div>
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="only_job_no" name="is_only_job" value="0"
                                                    required>
                                                <label for="only_job_no" class="ml-2">No</label>
                                            </div>
                                        </div>
                                        <div class="text-start mt-3" id="not_only_job_details_div"
                                            style="display:none;">
                                            <label for="other_jobs_details" class="font-semibold">If No, please give
                                                full details:</label>
                                            <textarea name="other_jobs_details" id="other_jobs_details"
                                                class="form-input mt-3 w-full py-2 px-3 h-24 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Details"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-12 mt-6">
                                    <h3 class="text-xl font-semibold mb-4">References</h3>
                                    <p class="mb-4">Please give the names and contact details of your two most recent
                                        employers (one of which must be your current employer and one must be a previous
                                        employer) whom we will approach for a reference.</p>
                                    <h4 class="text-lg font-semibold mb-3">Reference 1 (Most Recent / Current Employer)
                                    </h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                        <div>
                                            <label for="ref1_full_name" class="font-semibold">Full Name *</label>
                                            <input name="ref1_full_name" id="ref1_full_name" type="text"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Full Name" required>
                                        </div>
                                        <div>
                                            <label for="ref1_company_name" class="font-semibold">Company Name *</label>
                                            <input name="ref1_company_name" id="ref1_company_name" type="text"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Company Name" required>
                                        </div>
                                        <div>
                                            <label for="ref1_job_title" class="font-semibold">Job Title *</label>
                                            <input name="ref1_job_title" id="ref1_job_title" type="text"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Job Title" required>
                                        </div>
                                        <div>
                                            <label for="ref1_phone_number" class="font-semibold">Phone Number *</label>
                                            <input name="ref1_phone_number" id="ref1_phone_number" type="tel"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Phone Number" required>
                                        </div>
                                        <div>
                                            <label for="ref1_email" class="font-semibold">Email *</label>
                                            <input name="ref1_email" id="ref1_email" type="email"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Email" required>
                                        </div>
                                        <div>
                                            <label for="ref1_address_line_1" class="font-semibold">Address Line 1
                                                *</label>
                                            <input name="ref1_address_line_1" id="ref1_address_line_1" type="text"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Address Line 1" required>
                                        </div>
                                        <div class="md:col-span-2">
                                            <label for="ref1_city" class="font-semibold">City *</label>
                                            <input name="ref1_city" id="ref1_city" type="text"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="City" required>
                                        </div>
                                    </div>
                                    <h4 class="text-lg font-semibold mb-3">Reference 2 (Previous Employer)</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="ref2_full_name" class="font-semibold">Full Name *</label>
                                            <input name="ref2_full_name" id="ref2_full_name" type="text"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Full Name" required>
                                        </div>
                                        <div>
                                            <label for="ref2_company_name" class="font-semibold">Company Name *</label>
                                            <input name="ref2_company_name" id="ref2_company_name" type="text"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Company Name" required>
                                        </div>
                                        <div>
                                            <label for="ref2_job_title" class="font-semibold">Job Title *</label>
                                            <input name="ref2_job_title" id="ref2_job_title" type="text"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Job Title" required>
                                        </div>
                                        <div>
                                            <label for="ref2_phone_number" class="font-semibold">Phone Number *</label>
                                            <input name="ref2_phone_number" id="ref2_phone_number" type="tel"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Phone Number" required>
                                        </div>
                                        <div>
                                            <label for="ref2_email" class="font-semibold">Email *</label>
                                            <input name="ref2_email" id="ref2_email" type="email"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Email" required>
                                        </div>
                                        <div>
                                            <label for="ref2_address_line_1" class="font-semibold">Address Line 1
                                                *</label>
                                            <input name="ref2_address_line_1" id="ref2_address_line_1" type="text"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Address Line 1" required>
                                        </div>
                                        <div class="md:col-span-2">
                                            <label for="ref2_city" class="font-semibold">City *</label>
                                            <input name="ref2_city" id="ref2_city" type="text"
                                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="City" required>
                                        </div>
                                    </div>
                                    <div class="mt-6">
                                        <label class="font-semibold">Do you give permission for referees to be contacted
                                            prior to any offer of employment? *</label>
                                        <div class="mt-3 flex gap-4">
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="permission_yes" name="ref_contact_permission"
                                                    value="1" required>
                                                <label for="permission_yes" class="ml-2">Yes</label>
                                            </div>
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="permission_no" name="ref_contact_permission"
                                                    value="0" required>
                                                <label for="permission_no" class="ml-2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-12 mt-6">
                                    <h3 class="text-xl font-semibold mb-4">Additional Information</h3>
                                    <label for="relevant_experience" class="font-semibold">Please detail any relevant
                                        experience you can bring to this role and why you feel you are the best
                                        candidate for this position. Please also give details of your aspirations,
                                        personal strengths and goals for the future. *</label>
                                    <textarea name="relevant_experience" id="relevant_experience"
                                        class="form-input mt-3 w-full py-2 px-3 h-32 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                        placeholder="Provide details here..." required></textarea>
                                </div>

                                <div class="lg:col-span-12 mt-6">
                                    <h3 class="text-xl font-semibold mb-4">Rehabilitation of Offenders Act 1974</h3>
                                    <p class="mb-4">
                                        The Rehabilitation of Offenders Act 1974 (Exclusions and Exceptions) (Scotland)
                                        Order 2013 as amended, The Police Act 1997 and the Protection of Vulnerable
                                        Groups (Scotland) Act 2007 Remedial Order 2015”. As providers of care services
                                        Website-For-Homecare are exempt from the provisions of the Rehabilitation of
                                        Offenders Act 1974 under section 4(2) of said 1974 Act. The role that you have
                                        applied for is regulated work with protected adults and Website-For-Homecare
                                        will therefore undertake a PVG check as part of the application. You are
                                        therefore required to disclose any unspent convictions or cautions and any spent
                                        convictions for offences included in Schedule A1, ‘OFFENCES WHICH MUST ALWAYS BE
                                        DISCLOSED’ of the Rehabilitation of Offenders Act (Exclusions and Exceptions)
                                        (Scotland) Amendment Order 2015 No.2. You are not required to disclose spent
                                        convictions for offences included in Schedule B1, ‘OFFENCES WHICH ARE TO BE
                                        DISCLOSED SUBJECT TO RULES’ until such time as they are included in a higher
                                        level disclosure issued by Disclosure Scotland.” These lists of offences are
                                        available on the Disclosure Scotland website or at www.legislation.gov.uk
                                    </p>
                                    <div class="mt-4">
                                        <label class="font-semibold">I have read and understand the above statement
                                            *</label>
                                        <div class="mt-3 flex gap-4">
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="understand_statement_yes"
                                                    name="understood_rehabilitation_act" value="1" required>
                                                <label for="understand_statement_yes" class="ml-2">Yes</label>
                                            </div>
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="understand_statement_no"
                                                    name="understood_rehabilitation_act" value="0" required>
                                                <label for="understand_statement_no" class="ml-2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label class="font-semibold">Have you ever been the subject of disciplinary
                                            action with the H.M Forces and/or Professional Bodies, including the Police
                                            Force? *</label>
                                        <div class="mt-3 flex gap-4">
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="disciplinary_action_yes"
                                                    name="disciplinary_action_hm_forces" value="1" required>
                                                <label for="disciplinary_action_yes" class="ml-2">Yes</label>
                                            </div>
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="disciplinary_action_no"
                                                    name="disciplinary_action_hm_forces" value="0" required>
                                                <label for="disciplinary_action_no" class="ml-2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label class="font-semibold">Do you have any unspent convictions? *</label>
                                        <div class="mt-3 flex gap-4">
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="unspent_convictions_yes"
                                                    name="unspent_convictions" value="1" required>
                                                <label for="unspent_convictions_yes" class="ml-2">Yes</label>
                                            </div>
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="unspent_convictions_no"
                                                    name="unspent_convictions" value="0" required>
                                                <label for="unspent_convictions_no" class="ml-2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label class="font-semibold">Do you have any spent convictions for offences on
                                            the always disclose list? *</label>
                                        <div class="mt-3 flex gap-4">
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="spent_convictions_disclose_yes"
                                                    name="spent_convictions_disclose" value="1" required>
                                                <label for="spent_convictions_disclose_yes" class="ml-2">Yes</label>
                                            </div>
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="spent_convictions_disclose_no"
                                                    name="spent_convictions_disclose" value="0" required>
                                                <label for="spent_convictions_disclose_no" class="ml-2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label class="font-semibold">Do you have any pending charges you wish to declare
                                            to us? *</label>
                                        <div class="mt-3 flex gap-4">
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="pending_charges_yes" name="pending_charges"
                                                    value="1" required>
                                                <label for="pending_charges_yes" class="ml-2">Yes</label>
                                            </div>
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="pending_charges_no" name="pending_charges"
                                                    value="0" required>
                                                <label for="pending_charges_no" class="ml-2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label class="font-semibold">Are you currently subject to a
                                            referral/investigation by any regulatory body? *</label>
                                        <div class="mt-3 flex gap-4">
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="regulatory_investigation_yes"
                                                    name="regulatory_investigation" value="1" required>
                                                <label for="regulatory_investigation_yes" class="ml-2">Yes</label>
                                            </div>
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="regulatory_investigation_no"
                                                    name="regulatory_investigation" value="0" required>
                                                <label for="regulatory_investigation_no" class="ml-2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label class="font-semibold">Have you any current conditions/warnings attached
                                            to your registrations? *</label>
                                        <div class="mt-3 flex gap-4">
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="registration_conditions_yes"
                                                    name="registration_conditions" value="1" required>
                                                <label for="registration_conditions_yes" class="ml-2">Yes</label>
                                            </div>
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="registration_conditions_no"
                                                    name="registration_conditions" value="0" required>
                                                <label for="registration_conditions_no" class="ml-2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-start mt-6" id="conviction_details_div" style="display:none;">
                                        <label for="conviction_details" class="font-semibold">If you have answered 'Yes'
                                            to any of the above, please state when, the court, the offence and disposal:
                                            *</label>
                                        <textarea name="conviction_details" id="conviction_details"
                                            class="form-input mt-3 w-full py-2 px-3 h-24 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                            placeholder="Details"></textarea>
                                    </div>
                                </div>

                                <div class="lg:col-span-12 mt-6">
                                    <h3 class="text-xl font-semibold mb-4">Driving Information</h3>
                                    <div class="mt-4">
                                        <label class="font-semibold">Do you have a current UK Driving License? *</label>
                                        <div class="mt-3 flex gap-4">
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="uk_license_yes" name="uk_driving_license"
                                                    value="1" required>
                                                <label for="uk_license_yes" class="ml-2">Yes</label>
                                            </div>
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="uk_license_no" name="uk_driving_license"
                                                    value="0" required>
                                                <label for="uk_license_no" class="ml-2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label class="font-semibold">Do you have access to a car? *</label>
                                        <div class="mt-3 flex gap-4">
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="access_car_yes" name="access_to_car" value="1"
                                                    required>
                                                <label for="access_car_yes" class="ml-2">Yes</label>
                                            </div>
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="access_car_no" name="access_to_car" value="0"
                                                    required>
                                                <label for="access_car_no" class="ml-2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label class="font-semibold">Do you have any endorsements? *</label>
                                        <div class="mt-3 flex gap-4">
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="endorsements_yes" name="endorsements" value="1"
                                                    required>
                                                <label for="endorsements_yes" class="ml-2">Yes</label>
                                            </div>
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="endorsements_no" name="endorsements" value="0"
                                                    required>
                                                <label for="endorsements_no" class="ml-2">No</label>
                                            </div>
                                        </div>
                                        <div class="text-start mt-3" id="endorsement_details_div" style="display:none;">
                                            <label for="endorsement_details" class="font-semibold">If Yes please give
                                                details and dates *</label>
                                            <textarea name="endorsement_details" id="endorsement_details"
                                                class="form-input mt-3 w-full py-2 px-3 h-24 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                                placeholder="Details and dates"></textarea>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <label for="driving_license_number" class="font-semibold">Driving license
                                            no.</label>
                                        <input name="driving_license_number" id="driving_license_number" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                            placeholder="Driving License Number">
                                    </div>
                                </div>

                                <div class="lg:col-span-12 mt-6">
                                    <h3 class="text-xl font-semibold mb-4">Supporting Statement</h3>
                                    <p class="mb-4">
                                        In this section you need to demonstrate that you have read the published person
                                        specification and how you meet the essential and (where relevant) desirable
                                        criteria for this particular post, if this has not been fully covered in the
                                        previous sections. Please include your reasons for applying and take the
                                        opportunity to highlight your particular talents and strengths, (what you feel
                                        you can personally offer - what is unique to you - what sets you apart from your
                                        peers). Please DO NOT include personal details or duplicate information already
                                        provided elsewhere in your application.
                                    </p>
                                    <textarea name="supporting_statement" id="supporting_statement"
                                        class="form-input mt-3 w-full py-2 px-3 h-40 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                        placeholder="Type here" required></textarea>
                                </div>

                                <div class="lg:col-span-12 mt-6">
                                    <p class="mb-4">
                                        As part of your application to work with us, we will collect and process
                                        personal data about you. We will use this data for the purposes of assessing
                                        your suitability for the role, conducting background checks, and communicating
                                        with you throughout the recruitment process. We will also retain your data for a
                                        reasonable period after the recruitment process, in case we need to contact you
                                        for future opportunities (at your request) or deal with any legal claims. We are
                                        committed to protecting your privacy and respecting your rights under data
                                        protection laws. You can find more information about how we use your data, what
                                        rights have, and how to contact us in our online privacy notice at <a
                                            href="https://Website-For-Homecare.co.uk/privacy-policy/"
                                            class="text-blue-600 hover:underline"
                                            target="_blank">https://Website-For-Homecare.co.uk/privacy-policy/</a> By
                                        submitting your application, you consent to us processing your data for the
                                        purposes of employment. We're an Equal Opportunity Employer and committed to
                                        excellence through diversity. The Application must be fully completed to be
                                        considered. Please complete each session, even if you attached a resume. You can
                                        withdraw your consent at any time by contacting us at highlandhomecare.co.uk
                                    </p>

                                    <div class="mt-4">
                                        <label class="font-semibold">I have
                                            read and agree to the Privacy Policy
                                            *</label>
                                        <div class="mt-3 flex gap-4">
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="data_processing_consent_yes"
                                                    name="data_processing_consent" value="1" required>
                                                <label for="data_processing_consent_yes" class="ml-2">Yes</label>
                                            </div>
                                            <div class="flex space-x-3 items-center">
                                                <input type="radio" id="data_processing_consent_no"
                                                    name="data_processing_consent" value="0" required>
                                                <label for="data_processing_consent_no" class="ml-2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lg:col-span-12 mt-6">
                                        <button type="submit" id="submit" name="send"
                                            class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-950 border-blue-600 hover:border-blue-950 text-white rounded-md">Submit
                                            Application</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->

    </section><!--end section-->
</x-frontend-layout>
<script src="{{ asset('js/job-apply.js') }}"></script>
