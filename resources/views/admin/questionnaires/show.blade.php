<x-app-layout>
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Employee Questionnaire Details</h5>
                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white">
                        <a href="{{ route('admin.questionnaires.index') }}">Website-For-Homecare</a>
                    </li>
                    <li class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="uil uil-angle-right-b"></i>
                    </li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white" aria-current="page">Questionnaire Details</li>
                </ul>
            </div>
            <div class="container relative mt-6">
                <div class="md:flex justify-center">
                    <div class="lg:w-4/5 w-full">
                        <div class="p-6 bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                            <h5 class="text-lg font-semibold mb-6">Personal Details:</h5>
                            <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Title:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->title }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">First Name:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->first_name }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Last Name:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->last_name }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Other Names:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->other_names ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Gender:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="venus-mars" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->gender }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Date of Birth:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ \Carbon\Carbon::parse($employeeQuestionnaire->date_of_birth)->format('jS F Y') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Place of Birth:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="map-pin" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->place_of_birth ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Nationality:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="flag" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->nationalities }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Worked in UK:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $employeeQuestionnaire->worked_in_uk ? 'check-circle' : 'x-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->worked_in_uk ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-lg font-semibold mb-6">Contact Details:</h5>
                            <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Current Address:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="map-pin" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->current_address }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Duration at Address:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="clock" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->duration_at_address }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Ownership Status:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="home" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->ownership_status }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Contact Number:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="phone" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->contact_number }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-lg font-semibold mb-6">Passport & Immigration Details:</h5>
                            <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Passport Details:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="book" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->passport_details }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Travel Outside UK:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $employeeQuestionnaire->travel_outside_uk ? 'check-circle' : 'x-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->travel_outside_uk ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">English Test:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $employeeQuestionnaire->english_test ? 'check-circle' : 'x-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->english_test ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Adverse Immigration:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $employeeQuestionnaire->adverse_immigration ? 'check-circle' : 'x-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->adverse_immigration ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Criminal Offence:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $employeeQuestionnaire->criminal_offence ? 'check-circle' : 'x-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->criminal_offence ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Lived in Other Countries:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $employeeQuestionnaire->lived_in_other_countries ? 'check-circle' : 'x-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->lived_in_other_countries ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-lg font-semibold mb-6">Current Employment Details:</h5>
                            <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Current Employer Name:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->current_employer_name ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Current Job Title:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->current_job_title ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Current Start Date:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->current_start_date ? \Carbon\Carbon::parse($employeeQuestionnaire->current_start_date)->format('jS F Y') : 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Current End Date:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->current_end_date ? \Carbon\Carbon::parse($employeeQuestionnaire->current_end_date)->format('jS F Y') : 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Employment Breaks:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="clock" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->employment_breaks ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-lg font-semibold mb-6">Previous Employment Details:</h5>
                            <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Previous Employer:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->previous_employer ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Previous Job Title:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->previous_job_title ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Previous Start Date:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->previous_start_date ? \Carbon\Carbon::parse($employeeQuestionnaire->previous_start_date)->format('jS F Y') : 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Previous End Date:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->previous_end_date ? \Carbon\Carbon::parse($employeeQuestionnaire->previous_end_date)->format('jS F Y') : 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-lg font-semibold mb-6">Qualification Details:</h5>
                            <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Qualification:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="book-open" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->qualification ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Subject:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="book-open" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->subject ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Awarding Institution:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="university" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->awarding_institution ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Qualification Date From:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->qualification_date_from ? \Carbon\Carbon::parse($employeeQuestionnaire->qualification_date_from)->format('jS F Y') : 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Qualification Date To:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->qualification_date_to ? \Carbon\Carbon::parse($employeeQuestionnaire->qualification_date_to)->format('jS F Y') : 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Taught in English:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $employeeQuestionnaire->taught_in_english ? 'check-circle' : 'x-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->taught_in_english ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-lg font-semibold mb-6">UK Employment Details:</h5>
                            <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">UK Job Title:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->uk_job_title ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">UK Employer Name:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->uk_employer_name ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">UK Start Date:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->uk_start_date ? \Carbon\Carbon::parse($employeeQuestionnaire->uk_start_date)->format('jS F Y') : 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Travel to UK Date:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->travel_to_uk_date ? \Carbon\Carbon::parse($employeeQuestionnaire->travel_to_uk_date)->format('jS F Y') : 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Skills Experience:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="zap" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-50 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->skills_experience ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Governing Body Details:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="award" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-50 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->governing_body_details ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-lg font-semibold mb-6">Family Details:</h5>
                            <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Family Given Name:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user-plus" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->family_given_name ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Family Surname:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user-plus" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->family_surname ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Family Nationality:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="flag" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->family_nationality ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Family Date of Birth:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->family_date_of_birth ? \Carbon\Carbon::parse($employeeQuestionnaire->family_date_of_birth)->format('jS F Y') : 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Family Relationship:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="heart" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->family_relationship ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Family Travel with You:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $employeeQuestionnaire->family_travel_with_you ? 'check-circle' : 'x-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $employeeQuestionnaire->family_travel_with_you ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end mt-6">

                                <a href="{{ route('admin.questionnaires.index') }}" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-800 hover:bg-gray-950 border-gray-800 hover:border-gray-950 text-white rounded-md">
                                    Back to List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
