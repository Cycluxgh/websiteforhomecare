<x-app-layout>

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Supported Documents</h5>

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
                        aria-current="page">Supported Documents</li>
                </ul>
            </div>

            <div class="grid grid-cols-1 mt-6">
                <div
                    class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                    <table class="w-full text-start">
                        <thead class="text-base">
                            <tr>
                                <th class="text-start p-4 min-w-[150px]">Name</th>
                                <th class="text-start p-4 min-w-[100px]">Passport</th>
                                <th class="text-start p-4 min-w-[150px]">English Qualification</th>
                                <th class="text-start p-4 min-w-[150px]">Certificate of Qualification</th>
                                <th class="text-start p-4 min-w-[200px]">Overseas Police Certificate</th>
                                <th class="text-start p-4 min-w-[150px]">Overseas TB Test</th>
                                <th class="text-start p-4 min-w-[200px]">COVID Vaccination Certificate</th>
                                <th class="text-start p-4 min-w-[150px]">Current DBS</th>
                                <th class="text-start p-4 min-w-[200px]">Care Training Certificates</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($documents->isEmpty())
                                <tr>
                                    <td class="px-4 py-8 border-t border-gray-100 dark:border-gray-800" colspan="9"> {{--
                                        Adjusted colspan to 9 --}}
                                        <div class="text-center text-gray-500 dark:text-gray-400">
                                            No employee documents found.
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($documents as $document)
                                    <tr>
                                        <th class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                            {{ $document->user->name }}
                                        </th>

                                        @foreach (['passport', 'english_qualification', 'certificate_of_qualification', 'overseas_tb_test', 'covid_vaccination_certificate', 'current_dbs', 'care_training_certificates'] as $field)
                                            <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                                @if ($document->$field)
                                                    <a href="{{ asset('storage/' . $document->$field) }}" target="_blank"
                                                        class="bg-green-600/10 dark:bg-green-600/20 text-green-600 text-[12px] font-bold px-2.5 py-0.5 rounded h-5 ms-1">Yes</a>
                                                @else
                                                    <span
                                                        class="bg-blue-600/10 dark:bg-blue-600/20 text-red-600 text-[12px] font-bold px-2.5 py-0.5 rounded h-5 ms-1">No</span>
                                                @endif
                                            </td>
                                        @endforeach
                                        <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                            @if ($document->overseas_police_certificate)
                                                <span
                                                    class="bg-green-600/10 dark:bg-green-600/20 text-green-600 text-[12px] font-bold px-2.5 py-0.5 rounded h-5 ms-1">Yes</span>
                                            @else
                                                <span
                                                    class="bg-blue-600/10 dark:bg-blue-600/20 text-red-600 text-[12px] font-bold px-2.5 py-0.5 rounded h-5 ms-1">No</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="mt-5 flex items-center justify-between">
                    <div>
                        @if ($documents->onFirstPage())
                            <span
                                class="size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 border-gray-100 dark:border-gray-700 text-slate-400 rounded-full cursor-not-allowed opacity-50"><i
                                    class="mdi mdi-arrow-left"></i></span>
                        @else
                            <a href="{{ $documents->previousPageUrl() }}"
                                class="size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 border-gray-100 dark:border-gray-700 text-slate-400 hover:text-slate-900 dark:hover:text-white rounded-full"><i
                                    class="mdi mdi-arrow-left"></i></a>
                        @endif

                        @if ($documents->hasMorePages())
                            <a href="{{ $documents->nextPageUrl() }}"
                                class="ms-2 size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 border-gray-100 dark:border-gray-700 text-slate-400 hover:text-slate-900 dark:hover:text-white rounded-full"><i
                                    class="mdi mdi-arrow-right"></i></a>
                        @else
                            <span
                                class="ms-2 size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 border-gray-100 dark:border-gray-700 text-slate-400 rounded-full cursor-not-allowed opacity-50"><i
                                    class="mdi mdi-arrow-right"></i></span>
                        @endif
                    </div>

                    <span class="text-slate-400">Showing {{ $documents->firstItem() }} - {{ $documents->lastItem() }}
                        out of {{ $documents->total() }}</span>
                </div>
            </div>
            <!-- End Content -->
        </div>
    </div>


</x-app-layout>
