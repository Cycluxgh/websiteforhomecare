<x-app-layout>

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Questionnaire Form</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white"><a href="/">Website-For-Homecare</a></li>
                    <li class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="uil uil-angle-right-b"></i></li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white" aria-current="page">Questionnaire Form</li>
                </ul>
            </div>
            <div class="grid grid-cols-1 mt-6">
                <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                    <div class="p-6 relative rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
                        <form id="employeeQuestionnaireForm" method="POST" action="{{ route('employee.employee_questionnaire.store') }}">
                            @csrf

                            <!-- Hidden user_id field -->
                            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->id() }}">

                            <!-- Title -->
                            <div class="grid grid-cols-1 mt-5">
                                <h3 class="text-lg font-semibold">EMPLOYEE QUESTIONNAIRE<br>For Certificate of Sponsorship - Tier 2 (General)</h3>
                            </div>

                            <!-- Personal Information -->
                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mt-5">
                                <!-- Title -->
                                <div>
                                    <label class="form-label font-medium">Title: <span class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <input type="text" name="title" id="title" required placeholder="Mr/Ms/Mrs/etc."
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>

                                <!-- First Name -->
                                <div>
                                    <label class="form-label font-medium">First Name: <span class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <input type="text" name="first_name" id="first_name" required placeholder="Your first name"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>

                                <!-- Last Name -->
                                <div>
                                    <label class="form-label font-medium">Last Name: <span class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <input type="text" name="last_name" id="last_name" required placeholder="Your last name"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>

                                <!-- Other Names -->
                                <div>
                                    <label class="form-label font-medium">Any other names that you have been known (including maiden name):</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <input type="text" name="other_names" id="other_names" placeholder="Other names"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>

                                <!-- Gender -->
                                <div>
                                    <label class="form-label font-medium">Gender: <span class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="users" class="size-4 absolute top-3 start-4"></i>
                                        <select name="gender" id="gender" required
                                            class="form-select ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                            <option value="">Select gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Date of Birth -->
                                <div>
                                    <label class="form-label font-medium">Date of Birth: <span class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <input type="date" name="date_of_birth" id="date_of_birth" required
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>

                                <!-- Place of Birth -->
                                <div>
                                    <label class="form-label font-medium">Place of Birth: <span class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="map-pin" class="size-4 absolute top-3 start-4"></i>
                                        <input type="text" name="place_of_birth" id="place_of_birth" required placeholder="City, Country"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>

                                <!-- Nationalities -->
                                <div>
                                    <label class="form-label font-medium">Nationalities Held: <span class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="globe" class="size-4 absolute top-3 start-4"></i>
                                        <input type="text" name="nationalities" id="nationalities" required placeholder="e.g. British, Indian"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>

                                <!-- Passport Details -->
                                <div>
                                    <label class="form-label font-medium">Passport Details:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="book" class="size-4 absolute top-3 start-4"></i>
                                        <input type="text" name="passport_details" id="passport_details" placeholder="Passport number, expiry date"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>
                            </div>

                            <!-- Residential Information -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">RESIDENTIAL INFORMATION</h4>

                                <!-- Current Address -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">Current Address:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="map-pin" class="size-4 absolute top-3 start-4"></i>
                                        <textarea name="current_address" id="current_address" placeholder="Your current address"
                                            class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0"></textarea>
                                    </div>
                                </div>

                                <!-- Duration at Address -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">How long have you lived at this address?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="clock" class="size-4 absolute top-3 start-4"></i>
                                        <input type="text" name="duration_at_address" id="duration_at_address" placeholder="e.g. 2 years"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>

                                <!-- Ownership Status -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">What is the ownership status of your home? (e.g. own / rent / live with family etc):</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="home" class="size-4 absolute top-3 start-4"></i>
                                        <input type="text" name="ownership_status" id="ownership_status" placeholder="e.g. Rent"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>

                                <!-- Contact Telephone Number -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">Contact Telephone Number: <span class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="phone" class="size-4 absolute top-3 start-4"></i>
                                        <input type="tel" name="contact_number" id="contact_number" required placeholder="e.g. 07123456789"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>

                                <!-- Worked in the UK Before -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">Have you ever worked in the UK before?</label>
                                    <div class="flex items-center mt-2">
                                        <input type="radio" name="worked_in_uk" id="worked_in_uk_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="worked_in_uk_yes" class="ms-2">Yes</label>
                                        <input type="radio" name="worked_in_uk" id="worked_in_uk_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600 ms-4">
                                        <label for="worked_in_uk_no" class="ms-2">No</label>
                                    </div>
                                </div>

                                <!-- Travel Outside the UK -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">Will you be traveling outside of the country that you currently prior to starting work in the UK?</label>
                                    <div class="flex items-center mt-2">
                                        <input type="radio" name="travel_outside_uk" id="travel_outside_uk_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="travel_outside_uk_yes" class="ms-2">Yes</label>
                                        <input type="radio" name="travel_outside_uk" id="travel_outside_uk_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600 ms-4">
                                        <label for="travel_outside_uk_no" class="ms-2">No</label>
                                    </div>
                                </div>

                                <!-- English Language Test -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">Have you previously taken an English language test?</label>
                                    <div class="flex items-center mt-2">
                                        <input type="radio" name="english_test" id="english_test_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="english_test_yes" class="ms-2">Yes</label>
                                        <input type="radio" name="english_test" id="english_test_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600 ms-4">
                                        <label for="english_test_no" class="ms-2">No</label>
                                    </div>
                                </div>

                                <!-- Immigration History -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">Do you have an adverse immigration history, including previous visa refusals for any country?</label>
                                    <div class="flex items-center mt-2">
                                        <input type="radio" name="adverse_immigration" id="adverse_immigration_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="adverse_immigration_yes" class="ms-2">Yes</label>
                                        <input type="radio" name="adverse_immigration" id="adverse_immigration_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600 ms-4">
                                        <label for="adverse_immigration_no" class="ms-2">No</label>
                                    </div>
                                </div>

                                <!-- Criminal Offence -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">Have you ever been charged or convicted of a criminal offence, including traffic offences, civil penalties and offences for which you have yet to be tried in court?</label>
                                    <div class="flex items-center mt-2">
                                        <input type="radio" name="criminal_offence" id="criminal_offence_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="criminal_offence_yes" class="ms-2">Yes</label>
                                        <input type="radio" name="criminal_offence" id="criminal_offence_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600 ms-4">
                                        <label for="criminal_offence_no" class="ms-2">No</label>
                                    </div>
                                </div>

                                <!-- Lived in Other Countries -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">Unless you are a citizen of your current country of residence, have you lived in any other country for at least 12 months in the past 10 years?</label>
                                    <div class="flex items-center mt-2">
                                        <input type="radio" name="lived_in_other_countries" id="lived_in_other_countries_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="lived_in_other_countries_yes" class="ms-2">Yes</label>
                                        <input type="radio" name="lived_in_other_countries" id="lived_in_other_countries_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600 ms-4">
                                        <label for="lived_in_other_countries_no" class="ms-2">No</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Employment History -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">EMPLOYMENT HISTORY</h4>

                                <!-- Current Employer Information -->
                                <div class="mt-2">
                                    <h5 class="text-sm font-medium">CURRENT EMPLOYER INFORMATION</h5>
                                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mt-2">
                                        <!-- Name of Current Employer -->
                                        <div>
                                            <label class="form-label font-medium">Name of current employer: <span class="text-red-600">*</span></label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                                <input type="text" name="current_employer_name" id="current_employer_name" required placeholder="Employer name"
                                                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                            </div>
                                        </div>

                                        <!-- Job Title -->
                                        <div>
                                            <label class="form-label font-medium">Job Title: <span class="text-red-600">*</span></label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                                <input type="text" name="current_job_title" id="current_job_title" required placeholder="Your job title"
                                                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                            </div>
                                        </div>

                                        <!-- Start Date -->
                                        <div>
                                            <label class="form-label font-medium">Start Date: <span class="text-red-600">*</span></label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                                <input type="date" name="current_start_date" id="current_start_date" required
                                                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                            </div>
                                        </div>

                                        <!-- End Date -->
                                        <div>
                                            <label class="form-label font-medium">End Date:</label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                                <input type="date" name="current_end_date" id="current_end_date"
                                                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                            </div>
                                        </div>

                                        <!-- Breaks in Employment -->
                                        <div class="col-span-2">
                                            <label class="form-label font-medium">Any breaks in employment in the last 12 months? <span class="text-red-600">*</span></label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                                <textarea name="employment_breaks" id="employment_breaks" required placeholder="Describe any breaks"
                                                    class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Previous Employer Information -->
                                <div class="mt-5">
                                    <h5 class="text-sm font-medium">PREVIOUS EMPLOYER INFORMATION</h5>
                                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mt-2">
                                        <!-- Name and Address of Previous Employer -->
                                        <div class="col-span-2">
                                            <label class="form-label font-medium">Name and address of previous employer:</label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                                <textarea name="previous_employer" id="previous_employer" placeholder="Employer name and address"
                                                    class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0"></textarea>
                                            </div>
                                        </div>

                                        <!-- Job Title -->
                                        <div>
                                            <label class="form-label font-medium">Job Title: <span class="text-red-600">*</span></label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                                <input type="text" name="previous_job_title" id="previous_job_title" required placeholder="Your job title"
                                                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                            </div>
                                        </div>

                                        <!-- Start Date -->
                                        <div>
                                            <label class="form-label font-medium">Start Date: <span class="text-red-600">*</span></label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                                <input type="date" name="previous_start_date" id="previous_start_date" required
                                                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                            </div>
                                        </div>

                                        <!-- End Date -->
                                        <div>
                                            <label class="form-label font-medium">End Date: <span class="text-red-600">*</span></label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                                <input type="date" name="previous_end_date" id="previous_end_date" required
                                                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Academic Qualifications -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">ACADEMIC QUALIFICATIONS</h4>

                                <!-- Qualification Details -->
                                <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mt-2">
                                    <!-- Qualification -->
                                    <div>
                                        <label class="form-label font-medium">Qualification:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="award" class="size-4 absolute top-3 start-4"></i>
                                            <input type="text" name="qualification" id="qualification" placeholder="e.g. Bachelor's Degree"
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                        </div>
                                    </div>

                                    <!-- Subject -->
                                    <div>
                                        <label class="form-label font-medium">Subject:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="book-open" class="size-4 absolute top-3 start-4"></i>
                                            <input type="text" name="subject" id="subject" placeholder="e.g. Computer Science"
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                        </div>
                                    </div>

                                    <!-- Awarding Institution -->
                                    <div>
                                        <label class="form-label font-medium">Awarding Institution:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="university" class="size-4 absolute top-3 start-4"></i>
                                            <input type="text" name="awarding_institution" id="awarding_institution" placeholder="e.g. University of London"
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                        </div>
                                    </div>

                                    <!-- Date From -->
                                    <div>
                                        <label class="form-label font-medium">Date From:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                            <input type="date" name="qualification_date_from" id="qualification_date_from"
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                        </div>
                                    </div>

                                    <!-- Date To -->
                                    <div>
                                        <label class="form-label font-medium">Date To:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                            <input type="date" name="qualification_date_to" id="qualification_date_to"
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                        </div>
                                    </div>
                                </div>

                                <!-- English Taught -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">Was this qualification taught in English?</label>
                                    <div class="flex items-center mt-2">
                                        <input type="radio" name="taught_in_english" id="taught_in_english_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="taught_in_english_yes" class="ms-2">Yes</label>
                                        <input type="radio" name="taught_in_english" id="taught_in_english_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600 ms-4">
                                        <label for="taught_in_english_no" class="ms-2">No</label>
                                    </div>
                                </div>
                            </div>

                            <!-- UK Employment -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">UK EMPLOYMENT</h4>

                                <!-- UK Job Title -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">UK Job Title: <span class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                        <input type="text" name="uk_job_title" id="uk_job_title" required placeholder="Your UK job title"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>

                                <!-- Name of Employer -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">Name of the employer:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                        <input type="text" name="uk_employer_name" id="uk_employer_name" placeholder="Employer name"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>

                                <!-- Available Start Date in the UK -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">What date will you be available to start work in the UK?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <input type="date" name="uk_start_date" id="uk_start_date"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>

                                <!-- Travel to the UK -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">When do you plan to travel to the UK?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <input type="date" name="travel_to_uk_date" id="travel_to_uk_date"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>

                                <!-- Skills and Experience -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">What specific skills and experience do you have for this role?</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="file-text" class="size-4 absolute top-3 start-4"></i>
                                        <textarea name="skills_experience" id="skills_experience" placeholder="Describe your skills and experience"
                                            class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0"></textarea>
                                    </div>
                                </div>

                                <!-- Governing Body Details -->
                                <div class="mt-2">
                                    <label class="form-label font-medium">If you are required to be registered by a governing body for your role, please provide details of any memberships/registrations and if these details are still active. Please include dates registered:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="file-text" class="size-4 absolute top-3 start-4"></i>
                                        <textarea name="governing_body_details" id="governing_body_details" placeholder="Governing body details"
                                            class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Family Details -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">FAMILY DETAILS</h4>
                                <p class="text-sm mt-2">List the details of any dependent family members (spouse, children, partner) who will live with you in the UK:</p>

                                <!-- Family Member Details -->
                                <div class="grid lg:grid-cols-5 grid-cols-1 gap-5 mt-2">
                                    <!-- Given Name -->
                                    <div>
                                        <label class="form-label font-medium">Given Name:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                            <input type="text" name="family_given_name" id="family_given_name" placeholder="Given name"
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                        </div>
                                    </div>

                                    <!-- Surname -->
                                    <div>
                                        <label class="form-label font-medium">Surname:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                            <input type="text" name="family_surname" id="family_surname" placeholder="Surname"
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                        </div>
                                    </div>

                                    <!-- Nationality -->
                                    <div>
                                        <label class="form-label font-medium">Nationality:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="globe" class="size-4 absolute top-3 start-4"></i>
                                            <input type="text" name="family_nationality" id="family_nationality" placeholder="Nationality"
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                        </div>
                                    </div>

                                    <!-- Date of Birth -->
                                    <div>
                                        <label class="form-label font-medium">Date of Birth:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                            <input type="date" name="family_date_of_birth" id="family_date_of_birth"
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                        </div>
                                    </div>

                                    <!-- Relationship -->
                                    <div>
                                        <label class="form-label font-medium">Relationship to You:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="users" class="size-4 absolute top-3 start-4"></i>
                                            <input type="text" name="family_relationship" id="family_relationship" placeholder="e.g. Spouse"
                                                class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                        </div>
                                    </div>

                                    <!-- Will They Travel -->
                                    <div>
                                        <label class="form-label font-medium">Will They Travel With You?</label>
                                        <div class="flex items-center mt-2">
                                            <input type="radio" name="family_travel_with_you" id="family_travel_with_you_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                            <label for="family_travel_with_you_yes" class="ms-2">Yes</label>
                                            <input type="radio" name="family_travel_with_you" id="family_travel_with_you_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600 ms-4">
                                            <label for="family_travel_with_you_no" class="ms-2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="py-2 px-5 inline-flex items-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md mt-5">
                                Save & Review
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- End Content -->
        </div>
    </div>


</x-app-layout>
<script src="{{ asset('js/employee_questionnaire_form.js') }}"></script>
