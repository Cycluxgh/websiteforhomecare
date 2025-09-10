<x-app-layout>

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Update Job</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li
                        class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white">
                        <a href="/">Website-For-Homecare</a></li>
                    <li
                        class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="uil uil-angle-right-b"></i></li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white"
                        aria-current="page">Update Job</li>
                </ul>
            </div>
            <div class="grid grid-cols-1 mt-6">
                <div
                    class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                    <div class="p-6 relative rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
                        <form id="editJobPostingForm" method="POST"
                            action="{{ route('admin.job_postings.update', $jobPosting->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                                <div>
                                    <label class="form-label font-medium">Job Title : <span
                                            class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                                        <input type="text"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            placeholder="Job Title" id="job_title" name="job_title"
                                            value="{{ $jobPosting->job_title ?? '' }}" required>
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
                                            <option value="Clinical/Medical" {{ $jobPosting->job_category == 'Clinical/Medical' ? 'selected' : '' }}>Clinical/Medical</option>
                                            <option value="Caregiver" {{ $jobPosting->job_category == 'Caregiver' ? 'selected' : '' }}>Caregiver</option>
                                            <option value="Administrative Role" {{ $jobPosting->job_category == 'Administrative Role' ? 'selected' : '' }}>Administrative Role
                                            </option>
                                            <option value="Support Services" {{ $jobPosting->job_category == 'Support Services' ? 'selected' : '' }}>Support Services</option>
                                            <option value="Management/Leadership Roles" {{ $jobPosting->job_category == 'Management/Leadership Roles' ? 'selected' : '' }}>
                                                Management/Leadership Roles</option>
                                            <option value="Sales and Marketing" {{ $jobPosting->job_category == 'Sales and Marketing' ? 'selected' : '' }}>Sales and Marketing
                                            </option>
                                            <option value="Technology and IT Support" {{ $jobPosting->job_category == 'Technology and IT Support' ? 'selected' : '' }}>Technology and IT
                                                Support</option>
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
                                            <option value="full-time" {{ $jobPosting->employment_type == 'full-time' ? 'selected' : '' }}>Full-time</option>
                                            <option value="part-time" {{ $jobPosting->employment_type == 'part-time' ? 'selected' : '' }}>Part-time</option>
                                            <option value="contract" {{ $jobPosting->employment_type == 'contract' ? 'selected' : '' }}>Contract</option>
                                            <option value="temporary" {{ $jobPosting->employment_type == 'temporary' ? 'selected' : '' }}>Temporary</option>
                                        </select>
                                    </div>
                                    <span class="text-red-500 text-sm hidden" id="employment_type_error"></span>
                                </div>

                                <div>
                                    <label for="status" class="form-label font-medium">Status:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="info" class="size-4 absolute top-3 start-4"></i>
                                        <select name="status" id="status"
                                            class=" ps-12 form-select form-input w-full py-2 px-2 pe-6 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0">
                                            <option value="open" {{ $jobPosting->status == 'open' ? 'selected' : '' }}>
                                                open</option>
                                            <option value="closed" {{ $jobPosting->status == 'closed' ? 'selected' : '' }}>closed</option>
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
                                            id="start_date" name="start_date"
                                            value="{{ $jobPosting->start_date ? $jobPosting->start_date->format('Y-m-d') : '' }}">
                                    </div>
                                    <span class="text-red-500 text-sm hidden" id="start_date_error"></span>
                                </div>
                                <div>
                                    <label class="form-label font-medium">End Date : </label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <input type="date"
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                                            id="end_date" name="end_date"
                                            value="{{ $jobPosting->end_date ? $jobPosting->end_date->format('Y-m-d') : '' }}">
                                    </div>
                                    <span class="text-red-500 text-sm hidden" id="end_date_error"></span>
                                </div>
                                <div class="col-span-full">
                                    <div class="flex items-center">
                                        <input type="checkbox"
                                            class="form-checkbox rounded border-gray-200 dark:bg-slate-900 dark:border-gray-800 focus:ring-blue-600"
                                            id="is_active" name="is_active" value="1" {{ $jobPosting->is_active ? 'checked' : '' }}>
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
                placeholder="Job Description">{{ $jobPosting->job_description ?? '' }}</textarea>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 mt-5">
    <div>
        <label class="form-label font-medium">Job Requirements : </label>
        <div class="form-icon relative mt-2">
            <textarea name="job_requirements" id="job_requirements"
                class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                placeholder="Job Requirements">{{ $jobPosting->job_requirements ?? '' }}</textarea>
        </div>
    </div>
</div>

                            <input type="hidden" name="updated_by" id="updated_by" value="{{ auth()->id() }}">

                            <button type="submit" id="updateBtn"
                                class="py-2 px-5 inline-flex items-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md mt-5">
                                <span id="updateBtnText">Update Job Posting</span>
                                <span id="updateBtnLoading" class="hidden ml-2">
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
    // Initialize CKEditor for job_description
    let editorJobDescription;
    ClassicEditor
        .create(document.querySelector('#job_description'))
        .then(editor => {
            editorJobDescription = editor;
        })
        .catch(error => {
            console.error(error);
        });

    // Initialize CKEditor for job_requirements
    let editorJobRequirements;
    ClassicEditor
        .create(document.querySelector('#job_requirements'))
        .then(editor => {
            editorJobRequirements = editor;
        })
        .catch(error => {
            console.error(error);
        });


    document.getElementById('editJobPostingForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const updateBtn = document.getElementById('updateBtn');
        const updateBtnText = document.getElementById('updateBtnText');
        const updateBtnLoading = document.getElementById('updateBtnLoading');

        // Update the hidden textarea with CKEditor content before submitting
        document.getElementById('job_description').value = editorJobDescription.getData();
        document.getElementById('job_requirements').value = editorJobRequirements.getData();

        // Show loading state on the button
        updateBtnText.textContent = 'Updating...';
        updateBtnLoading.classList.remove('hidden');
        updateBtn.disabled = true;

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

            // Check if response is JSON
            const contentType = response.headers.get('content-type');
            if (!contentType || !contentType.includes('application/json')) {
                const text = await response.text();
                throw new Error(`Expected JSON, got: ${text.substring(0, 100)}...`);
            }

            const data = await response.json();

            if (!response.ok) {
                // Handle validation errors with SweetAlert2
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
                    text: data.message || 'Job posting updated successfully.',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = data.redirect;
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: data.message || 'Job posting updated successfully.',
                    showConfirmButton: false,
                    timer: 1500
                });
            }

        } catch (error) {
            console.error('Error:', error);
            // Show error to user with SweetAlert2
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'An error occurred: ' + error.message,
            });
        } finally {
            // Reset button state
            updateBtnText.textContent = 'Update Job Posting';
            updateBtnLoading.classList.add('hidden');
            updateBtn.disabled = false;
        }
    });
</script>


