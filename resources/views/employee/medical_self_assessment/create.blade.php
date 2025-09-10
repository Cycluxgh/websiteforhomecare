<x-app-layout>

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Medical Self Assessments Form</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white"><a href="/">Website-For-Homecare</a></li>
                    <li class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="uil uil-angle-right-b"></i></li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white" aria-current="page">Medical Self Assessments Form</li>
                </ul>
            </div>
            <div class="grid grid-cols-1 mt-6">
                <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                    <div class="p-6 relative rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
                        <form id="medicalSelfAssessmentForm" method="POST" action="{{ route('medical-self-assessments.store') }}">
                            @csrf

                            <!-- Hidden user_id field -->
                            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->id() }}">

                            <!-- Title -->
                            <div class="grid grid-cols-1 mt-5">
                                <h3 class="text-lg font-semibold">MEDICAL SELF-ASSESSMENT</h3>
                                <p class="text-sm mt-2">PLEASE COMPLETE ALL SECTIONS CLEARLY IN BLACK INK USING BLOCK CAPITALS</p>
                            </div>

                            <!-- 1. PERSONAL DETAILS -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">1. PERSONAL DETAILS</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-2">
                                    <div>
                                        <label class="form-label font-medium">Job Title:</label>
                                        <div class="form-icon relative">
                                            <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                            <input type="text" name="job_title" id="job_title" value="{{ $jobTitle ?? 'N/A' }}" readonly class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Surname:</label>
                                        <input type="text" name="surname" id="surname" class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Other Names:</label>
                                        <input type="text" name="other_names" id="other_names" class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Address:</label>
                                        <textarea name="address" id="address" class="form-input w-full py-2 px-3 h-20 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0"></textarea>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Daytime Contact Number:</label>
                                        <input type="text" name="daytime_contact_number" id="daytime_contact_number" class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Alternative Contact Number:</label>
                                        <input type="text" name="alternative_contact_number" id="alternative_contact_number" class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Date of Birth:</label>
                                        <div class="form-icon relative">
                                            <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Email:</label>
                                        <input type="email" name="email" id="email" class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Company Number:</label>
                                        <input type="text" name="company_number" id="company_number" class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Name of Own Doctor:</label>
                                        <input type="text" name="doctor_name" id="doctor_name" class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Address of Own Doctor:</label>
                                        <textarea name="doctor_address" id="doctor_address" class="form-input w-full py-2 px-3 h-20 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- 2. CURRENT WORKING -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">2. CURRENT WORKING</h4>
                                <div class="mt-2">
                                    <label class="form-label font-medium">Do you have any health related restrictions that prevent you from working night shifts?</label>
                                    <div class="flex gap-4 mt-2">
                                        <div class="flex items-center">
                                            <input type="radio" name="night_shift_restrictions" id="night_shift_restrictions_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                            <label for="night_shift_restrictions_yes" class="ms-2">Yes</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" name="night_shift_restrictions" id="night_shift_restrictions_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                            <label for="night_shift_restrictions_no" class="ms-2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- 2.1 CURRENT WORKING -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">2.1 CURRENT WORKING</h4>
                                <p class="text-sm mt-2">Have you ever been seen by the NHS as:</p>
                                <div class="overflow-x-auto mt-2">
                                    <table class="min-w-full border border-gray-200 dark:border-gray-700">
                                        <thead>
                                            <tr class="bg-gray-50 dark:bg-gray-800">
                                                <th class="px-4 py-2 text-left border border-gray-200 dark:border-gray-700"></th>
                                                <th class="px-4 py-2 text-center border border-gray-200 dark:border-gray-700">Yes</th>
                                                <th class="px-4 py-2 text-center border border-gray-200 dark:border-gray-700">No</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $nhs_criteria = [
                                                    'Student Nurse',
                                                    'Healthcare Assistant',
                                                    'Nurse or the above',
                                                ];
                                            @endphp
                                            @foreach($nhs_criteria as $criterion)
                                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                                    <td class="px-4 py-2 border border-gray-200 dark:border-gray-700">{{ $criterion }}</td>
                                                    <td class="px-4 py-2 text-center border border-gray-200 dark:border-gray-700">
                                                        <input type="radio" name="nhs_{{ strtolower(str_replace(' ', '_', $criterion)) }}" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                                    </td>
                                                    <td class="px-4 py-2 text-center border border-gray-200 dark:border-gray-700">
                                                        <input type="radio" name="nhs_{{ strtolower(str_replace(' ', '_', $criterion)) }}" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- 2.2 CURRENT WORKING -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">2.2 CURRENT WORKING</h4>
                                <p class="text-sm mt-2">Have you in the last 5 years had a high risk of TB infection (countries)? If necessary please reference the DEPARTMENT OF HEALTH Green Book for an updated list of high risk countries.</p>
                                <div class="flex gap-4 mt-2">
                                    <div class="flex items-center">
                                        <input type="radio" name="tb_risk" id="tb_risk_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="tb_risk_yes" class="ms-2">Yes</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="tb_risk" id="tb_risk_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="tb_risk_no" class="ms-2">No</label>
                                    </div>
                                </div>
                                <p class="text-sm mt-2">Have you ever been diagnosed with TB?</p>
                                <div class="flex gap-4 mt-2">
                                    <div class="flex items-center">
                                        <input type="radio" name="tb_diagnosis" id="tb_diagnosis_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="tb_diagnosis_yes" class="ms-2">Yes</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="tb_diagnosis" id="tb_diagnosis_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="tb_diagnosis_no" class="ms-2">No</label>
                                    </div>
                                </div>
                                <p class="text-sm mt-2">Have you been in contact with anyone with TB in the last 6 months?</p>
                                <div class="flex gap-4 mt-2">
                                    <div class="flex items-center">
                                        <input type="radio" name="tb_contact" id="tb_contact_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="tb_contact_yes" class="ms-2">Yes</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="tb_contact" id="tb_contact_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="tb_contact_no" class="ms-2">No</label>
                                    </div>
                                </div>
                                <p class="text-sm mt-2">In the past 12 months, have you had a cough that has persisted for more than 3 weeks?</p>
                                <div class="flex gap-4 mt-2">
                                    <div class="flex items-center">
                                        <input type="radio" name="persistent_cough" id="persistent_cough_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="persistent_cough_yes" class="ms-2">Yes</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="persistent_cough" id="persistent_cough_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="persistent_cough_no" class="ms-2">No</label>
                                    </div>
                                </div>
                                <p class="text-sm mt-2">In the past 12 months, have you had an unexplained weight loss or fever?</p>
                                <div class="flex gap-4 mt-2">
                                    <div class="flex items-center">
                                        <input type="radio" name="weight_loss_fever" id="weight_loss_fever_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="weight_loss_fever_yes" class="ms-2">Yes</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="weight_loss_fever" id="weight_loss_fever_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="weight_loss_fever_no" class="ms-2">No</label>
                                    </div>
                                </div>
                                <p class="text-sm mt-2">Have you had a BCG vaccination in relation to Tuberculosis?</p>
                                <div class="flex gap-4 mt-2">
                                    <div class="flex items-center">
                                        <input type="radio" name="bcg_vaccination" id="bcg_vaccination_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="bcg_vaccination_yes" class="ms-2">Yes</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="bcg_vaccination" id="bcg_vaccination_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="bcg_vaccination_no" class="ms-2">No</label>
                                    </div>
                                </div>
                            </div>

                            <!-- 3. THERAPEUTIC MANAGEMENT OF VIOLENCE AND AGGRESSION (TIVA) -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">3. THERAPEUTIC MANAGEMENT OF VIOLENCE AND AGGRESSION (TIVA)</h4>
                                <p class="text-sm mt-2">Mental Health Care relates to patient care in the areas of mental health, learning disability and personality disorder. It relates to staff and service users. In this role staff are trained in techniques to manage violence, aggression, and challenging behaviour.</p>
                                <p class="text-sm mt-2">TIVA comprises a number of elements which include physical, breakaway and intervention training. This involves breakaway training which teaches staff how to safely break away from a potentially threatening situation by using a skill set of safe breakaway techniques. It also includes team intervention training which teaches staff how to safely hold a patient using a fully engaged grip technique. This is used as a last resort when all other de-escalation techniques have been exhausted.</p>
                                <p class="text-sm mt-2">Do you have any back problems or musculo-skeletal problems which will cause difficulty with bending, lifting or standing for long periods of time?</p>
                                <div class="flex gap-4 mt-2">
                                    <div class="flex items-center">
                                        <input type="radio" name="musculoskeletal_problems" id="musculoskeletal_problems_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="musculoskeletal_problems_yes" class="ms-2">Yes</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="musculoskeletal_problems" id="musculoskeletal_problems_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="musculoskeletal_problems_no" class="ms-2">No</label>
                                    </div>
                                </div>
                                <p class="text-sm mt-2">Do you have any health restrictions or physical constraints that would prevent me from taking part in Breakaway/Physical Intervention/Restraint training?</p>
                                <div class="flex gap-4 mt-2">
                                    <div class="flex items-center">
                                        <input type="radio" name="physical_restrictions" id="physical_restrictions_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="physical_restrictions_yes" class="ms-2">Yes</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="physical_restrictions" id="physical_restrictions_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="physical_restrictions_no" class="ms-2">No</label>
                                    </div>
                                </div>
                            </div>

                            <!-- 4. MEDICAL HISTORY -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">4. MEDICAL HISTORY</h4>
                                <p class="text-sm mt-2">Have you ever suffered from Fits, Faints, Blackouts?</p>
                                <div class="flex gap-4 mt-2">
                                    <div class="flex items-center">
                                        <input type="radio" name="fits_faints" id="fits_faints_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="fits_faints_yes" class="ms-2">Yes</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="fits_faints" id="fits_faints_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="fits_faints_no" class="ms-2">No</label>
                                    </div>
                                </div>
                                <p class="text-sm mt-2">Do you suffer from any allergies (e.g. skin allergies, lotions, latex or other gloves)?</p>
                                <div class="flex gap-4 mt-2">
                                    <div class="flex items-center">
                                        <input type="radio" name="allergies" id="allergies_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="allergies_yes" class="ms-2">Yes</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="allergies" id="allergies_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="allergies_no" class="ms-2">No</label>
                                    </div>
                                </div>
                                <p class="text-sm mt-2">Are you on any treatment, injections, tablets or medicines that affect your performance in this role?</p>
                                <div class="flex gap-4 mt-2">
                                    <div class="flex items-center">
                                        <input type="radio" name="medication" id="medication_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="medication_yes" class="ms-2">Yes</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="medication" id="medication_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="medication_no" class="ms-2">No</label>
                                    </div>
                                </div>
                                <p class="text-sm mt-2">Have you ever had a positive test for blood borne viruses that could be transmitted in a contaminated incident (e.g. HIV, Hepatitis B and Hepatitis C)?</p>
                                <div class="flex gap-4 mt-2">
                                    <div class="flex items-center">
                                        <input type="radio" name="blood_borne_viruses" id="blood_borne_viruses_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="blood_borne_viruses_yes" class="ms-2">Yes</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="blood_borne_viruses" id="blood_borne_viruses_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="blood_borne_viruses_no" class="ms-2">No</label>
                                    </div>
                                </div>
                            </div>

                            <!-- 5. ANY OTHER HEALTH ISSUES WHICH MAY AFFECT YOUR WORK? -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">5. ANY OTHER HEALTH ISSUES WHICH MAY AFFECT YOUR WORK?</h4>
                                <div class="mt-2">
                                    <label class="form-label font-medium">Details:</label>
                                    <textarea name="other_health_issues" id="other_health_issues" class="form-input w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0"></textarea>
                                </div>
                            </div>

                            <!-- 6. WORK ADJUSTMENTS -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">6. WORK ADJUSTMENTS</h4>
                                <p class="text-sm mt-2">Do you require any adjustments to the tasks outlined in the job description because of any medical condition or disability?</p>
                                <div class="flex gap-4 mt-2">
                                    <div class="flex items-center">
                                        <input type="radio" name="work_adjustments" id="work_adjustments_yes" value="Yes" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="work_adjustments_yes" class="ms-2">Yes</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" name="work_adjustments" id="work_adjustments_no" value="No" class="form-radio border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600">
                                        <label for="work_adjustments_no" class="ms-2">No</label>
                                    </div>
                                </div>
                            </div>

                            <!-- 7. EMPLOYEE DECLARATION & CONSENT -->
                            <div class="grid grid-cols-1 mt-5">
                                <h4 class="text-md font-semibold">7. EMPLOYEE DECLARATION & CONSENT</h4>
                                <p class="text-sm mt-2">I declare to the best of my knowledge the information given in this form is true and accurate. I understand that I must prevent myself carrying out my duties as set out in the job description if I am aware that my health condition may result in my employment being terminated.</p>
                                <p class="text-sm mt-2">I understand that I am required to complete a full medical disclosure that may be notified to the outcome of the Work Health Assessment. I understand that this information may be shared with my manager, HR department, and occupational health provider to ensure my safety and wellbeing at work.</p>
                                <p class="text-sm mt-2">By submitting this form, you consent to us processing your personal data in line with the General Data Protection Regulation 2018. Accordingly, we will process the information you provide in this form to manage your employment contract, comply with legal obligations, monitor health and safety, and protect your vital interests.</p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">
                                    <div>
                                        <label class="form-label font-medium">Signature:</label>
                                        <input type="text" name="signature" id="signature" class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                    <div>
                                        <label class="form-label font-medium">Date:</label>
                                        <input type="date" name="declaration_date" id="declaration_date" value="2025-04-22" class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="py-2 px-5 inline-flex items-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md mt-5">
                                Submit Form
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- End Content -->
        </div>
    </div>


</x-app-layout>
<script src="{{ asset('js/medical_self_assessment_form.js') }}"></script>
