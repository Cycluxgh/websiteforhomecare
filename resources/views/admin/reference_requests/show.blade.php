<x-app-layout>
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Reference Request Details</h5>
                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li
                        class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white">
                        <a href="{{ route('admin.reference.request.index') }}">Dashboard</a>
                    </li>
                    <li
                        class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="uil uil-angle-right-b"></i>
                    </li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white"
                        aria-current="page">Reference Details</li>
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
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->user->name }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Submission Date:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->created_at->format('jS F Y \a\t H:i') }}
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="text-lg font-semibold mb-6">Referee Information:</h5>
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-6">
                <div>
                    <label class="form-label font-medium">Referee First Name:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->referee_first_name }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Referee Last Name:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->referee_last_name }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Referee Email:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->referee_email }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Referee Phone:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="phone" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->referee_phone }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Referee Job Title:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->referee_job_title }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Referee Company:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="home" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->referee_company }}
                        </div>
                    </div>
                </div>
            </div>

            <h5 class="text-lg font-semibold mb-6">Applicant Information:</h5>
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-6">
                <div>
                    <label class="form-label font-medium">Applicant Full Name:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->applicant_full_name }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Employment From:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->employment_from ? \Carbon\Carbon::parse($referenceRequest->employment_from)->format('jS F Y') : 'N/A' }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Employment To:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->employment_to ? \Carbon\Carbon::parse($referenceRequest->employment_to)->format('jS F Y') : 'N/A' }}
                        </div>
                    </div>
                </div>
            </div>

            <h5 class="text-lg font-semibold mb-6">Employment Details:</h5>
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-6">
                <div>
                    <label class="form-label font-medium">Would You Re-employ?</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="{{ $referenceRequest->reemploy === 'Yes' ? 'check-circle' : 'x-circle' }}"
                            class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">

                            {{ $referenceRequest->reemploy ? 'Yes' : 'No' }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Any Disciplinary Action?</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="{{ $referenceRequest->disciplinary_action ? 'alert-circle' : 'check-circle' }}"
                            class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-auto bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->disciplinary_action ? 'Yes' : 'No' }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Safeguarding Investigations?</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="{{ $referenceRequest->safeguarding_investigations ? 'alert-circle' : 'check-circle' }}"
                            class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-auto bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->safeguarding_investigations ? 'Yes' : 'No' }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Not Suitable for Vulnerable Groups?</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="{{ $referenceRequest->not_suitable_for_vulnerable ? 'alert-circle' : 'check-circle' }}"
                            class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-auto bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->not_suitable_for_vulnerable ? 'Yes' : 'No' }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Criminal Offense?</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="{{ $referenceRequest->criminal_offense ? 'alert-circle' : 'check-circle' }}"
                            class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-auto bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->criminal_offense ? 'Yes' : 'No' }}
                        </div>
                    </div>
                </div>
            </div>

            <h5 class="text-lg font-semibold mb-6">Skills Assessment:</h5>
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-6">
                <div>
                    <label class="form-label font-medium">Care Plans Rating:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="file-text" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->care_plans_rating }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Reliability Rating:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="check-circle" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->reliability_rating }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Character Rating:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="user-check" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->character_rating }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Attitude Rating:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="smile" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->attitude_rating }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Dignity Rating:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="heart" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->dignity_rating }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Communication Rating:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="message-square" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->communication_rating }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Relationships Rating:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="users" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->relationships_rating }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Initiative Rating:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="zap" class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->initiative_rating }}
                        </div>
                    </div>
                </div>
            </div>

            <h5 class="text-lg font-semibold mb-6">Additional Comments:</h5>
            <div class="mb-6">
                <div class="form-icon relative mt-2">
                    <i data-feather="file-text" class="size-4 absolute top-3 start-4"></i>
                    <div
                        class="form-input ps-12 w-full py-2 px-3 min-h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                        {{ $referenceRequest->additional_comments ?? 'No additional comments provided' }}
                    </div>
                </div>
            </div>

            <h5 class="text-lg font-semibold mb-6">Confirmation:</h5>
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-6">
                <div>
                    <label class="form-label font-medium">Confirmed Accuracy:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="{{ $referenceRequest->confirmed_accuracy ? 'check-circle' : 'x-circle' }}"
                            class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->confirmed_accuracy ? 'Yes' : 'No' }}
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label font-medium">Confirmed Data Storage:</label>
                    <div class="form-icon relative mt-2">
                        <i data-feather="{{ $referenceRequest->confirmed_storage ? 'check-circle' : 'x-circle' }}"
                            class="size-4 absolute top-3 start-4"></i>
                        <div
                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                            {{ $referenceRequest->confirmed_storage ? 'Yes' : 'No' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <label class="form-label font-medium">Signature:</label>
                <div class="form-icon relative mt-2">
                    <i data-feather="edit" class="size-4 absolute top-3 start-4"></i>
                    <div
                        class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                        {{ $referenceRequest->signature ?? 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="mb-6">
                <label class="form-label font-medium">Company Stamp:</label>
                <div class="form-icon relative mt-2">
                    <i data-feather="image" class="size-4 absolute top-3 start-4"></i>
                    <div
                        class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                        {{ $referenceRequest->company_stamp ?? 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <a href="{{ route('admin.reference.request.index') }}"
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
