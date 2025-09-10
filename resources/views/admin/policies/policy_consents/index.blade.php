<x-app-layout>

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Policy Consents</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li
                        class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white">
                        <a href="/">Website-For-Homecare</a></li>
                    <li
                        class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="uil uil-angle-right-b"></i></li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white"
                        aria-current="page">Policy Consents</li>
                </ul>
            </div>

            <div class="grid grid-cols-1 mt-6">
                <div
                    class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                    <table class="w-full text-start">
                        <thead>
                            <tr>
                                <th class="text-start p-4 min-w-[150px]">Employee Name</th>
                                <th class="text-start p-4 min-w-[150px]">Policy Title</th>
                                <th class="text-start p-4 min-w-[150px]">Consent Status</th>
                                <th class="text-start p-4 min-w-[150px]">Date of Consent</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($policyConsents->isEmpty())
                                <tr>
                                    <td class="px-4 py-8 border-t border-gray-100 dark:border-gray-800" colspan="4">
                                        <div class="text-center text-gray-500 dark:text-gray-400">
                                            No employee policy consent found.
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($policyConsents as $consent)
                                    <tr>
                                        <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                            {{ $consent->user?->name ?? 'Unknown User' }}
                                        </td>
                                        <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                            {{ $consent->policy?->title ?? 'Unknown Policy' }}
                                        </td>
                                        <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                            <strong>{{ $consent->user?->name ?? 'Unknown User' }}</strong> has read and acknowledged this policy.
                                        </td>
                                        <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                            {{ $consent->consented_at?->format('M d, Y H:i') ?? 'N/A' }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="mt-5 flex items-center justify-between">
                    <div>
                        @if ($policyConsents->onFirstPage())
                            <span class="size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 border-gray-100 dark:border-gray-700 text-slate-400 rounded-full cursor-not-allowed opacity-50"><i class="mdi mdi-arrow-left"></i></span>
                        @else
                            <a href="{{ $policyConsents->previousPageUrl() }}" class="size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 border-gray-100 dark:border-gray-700 text-slate-400 hover:text-slate-900 dark:hover:text-white rounded-full"><i class="mdi mdi-arrow-left"></i></a>
                        @endif

                        @if ($policyConsents->hasMorePages())
                            <a href="{{ $policyConsents->nextPageUrl() }}" class="ms-2 size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 border-gray-100 dark:border-gray-700 text-slate-400 hover:text-slate-900 dark:hover:text-white rounded-full"><i class="mdi mdi-arrow-right"></i></a>
                        @else
                            <span class="ms-2 size-8 inline-flex items-center justify-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-100 dark:bg-gray-700 border-gray-100 dark:border-gray-700 text-slate-400 rounded-full cursor-not-allowed opacity-50"><i class="mdi mdi-arrow-right"></i></span>
                        @endif
                    </div>

                    <span class="text-slate-400">Showing {{ $policyConsents->firstItem() }} - {{ $policyConsents->lastItem() }} out of {{ $policyConsents->total() }}</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
