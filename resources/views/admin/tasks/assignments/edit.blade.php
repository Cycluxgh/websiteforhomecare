<x-app-layout>
    <div class="layout-specing">
        <h5 class="text-lg font-semibold mb-4">Edit Employee-Patient Assignment</h5>

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
        <div class="p-6 bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
            <form method="POST" action="{{ route('tasks.assignments.update', $assignment->id) }}">
                @csrf
                @method('PUT')
                <div class="flex flex-wrap -mx-3 mb-3">
                    <div class="w-full md:w-1/2 px-3 mb-3">
                        <label for="employee_profile_id" class="form-label font-medium">Employee</label>
                        <select name="employee_profile_id" id="employee_profile_id"
                            class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
                            <option value="">Select Employee</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_profile_id', $assignment->employee_profile_id) == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('employee_profile_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-3">
                        <label for="patient_id" class="form-label font-medium">Service User</label>
                        <select name="patient_id" id="patient_id"
                            class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
                            <option value="">Select Service User</option>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}" {{ old('patient_id', $assignment->patient_id) == $patient->id ? 'selected' : '' }}>
                                    {{ $patient->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('patient_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full px-3 mb-3">
                        <label class="form-label font-medium block mb-2">Assignment Schedule</label>
                        @php
                            $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                            $existingSlots = $assignment->slots->groupBy('day_of_week');
                            $selectedDays = $existingSlots->keys()->map(fn($day) => strtolower($day))->toArray();
                        @endphp
                        <div id="schedule-container">
                            @foreach ($daysOfWeek as $index => $day)
                                @php
                                    $dayLower = strtolower($day);
                                    $daySlots = $existingSlots->get($dayLower, collect([]));
                                    $isChecked = in_array($dayLower, $selectedDays) || in_array($dayLower, old('days_selected', []));
                                    $oldSlots = old('slots.' . $dayLower, []);
                                    $slots = !empty($oldSlots) ? $oldSlots : ($daySlots->isNotEmpty() ? $daySlots->map(fn($slot) => [
                                        'start_time' => \Carbon\Carbon::parse($slot->start_time)->format('H:i'),
                                        'end_time' => \Carbon\Carbon::parse($slot->end_time)->format('H:i'),
                                    ])->toArray() : [['start_time' => '', 'end_time' => '']]);
                                @endphp
                                <div class="mb-4 p-3 border border-gray-200 rounded-md dark:border-gray-700">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="days_selected[]" value="{{ $dayLower }}"
                                            id="day_{{ $dayLower }}"
                                            class="day-checkbox form-checkbox h-5 w-5 text-blue-600 border-gray-200 dark:border-gray-800 rounded focus:ring-0"
                                            {{ $isChecked ? 'checked' : '' }}>
                                        <span class="form-label font-semibold ms-2">{{ $day }}</span>
                                    </label>
                                    <div id="slots_for_{{ $dayLower }}" class="time-slots-container mt-2 pl-6"
                                        style="display:{{ $isChecked ? 'block' : 'none' }};">
                                        @foreach ($slots as $slotIndex => $slot)
                                            <div class="flex items-center space-x-2 mb-2 slot-row">
                                                <input type="time" name="slots[{{ $dayLower }}][{{ $slotIndex }}][start_time]"
                                                    class="form-input py-2 px-3 h-10 bg-transparent dark:bg-gray-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0 w-full md:w-1/3"
                                                    value="{{ old('slots.' . $dayLower . '.' . $slotIndex . '.start_time', $slot['start_time'] ?? '') }}">
                                                <input type="time" name="slots[{{ $dayLower }}][{{ $slotIndex }}][end_time]"
                                                    class="form-input py-2 px-3 h-10 bg-transparent dark:bg-gray-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0 w-full md:w-1/3"
                                                    value="{{ old('slots.' . $dayLower . '.' . $slotIndex . '.end_time', $slot['end_time'] ?? '') }}">
                                                <button type="button"
                                                    class="remove-slot-btn text-red-500 hover:text-red-700 text-sm {{ count($slots) === 1 && $isChecked ? 'hidden' : '' }}">Remove</button>
                                            </div>
                                        @endforeach
                                        <button type="button"
                                            class="add-slot-btn py-1 px-3 mt-2 text-sm bg-blue-600 text-white rounded hover:bg-blue-700"
                                            data-day="{{ $dayLower }}">Add Slot</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('slots')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        @error('slots.*.*.start_time')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        @error('slots.*.*.end_time')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md">
                    Update Assignment
                </button>
                <a href="{{ route('tasks.assignments.index') }}"
                    class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-600 hover:bg-gray-700 border-gray-600 hover:border-gray-700 text-white rounded-md ml-2">
                    Cancel
                </a>
            </form>
        </div>

    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const scheduleContainer = document.getElementById('schedule-container');
                function updateRemoveButtons(slotsContainer) {
                    const slotRows = slotsContainer.querySelectorAll('.slot-row');
                    if (slotRows.length <= 1) {
                        slotRows[0].querySelector('.remove-slot-btn').style.display = 'none';
                    } else {
                        slotRows.forEach(row => row.querySelector('.remove-slot-btn').style.display = 'inline-block');
                    }
                }
                scheduleContainer.querySelectorAll('.day-checkbox').forEach(checkbox => {
                    const day = checkbox.value;
                    const slotsContainer = document.getElementById(`slots_for_${day}`);
                    if (checkbox.checked) {
                        slotsContainer.style.display = 'block';
                        updateRemoveButtons(slotsContainer);
                    }
                });
                scheduleContainer.addEventListener('change', function (event) {
                    if (event.target.classList.contains('day-checkbox')) {
                        const day = event.target.value;
                        const slotsContainer = document.getElementById(`slots_for_${day}`);
                        if (event.target.checked) {
                            slotsContainer.style.display = 'block';
                            if (slotsContainer.querySelectorAll('.slot-row').length === 0) {
                                addSlot(slotsContainer, day);
                            }
                            updateRemoveButtons(slotsContainer);
                        } else {
                            slotsContainer.style.display = 'none';
                            slotsContainer.querySelectorAll('input[type="time"]').forEach(input => input.value = '');
                            slotsContainer.querySelectorAll('.slot-row:not(:first-child)').forEach(row => row.remove());
                            const firstSlotRow = slotsContainer.querySelector('.slot-row');
                            if (firstSlotRow) {
                                firstSlotRow.querySelector('.remove-slot-btn').style.display = 'none';
                            }
                        }
                    }
                });
                function addSlot(slotsContainer, day) {
                    const newIndex = slotsContainer.querySelectorAll('.slot-row').length;
                    const newSlotRow = document.createElement('div');
                    newSlotRow.classList.add('flex', 'items-center', 'space-x-2', 'mb-2', 'slot-row');
                    newSlotRow.innerHTML = `
                    <input type="time" name="slots[${day}][${newIndex}][start_time]"
                        class="form-input py-2 px-3 h-10 bg-transparent dark:bg-gray-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0 w-full md:w-1/3" placeholder="Start Time">
                    <input type="time" name="slots[${day}][${newIndex}][end_time]"
                        class="form-input py-2 px-3 h-10 bg-transparent dark:bg-gray-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0 w-full md:w-1/3" placeholder="End Time">
                    <button type="button" class="remove-slot-btn text-red-500 hover:text-red-700 text-sm">Remove</button>
                `;
                    slotsContainer.insertBefore(newSlotRow, slotsContainer.querySelector('.add-slot-btn'));
                    updateRemoveButtons(slotsContainer);
                }
                scheduleContainer.addEventListener('click', function (event) {
                    if (event.target.classList.contains('add-slot-btn')) {
                        const day = event.target.dataset.day;
                        const slotsContainer = document.getElementById(`slots_for_${day}`);
                        addSlot(slotsContainer, day);
                    }
                    if (event.target.classList.contains('remove-slot-btn')) {
                        const slotRow = event.target.closest('.slot-row');
                        const slotsContainer = slotRow.closest('.time-slots-container');
                        slotRow.remove();
                        updateRemoveButtons(slotsContainer);
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
