<x-app-layout>
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Medical Self Assessment Details</h5>
                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white">
                        <a href="{{ route('admin.medical-self-assessments.index') }}">Dashboard</a>
                    </li>
                    <li class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="uil uil-angle-right-b"></i>
                    </li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white" aria-current="page">
                        Medical Assessment Details
                    </li>
                </ul>
            </div>
            <div class="container relative mt-6">
                <div class="md:flex justify-center">
                    <div class="lg:w-4/5 w-full">
                        <div class="p-6 bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                            <h5 class="text-lg font-semibold mb-6">Submitted By:</h5>
                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Submitted By:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->user->name }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Submission Date:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->created_at->format('jS F Y \a\t H:i') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-lg font-semibold mb-6">Personal Information:</h5>
                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Job Title:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->job_title }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Surname:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->surname }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Other Names:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->other_names }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Date of Birth:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->date_of_birth->format('jS F Y') }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Address:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="home" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-50 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->address }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Daytime Contact:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="phone" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->daytime_contact_number }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Alternative Contact:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="phone" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->alternative_contact_number }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Email:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->email }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Company Number:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="hash" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->company_number }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-lg font-semibold mb-6">Medical Information:</h5>
                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Doctor's Name:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->doctor_name ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Doctor's Address:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="home" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-50 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->doctor_address ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Night Shift Restrictions:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->night_shift_restrictions ? 'alert-circle' : 'check-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->night_shift_restrictions ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">NHS Student Nurse:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->nhs_student_nurse ? 'check-circle' : 'x-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->nhs_student_nurse ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">NHS Healthcare Assistant:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->nhs_healthcare_assistant ? 'check-circle' : 'x-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->nhs_healthcare_assistant ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">NHS Nurse or Similar:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->nhs_nurse_or_the_above ? 'check-circle' : 'x-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->nhs_nurse_or_the_above ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-lg font-semibold mb-6">Health Conditions:</h5>
                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">TB Risk:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->tb_risk ? 'alert-circle' : 'check-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->tb_risk ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">TB Diagnosis:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->tb_diagnosis ? 'alert-circle' : 'check-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->tb_diagnosis ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">TB Contact:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->tb_contact ? 'alert-circle' : 'check-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->tb_contact ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Persistent Cough:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->persistent_cough ? 'alert-circle' : 'check-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->persistent_cough ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Weight Loss/Fever:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->weight_loss_fever ? 'alert-circle' : 'check-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->weight_loss_fever ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">BCG Vaccination:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->bcg_vaccination ? 'check-circle' : 'x-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->bcg_vaccination ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Musculoskeletal Problems:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->musculoskeletal_problems ? 'alert-circle' : 'check-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->musculoskeletal_problems ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Physical Restrictions:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->physical_restrictions ? 'alert-circle' : 'check-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->physical_restrictions ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Fits/Faints:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->fits_faints ? 'alert-circle' : 'check-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->fits_faints ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Allergies:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->allergies ? 'alert-circle' : 'check-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->allergies ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Medication:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->medication ? 'alert-circle' : 'check-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->medication ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Blood Borne Viruses:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->blood_borne_viruses ? 'alert-circle' : 'check-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->blood_borne_viruses ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Other Health Issues:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->other_health_issues ? 'alert-circle' : 'check-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->other_health_issues ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Work Adjustments Needed:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $assessment->work_adjustments ? 'alert-circle' : 'check-circle' }}" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->work_adjustments ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="text-lg font-semibold mb-6">Declaration:</h5>
                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Declaration Date:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $assessment->declaration_date->format('jS F Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end mt-6">
                                <a href="{{ route('admin.medical-self-assessments.index') }}"
                                    class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-800 hover:bg-gray-950 border-gray-800 hover:border-gray-950 text-white rounded-md">
                                    Back to List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
