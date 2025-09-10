<x-app-layout>
    <div class="layout-specing">
        <div class="md:flex justify-between items-center">
            <h5 class="text-lg font-semibold">Service User</h5>
            <a href="{{ route('patients.create') }}"
               class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md">
                Add Service User
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="mt-6">
            <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                <table class="w-full text-start">
                    <thead class="text-base">
                        <tr>
                            <th class="text-start p-4 min-w-[150px]">Name</th>
                            <th class="text-start p-4 min-w-[150px]">Address</th>
                            <th class="text-start p-4 min-w-[150px]">Mobile Phone</th>
                            <th class="text-start p-4 min-w-[150px]">Date of Birth</th>
                            <th class="text-center p-4 min-w-[100px]">Status</th>
                            <th class="text-end p-4 min-w-[350px]">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($patients->isEmpty())
                            <tr>
                                <td class="px-4 py-8 border-t border-gray-100 dark:border-gray-800" colspan="5">
                                    <div class="text-center text-gray-500 dark:text-gray-400">
                                        No patients found.
                                    </div>
                                </td>
                            </tr>
                        @else
                            @foreach ($patients as $patient)
                                <tr>
                                    <th class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                        {{ $patient->name }}
                                    </th>
                                    <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                        {{ $patient->address }}
                                    </td>
                                    <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                        {{ $patient->mobile_phone_number }}
                                    </td>
                                    <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                        {{ \Carbon\Carbon::parse($patient->date_of_birth)->format('jS F Y') }}
                                    </td>
                                    <td class="text-center border-t border-gray-100 dark:border-gray-800 p-4">
                                        <span class="bg-green-600/10 dark:bg-green-600/20 text-green-600 text-[12px] font-bold px-2.5 py-0.5 rounded h-5 ms-1">Active</span>
                                    </td>
                                    <td class="text-end border-t border-gray-100 dark:border-gray-800 p-4">
                                        @php
                                            $firstCategory = \App\Models\ProfileCategory::first();
                                        @endphp
                                        @if ($patient->profile && $firstCategory)
                                            <a href="{{ route('patient-profiles.questions', ['patientProfileId' => $patient->profile->id, 'categoryId' => $firstCategory->id]) }}"
                                               class="py-1 px-2 inline-block font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md"
                                               title="Questions">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </a>
                                        @else
                                            <span class="py-1 px-2 inline-block font-semibold tracking-wide border align-middle text-sm text-center bg-gray-600 text-white rounded-md"
                                                  title="No categories or profile available">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </span>
                                        @endif
                                        <a href="{{ route('patients.show', $patient->id) }}"
                                           class="py-1 px-2 inline-block font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md ms-2"
                                           title="View">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('patients.edit', $patient->id) }}"
                                           class="py-1 px-2 inline-block font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-blue-600/5 hover:bg-blue-600 border-red-600/10 hover:border-red-600 text-indigo-600 hover:text-white rounded-md ms-2"
                                           title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="cursor: pointer;"
                                                    class="py-1 px-2 inline-block font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-blue-600/5 hover:bg-blue-600 border-red-600/10 hover:border-red-600 text-red-600 hover:text-white rounded-md ms-2"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this patient?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="mt-5 flex items-center justify-between">
                    <div>
                        @if ($patients->onFirstPage())
                            <span class="size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 border-gray-100 dark:border-gray-700 text-slate-400 rounded-full cursor-not-allowed opacity-50"><i class="mdi mdi-arrow-left"></i></span>
                        @else
                            <a href="{{ $patients->previousPageUrl() }}" class="size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 border-gray-100 dark:border-gray-700 text-slate-400 hover:text-slate-900 dark:hover:text-white rounded-full"><i class="mdi mdi-arrow-left"></i></a>
                        @endif

                        @if ($patients->hasMorePages())
                            <a href="{{ $patients->nextPageUrl() }}" class="ms-2 size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 border-gray-100 dark:border-gray-700 text-slate-400 hover:text-slate-900 dark:hover:text-white rounded-full"><i class="mdi mdi-arrow-right"></i></a>
                        @else
                            <span class="ms-2 size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 border-gray-100 dark:border-gray-700 text-slate-400 rounded-full cursor-not-allowed opacity-50"><i class="mdi mdi-arrow-right"></i></span>
                        @endif
                    </div>

                    <span class="text-slate-400">Showing {{ $patients->firstItem() }} - {{ $patients->lastItem() }} out of {{ $patients->total() }}</span>
                </div>
        </div>
    </div>
</x-app-layout>
