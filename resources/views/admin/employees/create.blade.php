<x-app-layout>

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Employees</h5>

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
                        aria-current="page">Employees</li>
                </ul>
            </div>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Validation Error!</strong>
                    <ul class="mt-3 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="grid grid-cols-1 mt-6">
                <div
                    class="p-6 relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                    <form action="{{ route('saveEmployee') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <h3 class="text-lg font-semibold mb-4">Employee Account Details</h3>
    <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
        <div>
            <label class="form-label font-medium">Name : <span class="text-red-600">*</span></label>
            <div class="form-icon relative mt-2">
                <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                <input type="text" id="name" name="name" required
                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                    placeholder="Name:">
            </div>
        </div>
        <div>
            <label class="form-label font-medium">Email : <span
                    class="text-red-600">*</span></label>
            <div class="form-icon relative mt-2">
                <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                <input type="email" id="email" name="email" required
                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                    placeholder="Email:">
            </div>
        </div>
        <div>
            <label class="form-label font-medium">Profile Image :</label>
            <div class="form-icon relative mt-2">
                <i data-feather="image" class="size-4 absolute top-3 start-4"></i>
                <input type="file" id="profile_image" name="profile_image" accept="image/*"
                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
            </div>
        </div>
        <div>
            <label class="form-label font-medium">Role : <span class="text-red-600">*</span></label>
            <div class="form-icon relative mt-2">
                <i data-feather="user-check" class="size-4 absolute top-3 start-4"></i>
                <select id="role" name="role" required
                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
                    <option value="employee">Employee</option>
                </select>
            </div>
        </div>
    </div><h3 class="text-lg font-semibold mt-6 mb-4">Employee Profile Details</h3>
    <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
        <div>
            <label class="form-label font-medium">Select Job Posting : <span
                    class="text-red-600">*</span></label>
            <div class="form-icon relative mt-2">
                <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                <select id="job_posting_id" name="job_posting_id" required
                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
                    @foreach($jobPostings as $jobPosting)
                        <option value="{{ $jobPosting->id }}">{{ $jobPosting->job_title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div>
            <label class="form-label font-medium">Start Date : <span
                    class="text-red-600">*</span></label>
            <div class="form-icon relative mt-2">
                <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                <input type="date" id="start_date" name="start_date" required
                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
            </div>
        </div>
        <div>
            <label class="form-label font-medium">End Date :</label>
            <div class="form-icon relative mt-2">
                <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                <input type="date" id="end_date" name="end_date"
                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
            </div>
        </div>
        <div>
            <label class="form-label font-medium">Employee Code :</label>
            <div class="form-icon relative mt-2">
                <i data-feather="hash" class="size-4 absolute top-3 start-4"></i>
                <input type="text" id="employee_code" name="employee_code"
                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                    placeholder="Employee Code:">
            </div>
        </div>
        <div>
            <label class="form-label font-medium">Employment Type :</label>
            <div class="form-icon relative mt-2">
                <i data-feather="briefcase" class="size-4 absolute top-3 start-4"></i>
                <input type="text" id="employment_type" name="employment_type"
                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                    placeholder="Employment Type:">
            </div>
        </div>
        <div>
            <label class="form-label font-medium">Hourly Rate :</label>
            <div class="form-icon relative mt-2">
                <svg class="size-4 absolute top-3 start-4" xmlns="http://www.w3.org/2000/svg"
                    fill="#000000" width="800px" height="800px" viewBox="0 0 8 8">
                    <path
                        d="M3 0c-.62 0-1.16.26-1.5.69-.34.43-.5.99-.5 1.56 0 .69.16 1.25.25 1.75h-1.25v1h1.22c-.11.45-.37.96-1.06 1.66l-.16.13v1.22h6v-1h-4.91c.64-.73.98-1.4 1.13-2h1.78v-1h-1.72c-.08-.68-.28-1.24-.28-1.75 0-.39.11-.73.28-.94.17-.21.37-.31.72-.31.39 0 .61.11.75.25s.25.36.25.75h1c0-.58-.17-1.1-.53-1.47-.37-.37-.89-.53-1.47-.53z"
                        transform="translate(1)" />
                </svg>
                <input type="number" id="hourly_rate" name="hourly_rate" step="0.01"
                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                    placeholder="Hourly Rate:">
            </div>
        </div>

        <div class="flex items-center mt-2">
            <input type="checkbox" id="active" name="active" value="1" checked
                class="form-checkbox h-5 w-5 text-blue-600 border-gray-200 dark:border-gray-800 rounded focus:ring-0">
            <label for="active" class="form-label font-medium ms-2">Active Employee</label>
        </div>
        <div class="flex items-center mt-2">
            <input type="checkbox" id="terminated" name="terminated" value="1"
                class="form-checkbox h-5 w-5 text-blue-600 border-gray-200 dark:border-gray-800 rounded focus:ring-0">
            <label for="terminated" class="form-label font-medium ms-2">Terminated</label>
        </div>
    </div><div id="termination_details" style="display: none;"
        class="grid lg:grid-cols-2 grid-cols-1 gap-5 mt-5">
        <div>
            <label class="form-label font-medium">Termination Date :</label>
            <div class="form-icon relative mt-2">
                <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                <input type="date" id="termination_date" name="termination_date"
                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
            </div>
        </div>
        <div>
            <label class="form-label font-medium">Termination Reason :</label>
            <div class="form-icon relative mt-2">
                <i data-feather="message-circle" class="size-4 absolute top-3 start-4"></i>
                <textarea id="termination_reason" name="termination_reason"
                    class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                    placeholder="Termination Reason:"></textarea>
            </div>
        </div>
    </div><h3 class="text-lg font-semibold mt-6 mb-4">Contact Information</h3>
    <div class="grid lg:grid-cols-3 grid-cols-1 gap-5">
        <div>
            <label class="form-label font-medium">Phone Number :</label>
            <div class="form-icon relative mt-2">
                <i data-feather="phone" class="size-4 absolute top-3 start-4"></i>
                <input type="text" id="phone_number" name="phone_number"
                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                    placeholder="Phone Number:">
            </div>
        </div>
        <div class="lg:col-span-2"> {{-- This makes the address line take 2 columns --}}
            <label class="form-label font-medium">Address Line 1 :</label>
            <div class="form-icon relative mt-2">
                <i data-feather="map-pin" class="size-4 absolute top-3 start-4"></i>
                <input type="text" id="address_line_1" name="address_line_1"
                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                    placeholder="Address Line 1:">
            </div>
        </div>
        <div>
            <label class="form-label font-medium">Emergency Contact Name :</label>
            <div class="form-icon relative mt-2">
                <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                <input type="text" id="emergency_contact_name" name="emergency_contact_name"
                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                    placeholder="Emergency Contact Name:">
            </div>
        </div>
        <div>
            <label class="form-label font-medium">Emergency Contact Phone :</label>
            <div class="form-icon relative mt-2">
                <i data-feather="phone" class="size-4 absolute top-3 start-4"></i>
                <input type="text" id="emergency_contact_phone" name="emergency_contact_phone"
                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                    placeholder="Emergency Contact Phone:">
            </div>
        </div>
        <div>
            <label class="form-label font-medium">Emergency Contact Relationship :</label>
            <div class="form-icon relative mt-2">
                <i data-feather="users" class="size-4 absolute top-3 start-4"></i>
                <input type="text" id="emergency_contact_relationship"
                    name="emergency_contact_relationship"
                    class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                    placeholder="Emergency Contact Relationship:">
            </div>
        </div>
    </div><h3 class="text-lg font-semibold mt-6 mb-4">Admin Notes</h3>
    <div class="grid grid-cols-1">
        <div class="mt-5">
            <label class="form-label font-medium">Admin Notes :</label>
            <div class="form-icon relative mt-2">
                <i data-feather="message-circle" class="size-4 absolute top-3 start-4"></i>
                <textarea id="admin_notes" name="admin_notes"
                    class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                    placeholder="Admin Notes:"></textarea>
            </div>
        </div>
    </div><input type="submit" id="submit" name="send"
        class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md mt-5"
        value="Create Employee">
</form>

                    <script>
                        document.getElementById('terminated').addEventListener('change', function () {
                            var terminationDetails = document.getElementById('termination_details');
                            terminationDetails.style.display = this.checked ? 'block' : 'none';
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
