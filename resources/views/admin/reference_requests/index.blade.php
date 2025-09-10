<x-app-layout>

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Job Postings</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-indigo-600 dark:hover:text-white"><a href="/">Website-For-Homecare</a></li>
                    <li class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="uil uil-angle-right-b"></i></li>
                    <li class="inline-block capitalize text-[14px] font-bold text-indigo-600 dark:text-white" aria-current="page">Job Postings</li>
                </ul>
            </div>

            <div class="grid grid-cols-1 mt-6">
                <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                    <table class="w-full text-start">
                        <thead class="text-base">
                            <tr>
                    <th class="text-start p-4 min-w-[150px]">Submitted By</th>
                    <th class="text-start p-4 min-w-[150px]">Applicant Name</th>
                    <th class="text-start p-4 min-w-[150px]">Referee Name</th>
                    <th class="text-start p-4 min-w-[150px]">Referee Email</th>
                    <th class="text-start p-4 min-w-[150px]">Referee Company</th>
                    <th class="text-start p-4 min-w-[150px]">Referee Job Title</th>
                    <th class="text-center p-4 min-w-[150px]">Requested At</th>
                    <th class="text-end p-4 min-w-[180px]"></th>
                </tr>
                        </thead>
                        <tbody>
                @if ($referenceRequests->isEmpty())
                    <tr>
                        <td class="px-4 py-8 border-t border-gray-100 dark:border-gray-800" colspan="8">
                            <div class="text-center text-gray-500 dark:text-gray-400">
                                No reference requests found.
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach ($referenceRequests as $request)
                        <tr>
                            <th class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                {{ $request->user->name }}
                            </th>
                            <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">{{ $request->applicant_full_name }}</td>
                            <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">{{ $request->referee_first_name }} {{ $request->referee_last_name }}</td>
                            <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">{{ $request->referee_email }}</td>
                            <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">{{ $request->referee_company }}</td>
                            <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">{{ $request->referee_job_title }}</td>
                            <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                {{ \Carbon\Carbon::parse($request->created_at)->format('jS F Y h:i A') }}
                            </td>
                            <td class="text-end border-t border-gray-100 dark:border-gray-800 p-4">
                                <a href="{{ route('admin.reference_requests.show', \Illuminate\Support\Facades\Crypt::encrypt($request->id)) }}" class="py-1 px-2 inline-block font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md" title="View Details">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                {{-- <a href="{{ route('admin.reference_requests.edit', \Illuminate\Support\Facades\Crypt::encrypt($request->id)) }}" class="py-1 px-2 inline-block font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-blue-600/5 hover:bg-blue-600 border-red-600/10 hover:border-red-600 text-indigo-600 hover:text-white rounded-md ms-2" title="Edit Reference Request">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.reference_requests.destroy', \Illuminate\Support\Facades\Crypt::encrypt($request->id)) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="cursor: pointer;" class="py-1 px-2 inline-block font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-blue-600/5 hover:bg-blue-600 border-red-600/10 hover:border-red-600 text-red-600 hover:text-white rounded-md ms-2" title="Delete Reference Request">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
                    </table>
                </div>

                <div class="mt-5 flex items-center justify-between">
                    <div>
                        @if ($referenceRequests->onFirstPage())
                            <span class="size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 border-gray-100 dark:border-gray-700 text-slate-400 rounded-full cursor-not-allowed opacity-50"><i class="mdi mdi-arrow-left"></i></span>
                        @else
                            <a href="{{ $referenceRequests->previousPageUrl() }}" class="size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 border-gray-100 dark:border-gray-700 text-slate-400 hover:text-slate-900 dark:hover:text-white rounded-full"><i class="mdi mdi-arrow-left"></i></a>
                        @endif

                        @if ($referenceRequests->hasMorePages())
                            <a href="{{ $referenceRequests->nextPageUrl() }}" class="ms-2 size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 border-gray-100 dark:border-gray-700 text-slate-400 hover:text-slate-900 dark:hover:text-white rounded-full"><i class="mdi mdi-arrow-right"></i></a>
                        @else
                            <span class="ms-2 size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 border-gray-100 dark:border-gray-700 text-slate-400 rounded-full cursor-not-allowed opacity-50"><i class="mdi mdi-arrow-right"></i></span>
                        @endif
                    </div>

                    <span class="text-slate-400">Showing {{ $referenceRequests->firstItem() }} - {{ $referenceRequests->lastItem() }} out of {{ $referenceRequests->total() }}</span>
                </div>
            </div>
            <!-- End Content -->
        </div>
    </div>


</x-app-layout>
