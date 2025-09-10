<x-app-layout>

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Upload Supported Documents</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white"><a href="/">Website-For-Homecare</a></li>
                    <li class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="uil uil-angle-right-b"></i></li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white" aria-current="page">Upload Supported Documents</li>
                </ul>
            </div>
            <div class="grid grid-cols-1 mt-6">
                <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                    <div class="p-6 relative rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
                        <form id="employeeDocumentsForm" method="POST" action="{{ route('employee_documents.store') }}" enctype="multipart/form-data">
    @csrf

    <!-- Hidden user_id field -->
    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->id() }}">

    <!-- Title -->
    <div class="grid grid-cols-1 mt-5">
        <h3 class="text-lg font-semibold">Employee Documents Upload</h3>
    </div>

    <!-- Documents Upload -->
    <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mt-5">
        @php
            $documents = [
                'passport' => 'Passport',
                'english_qualification' => 'English Qualification',
                'certificate_of_qualification' => 'Certificate of Qualification',
                'overseas_police_certificate' => 'Overseas Police Certificate',
                'overseas_tb_test' => 'Overseas TB Test',
                'covid_vaccination_certificate' => 'COVID Vaccination Certificate',
                'current_dbs' => 'Current DBS',
                'care_training_certificates' => 'Care Training Certificates',
            ];
        @endphp

        @foreach($documents as $field => $label)
        <div>
            <label class="form-label font-medium">{{ $label }}:</label>
            <input type="file" name="{{ $field }}" id="{{ $field }}"
                class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
        </div>
        @endforeach
    </div>

    <!-- Submit Button -->
    <button type="submit" class="py-2 px-5 inline-flex items-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md mt-5">
        Upload Documents
    </button>
</form>

                    </div>
                </div>
            </div>

            <!-- End Content -->
        </div>
    </div>


</x-app-layout>
<script src="{{ asset('js/employee_documents_form.js') }}"></script>
