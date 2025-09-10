<x-app-layout>

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Create Job</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li
                        class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white">
                        <a href="/">Website-For-Homecare</a></li>
                    <li
                        class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="uil uil-angle-right-b"></i></li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white"
                        aria-current="page">Create Job</li>
                </ul>
            </div>
            <div class="grid grid-cols-1 mt-6">
                <div
                    class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                    <div class="p-6 relative rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
                        <form id="jobPostingForm" method="POST" action="{{ route('admin.job_postings.store') }}">
                            @csrf

                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                                <div>
                                    <label class="form-label font-medium">Job Title : <span
                                            class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                        <input type="text"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            placeholder="Job Title" id="job_title" name="job_title" required>
                                    </div>
                                    <span class="text-red-500 text-sm hidden" id="job_title_error"></span>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Job Category : <span
                                            class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="folder" class="size-4 absolute top-3 start-4"></i>
                                        <select
                                            class="form-select ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            id="job_category" name="job_category" required>
                                            <option value="">Select a category</option>
                                            <option value="Clinical/Medical">Clinical/Medical</option>
                                            <option value="Caregiver">Caregiver</option>
                                            <option value="Administrative Role">Administrative Role</option>
                                            <option value="Support Services">Support Services</option>
                                            <option value="Management/Leadership Roles">Management/Leadership Roles
                                            </option>
                                            <option value="Sales and Marketing">Sales and Marketing</option>
                                            <option value="Technology and IT Support">Technology and IT Support</option>
                                        </select>
                                    </div>
                                    <span class="text-red-500 text-sm hidden" id="job_category_error"></span>
                                </div>
                                <div>
                                    <label class="form-label font-medium">Employment Type : <span
                                            class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="users" class="size-4 absolute top-3 start-4"></i>
                                        <select
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            id="employment_type" name="employment_type" required>
                                            <option value="">Select Type</option>
                                            <option value="full-time">Full-time</option>
                                            <option value="part-time">Part-time</option>
                                            <option value="contract">Contract</option>
                                            <option value="temporary">Temporary</option>
                                        </select>
                                    </div>
                                    <span class="text-red-500 text-sm hidden" id="employment_type_error"></span>
                                </div>
                                <div>
                                        <label for="status" class="form-label font-medium">Status:</label>
                                        <div class="form-icon relative mt-2">
                                        <i data-feather="info" class="size-4 absolute top-3 start-4"></i>
                                        <select name="status" id="status" class="  ps-12 form-select form-input w-full py-2 px-2 pe-6 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0">
                                            <option value="open" @if(old('status') == 'open') selected @endif>Open</option>
                                            <option value="closed" @if(old('status') == 'closed') selected @endif>Closed</option>
                                        </select>
                                    </div>
                                        @error('status')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>


                                <div>
                                    <label class="form-label font-medium">Start Date : </label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <input type="date"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            id="start_date" name="start_date">
                                    </div>
                                    <span class="text-red-500 text-sm hidden" id="start_date_error"></span>
                                </div>
                                <div>
                                    <label class="form-label font-medium">End Date : </label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <input type="date"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            id="end_date" name="end_date">
                                    </div>
                                    <span class="text-red-500 text-sm hidden" id="end_date_error"></span>
                                </div>
                                <div class="col-span-full">
                                    <div class="flex items-center">
                                        <input type="checkbox"
                                            class="form-checkbox rounded border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600"
                                            id="is_active" name="is_active" value="1">
                                        <label class="ms-2 form-label font-medium">Is Active</label>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 mt-5">
                                <div>
                                    <label class="form-label font-medium">Job Description : </label>
                                    <div class="form-icon relative mt-2">
                                        <textarea name="job_description" id="job_description"
                                            class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            placeholder="Job Description"></textarea>
                                    </div>
                                    <div id="job_description_error" class="text-red-600 text-sm mt-1 hidden"></div>
                                </div>

                            </div>

                            <div class="grid grid-cols-1 mt-5">
                                <div>
                                    <label class="form-label font-medium">Job Requirements : </label>
                                    <div class="form-icon relative mt-2">
                                        <textarea name="job_requirements" id="job_requirements"
                                            class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            placeholder="Job Requirements"></textarea>
                                    </div>
                                    <div id="job_requirements_error" class="text-red-600 text-sm mt-1 hidden"></div>
                                </div>
                            </div>

                            <input type="hidden" name="created_by" id="created_by" value="{{ auth()->id() }}">

                            <button type="submit" id="submitBtn"
                                class="py-2 px-5 inline-flex items-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md mt-5">
                                <span id="btnText">Save Job Posting</span>
                                <span id="btnLoading" class="hidden ml-2">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                        </form>


                    </div>
                </div>
            </div>

            <!-- End Content -->
        </div>
    </div>


</x-app-layout>
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>

<script>
    let jobDescriptionEditor;
    let jobRequirementsEditor;

    ClassicEditor
        .create(document.querySelector('#job_description'))
        .then(editor => {
            jobDescriptionEditor = editor;
            console.log('Job Description CKEditor5 was initialized', editor);
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#job_requirements'))
        .then(editor => {
            jobRequirementsEditor = editor;
            console.log('Job Requirements CKEditor5 was initialized', editor);
        })
        .catch(error => {
            console.error(error);
        });

    document.getElementById('jobPostingForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        // Update the hidden text areas with CKEditor content before submitting
        document.getElementById('job_description').value = jobDescriptionEditor.getData();
        document.getElementById('job_requirements').value = jobRequirementsEditor.getData();

        const submitBtn = document.getElementById('submitBtn');
        const btnText = document.getElementById('btnText');
        const btnLoading = document.getElementById('btnLoading');

        // Show loading state on the button
        btnText.textContent = 'Saving...';
        btnLoading.classList.remove('hidden');
        submitBtn.disabled = true;

        // Clear previous error messages
        document.getElementById('job_description_error').classList.add('hidden');
        document.getElementById('job_requirements_error').classList.add('hidden');


        try {
            const formData = new FormData(this);
            const response = await fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            const contentType = response.headers.get('content-type');
            if (!contentType || !contentType.includes('application/json')) {
                const text = await response.text();
                throw new Error(`Expected JSON, got: ${text.substring(0, 100)}...`);
            }

            const data = await response.json();

            if (!response.ok) {
                if (data.errors) {
                    let errorMessages = '';
                    Object.keys(data.errors).forEach(field => {
                        const errorElement = document.getElementById(`${field}_error`);
                        if (errorElement) {
                            errorElement.textContent = data.errors[field][0];
                            errorElement.classList.remove('hidden');
                        }
                        errorMessages += `<p>${field}: ${data.errors[field].join('<br>')}</p>`;
                    });
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: errorMessages,
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Request failed',
                    });
                }
                return;
            }

            if (data.redirect) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: data.message || 'Job posting saved successfully.',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = data.redirect;
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: data.message || 'Job posting saved successfully.',
                    showConfirmButton: false,
                    timer: 1500
                });
            }

        } catch (error) {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'An error occurred: ' + error.message,
            });
        } finally {
            btnText.textContent = 'Save Job Posting';
            btnLoading.classList.add('hidden');
            submitBtn.disabled = false;
        }
    });
</script>
