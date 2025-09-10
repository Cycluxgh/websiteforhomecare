<div class="xl:col-span-12 lg:col-span-12">
    <div class="relative overflow-hidden rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
        <div class="p-6 flex items-center justify-between border-b border-gray-100 dark:border-gray-800">
            <h6 class="text-lg font-semibold">My Duty Roster</h6>
        </div>

        <div class="relative overflow-x-auto block w-full max-h-[400px]" data-simplebar>
            @if (empty($slots))
                <p class="p-4 text-center text-gray-500 dark:text-gray-400">No slots found.</p>
            @else
                <table class="w-full text-start">
                    <thead class="text-base">
                        <tr>
                            <th class="text-start font-semibold text-[15px] p-4 min-w-[192px]">Service User</th>
                            <th class="text-start font-semibold text-[15px] p-4 min-w-[128px]">Day</th>
                            <th class="text-start font-semibold text-[15px] p-4 min-w-[128px]">Start Time</th>
                            <th class="text-start font-semibold text-[15px] p-4 min-w-[128px]">End Time</th>
                            <th class="text-start font-semibold text-[15px] p-4 min-w-[128px]">View Profile</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slots as $slot)
                            <tr>
                                <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                    <span class="text-slate-400">{{ $slot['patient_name'] }}</span>
                                </td>
                                <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                    <span class="text-slate-400">{{ $slot['day_of_week'] }}</span>
                                </td>
                                <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                    <span class="text-slate-400">{{ $slot['start_time'] }}</span>
                                </td>
                                <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                    <span class="text-slate-400">{{ $slot['end_time'] }}</span>
                                </td>
                                <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                    <a href="{{ route('patients.show', $slot['patient_id']) }}"
                                class="py-1 px-2 inline-block font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md ms-2"
                                title="View">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
