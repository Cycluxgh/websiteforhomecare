<x-app-layout>

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Reference Request From</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li
                        class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white">
                        <a href="/">Website-For-Homecare</a>
                    </li>
                    <li
                        class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="uil uil-angle-right-b"></i>
                    </li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white"
                        aria-current="page">Reference Request From</li>
                </ul>
            </div>
            <div class="grid grid-cols-1 mt-6">
                <div
                    class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                    <div class="p-6 relative rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
                        <form id="referenceRequestForm" method="POST" action="{{ route('reference.request.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                            <!-- Position Applied -->
                            <div class="grid grid-cols-1 mt-5">
                                <h3 class="text-lg font-semibold">REFERENCE REQUEST FORM</h3>
                            </div>

                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">Position applied for:</h4>
                                <div class="mt-2">
                                    <div class="form-icon relative">
                                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                        <input type="text" name="position_applied"
                                            value="{{ $positionApplied ?? 'N/A' }}" readonly
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>
                            </div>

                            <!-- Referee Information -->
                            <div class="grid grid-cols-1 mt-5">
                                <div class="border-t-2 border-gray-300 pt-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Referee First Name -->
                                        <div>
                                            <label for="referee_first_name" class="form-label font-medium">First
                                                Name:</label>
                                            <input type="text" name="referee_first_name" id="referee_first_name"
                                                required
                                                class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0 mt-2">
                                        </div>

                                        <!-- Referee Last Name -->
                                        <div>
                                            <label for="referee_last_name" class="form-label font-medium">Last
                                                Name:</label>
                                            <input type="text" name="referee_last_name" id="referee_last_name"
                                                required
                                                class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0 mt-2">
                                        </div>

                                        <!-- Referee Email -->
                                        <div>
                                            <label for="referee_email" class="form-label font-medium">Email:</label>
                                            <input type="email" name="referee_email" id="referee_email" required
                                                class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0 mt-2">
                                        </div>

                                        <!-- Referee Phone -->
                                        <div>
                                            <label for="referee_phone"
                                                class="form-label font-medium">Phone/Mobile:</label>
                                            <input type="text" name="referee_phone" id="referee_phone" required
                                                class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0 mt-2">
                                        </div>

                                        <!-- Referee Job Title -->
                                        <div>
                                            <label for="referee_job_title" class="form-label font-medium">Job
                                                Title:</label>
                                            <input type="text" name="referee_job_title" id="referee_job_title"
                                                required
                                                class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0 mt-2">
                                        </div>

                                        <!-- Referee Company -->
                                        <div>
                                            <label for="referee_company" class="form-label font-medium">Company:</label>
                                            <input type="text" name="referee_company" id="referee_company" required
                                                class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0 mt-2">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Applicant Information -->
                            <div class="grid grid-cols-1 mt-5">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Applicant Full Name -->
                                    <div>
                                        <label for="applicant_full_name" class="form-label font-medium">Applicant Full
                                            Name:</label>
                                        <input type="text" name="applicant_full_name" id="applicant_full_name"
                                            required
                                            class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0 mt-2">
                                    </div>

                                    <!-- Employment From -->
                                    <div>
                                        <label for="employment_from" class="form-label font-medium">Date Employed
                                            From:</label>
                                        <input type="date" name="employment_from" id="employment_from" required
                                            class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0 mt-2">
                                    </div>

                                    <!-- Employment To -->
                                    <div>
                                        <label for="employment_to" class="form-label font-medium">Date Employed
                                            To:</label>
                                        <input type="date" name="employment_to" id="employment_to" required
                                            class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0 mt-2">
                                    </div>
                                </div>
                            </div>

                            <!-- Re-employ -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">Would you re-employ this person?</h4>
                                <div class="flex gap-4 mt-2">
                                    <div class="flex items-center">
                                        <input type="radio" name="reemploy" id="re_employ_yes" value="Yes" required
                                            class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="re_employ_yes" class="ms-2">Yes</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="reemploy" id="re_employ_no" value="No"
                                            class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="re_employ_no" class="ms-2">No</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Applicant Assessment -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">SECTION 1 – HOW WOULD YOU ASSESS THE FOLLOWING?</h4>
                                <div class="overflow-x-auto mt-2">
                                    <table class="min-w-full border border-gray-200 dark:border-gray-700">
                                        <thead>
                                            <tr class="bg-gray-50 dark:bg-gray-800">
                                                <th
                                                    class="px-4 py-2 text-left border border-gray-200 dark:border-gray-700">
                                                </th>
                                                <th
                                                    class="px-4 py-2 text-center border border-gray-200 dark:border-gray-700">
                                                    Excellent</th>
                                                <th
                                                    class="px-4 py-2 text-center border border-gray-200 dark:border-gray-700">
                                                    Good</th>
                                                <th
                                                    class="px-4 py-2 text-center border border-gray-200 dark:border-gray-700">
                                                    Acceptable</th>
                                                <th
                                                    class="px-4 py-2 text-center border border-gray-200 dark:border-gray-700">
                                                    Poor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $criteria = [
                                                    'care_plans_rating' => 'Ability to follow care plans',
                                                    'reliability_rating' => 'Reliability, timekeeping, attendance',
                                                    'character_rating' => 'Character',
                                                    'attitude_rating' => 'Attitude',
                                                    'dignity_rating' => 'Ability to ensure dignity is upheld',
                                                    'communication_rating' => 'Communication',
                                                    'relationships_rating' => 'Relationships with colleagues',
                                                    'initiative_rating' => 'Ability to work under own initiative',
                                                ];
                                            @endphp

                                            @foreach ($criteria as $field => $label)
                                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                                    <td class="px-4 py-2 border border-gray-200 dark:border-gray-700">
                                                        {{ $label }}</td>
                                                    @foreach (['Excellent', 'Good', 'Acceptable', 'Poor'] as $value)
                                                        <td
                                                            class="px-4 py-2 text-center border border-gray-200 dark:border-gray-700">
                                                            <input type="radio" name="{{ $field }}"
                                                                value="{{ $value }}" required
                                                                class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Section 2 Questions -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">SECTION 2 – Please answer the following questions
                                </h4>

                                <!-- Disciplinary action -->
                                <div class="grid grid-cols-1 mt-5">
                                    <h4 class="text-md font-semibold">Has the applicant been subject to any
                                        disciplinary action?</h4>
                                    <div class="flex gap-4 mt-2">
                                        <div class="flex items-center">
                                            <input type="radio" name="disciplinary_action"
                                                id="disciplinary_action_yes" value="Yes" required
                                                class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                            <label for="disciplinary_action_yes" class="ms-2">Yes</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" name="disciplinary_action"
                                                id="disciplinary_action_no" value="No"
                                                class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                            <label for="disciplinary_action_no" class="ms-2">No</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Safeguarding investigations -->
                                <div class="grid grid-cols-1 mt-5">
                                    <h4 class="text-md font-semibold">Are you aware of the applicant's involvement in
                                        any safeguarding investigations previous or current?</h4>
                                    <div class="flex gap-4 mt-2">
                                        <div class="flex items-center">
                                            <input type="radio" name="safeguarding_investigations"
                                                id="safeguarding_yes" value="Yes" required
                                                class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                            <label for="safeguarding_yes" class="ms-2">Yes</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" name="safeguarding_investigations"
                                                id="safeguarding_no" value="No"
                                                class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                            <label for="safeguarding_no" class="ms-2">No</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Not suitable for vulnerable -->
                                <div class="grid grid-cols-1 mt-5">
                                    <h4 class="text-md font-semibold">Are you aware of any reasons why the applicant
                                        should not be employed to work with children or vulnerable people?</h4>
                                    <div class="flex gap-4 mt-2">
                                        <div class="flex items-center">
                                            <input type="radio" name="not_suitable_for_vulnerable"
                                                id="not_suitable_yes" value="Yes" required
                                                class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                            <label for="not_suitable_yes" class="ms-2">Yes</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" name="not_suitable_for_vulnerable"
                                                id="not_suitable_no" value="No"
                                                class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                            <label for="not_suitable_no" class="ms-2">No</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Criminal offense -->
                                <div class="grid grid-cols-1 mt-5">
                                    <h4 class="text-md font-semibold">To the best of your knowledge, has the applicant
                                        been convicted or cautioned of a criminal offence?</h4>
                                    <div class="flex gap-4 mt-2">
                                        <div class="flex items-center">
                                            <input type="radio" name="criminal_offense" id="criminal_offense_yes"
                                                value="Yes" required
                                                class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                            <label for="criminal_offense_yes" class="ms-2">Yes</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" name="criminal_offense" id="criminal_offense_no"
                                                value="No"
                                                class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                            <label for="criminal_offense_no" class="ms-2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional information -->
                            <div class="grid grid-cols-1 mt-5">
                                <label class="form-label font-medium">Additional Comments</label>
                                <textarea name="additional_comments" id="additional_comments"
                                    class="form-input w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0 mt-2"></textarea>
                            </div>

                            <!-- Confirmation -->
                            <div class="grid grid-cols-1 mt-5">
                                <h2 class="text-md font-semibold">PLEASE CONFIRM</h2>
                                <h4 class="text-md font-semibold">I can confirm that all the details provided are
                                    accurate at the time that this reference was completed. I can confirm that I am
                                    authorised to provide a reference on behalf of my organisation. I understand this
                                    reference may be shown to a third party for auditing purposes and I can confirm that
                                    Website-For-Homecare Ltd and this organisation has consent and authorisation to
                                    disclose the contents of this reference to its end user, hirer clients. I understand
                                    that the applicant has the legal right to request a copy of their reference.</h4>
                            </div>

                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">Check to confirm accuracy</h4>
                                <div class="flex gap-4 mt-2">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="confirmed_accuracy" id="confirmed_accuracy"
                                            value="1" required
                                            class="form-checkbox border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="confirmed_accuracy" class="ms-2">I confirm the accuracy of this
                                            reference</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Signature -->
                            <div class="grid grid-cols-1 mt-5">
                                <label class="form-label font-medium">Signature</label>
                                <input type="text" name="signature" id="signature" required
                                    class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0 mt-2">
                            </div>

                            <!-- Company Stamp -->
                            <div class="grid grid-cols-1 mt-5">
                                <label class="form-label font-medium">Official company stamp (if available)</label>
                                <input type="file" name="company_stamp" id="company_stamp"
                                    class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                            </div>

                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">If you are not using an official company email please
                                    upload a picture of your company stamp / business card/letterhead/compliment slip.
                                </h4>
                            </div>

                            <!-- Data Storage Confirmation -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">Data Storage Agreement</h4>
                                <h4 class="text-md font-semibold">By using this form you agree with the storage and
                                    handling of your data by this website as defined in our Privacy Policy</h4>
                                <div class="flex gap-4 mt-2">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="confirmed_storage" id="confirmed_storage"
                                            value="1" required
                                            class="form-checkbox border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="confirmed_storage" class="ms-2">I agree to the storage and
                                            handling of my data</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="py-2 px-5 inline-flex items-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md mt-5">
                                Submit Recommendation
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- End Content -->
        </div>
    </div>


</x-app-layout>
<script src="{{ asset('js/reference_request_form.js') }}"></script>
