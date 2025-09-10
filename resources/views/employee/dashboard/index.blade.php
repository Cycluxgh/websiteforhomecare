<x-app-layout>
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <div class="flex justify-between items-center">
                <div>
                    @php
                        $hour = now()->hour;
                        $greeting = $hour < 12 ? 'Good morning' : ($hour < 18 ? 'Good afternoon' : 'Good evening');
                    @endphp
                    <h5 class="text-xl font-bold">{{ $greeting }}, {{ Auth::user()->name }}</h5>
                    <h6 class="text-slate-400 font-semibold">
                        Weather: {{ $weather['description'] ?? 'N/A' }} ({{ $weather['temp'] ?? 'N/A' }}°C) in
                        {{ $weather['name'] ?? 'N/A' }}
                    </h6>
                </div>
                <div class="flex items-center">
                    @php
                        $hasClockedIn = \App\Models\Timesheet::where('user_id', Auth::id())
                            ->where('work_date', \Carbon\Carbon::today()->toDateString())
                            ->whereNull('clock_out')
                            ->exists();
                    @endphp

                    @if (!$hasClockedIn)
                        <form action="{{ route('employee.timesheets.clock_in') }}" method="POST" class="ms-1"
                            id="clockInForm">
                            @csrf
                            {{-- Hidden input fields for latitude and longitude --}}
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">

                            <button type="submit"
                                class="py-[7px] px-6 font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 text-white rounded-md sm:inline-block hidden">
                                <i class="uil uil-sign-in-alt"></i> Clock In
                            </button>
                            <button type="submit"
                                class="size-10 items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border bg-blue-600 hover:bg-blue-700 border-blue-600 text-white sm:hidden inline-flex">
                                <i class="uil uil-sign-in-alt"></i>
                            </button>
                        </form>
                    @else
                        {{-- Your existing clock out button and modal --}}
                        <button type="button"
                            class="ms-1 py-[7px] px-6 font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 text-white rounded-md sm:inline-block hidden"
                            onclick="document.getElementById('clockOutModal').showModal()">
                            <i class="uil uil-sign-out-alt"></i> Clock Out
                        </button>
                        <button type="button"
                            class="ms-1 size-10 items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-md border bg-blue-600 hover:bg-blue-700 border-blue-600 text-white sm:hidden inline-flex"
                            onclick="document.getElementById('clockOutModal').showModal()">
                            <i class="uil uil-sign-out-alt"></i>
                        </button>

                        <dialog id="clockOutModal" class="rounded-md shadow-sm dark:shadow-gray-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white m-auto">
                            <div class="relative h-auto md:w-[480px] w-300px">
                                <div class="flex justify-between items-center px-6 py-4 border-b border-gray-100 dark:border-gray-700">
                                    <h3 class="font-bold text-lg">Clock Out & Add Notes</h3>
                                    <form method="dialog">
                                        <button class="size-6 flex justify-center items-center shadow-sm dark:shadow-gray-800 rounded-md btn-ghost"><i data-feather="x" class="size-4"></i></button>
                                    </form>
                                </div>
                                <div class="p-6 text-center">
                                    <i class="uil uil-question-circle text-gray-500 dark:text-gray-400 text-5xl mx-auto mb-4"></i>
                                    <h4 class="text-xl font-semibold mt-2">Are you sure you want to clock out?</h4>
                                    <form action="{{ route('employee.timesheets.clock_out') }}" method="POST" class="mt-4">
                                        @csrf
                                        @method('PUT')
                                        <div id="taskInputsContainer" class="mb-4 text-left">
                                            <div class="form-icon relative mb-4 text-left">
                                                <i data-feather="check-square" class="size-4 absolute top-3 start-4 text-gray-500 dark:text-gray-400"></i>
                                                <input type="text" id="task_1" name="tasks[]" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0" placeholder="Task completed">
                                            </div>
                                        </div>
                                        <div class="mb-4 text-left">
                                            <button type="button" onclick="addTaskInput()" class="py-2 px-4 inline-block font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-gray-200 hover:bg-gray-300 border-gray-200 text-gray-700 rounded-md">
                                                Add More Tasks
                                            </button>
                                        </div>
                                        <div class="flex justify-center gap-4 mt-6">
                                            <button type="submit" class="py-[7px] px-6 font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-red-600 hover:bg-red-700 border-red-600 text-white rounded-md">
                                                Yes, Clock Out
                                            </button>
                                            <button type="button" onclick="document.getElementById('clockOutModal').close()" class="py-[7px] px-6 font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-300 hover:bg-gray-400 border-gray-300 text-gray-700 hover:text-gray-900 rounded-md">
                                                Cancel
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </dialog>
                        @endif
                </div>

            </div>



            <div class="grid lg:grid-cols-12 grid-cols-1 mt-6 gap-6">
                <livewire:my-recent-timesheets />

            </div>

            <div class="grid lg:grid-cols-12 grid-cols-1 mt-6 gap-6">
               <livewire:my-slots />

            </div>
        </div>
    </div>
</x-app-layout>


<script>
    let taskCounter = 1;

    function addTaskInput() {
        taskCounter++;
        const taskInputsContainer = document.getElementById('taskInputsContainer');
        const newInputDiv = document.createElement('div');
        newInputDiv.classList.add('form-icon', 'relative', 'mb-4', 'text-left');
        newInputDiv.innerHTML = `
            <i data-feather="check-square" class="size-4 absolute top-3 start-4 text-gray-500 dark:text-gray-400"></i>
            <input type="text" id="task_${taskCounter}" name="tasks[]" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-blue-600 dark:focus:border-blue-600 focus:ring-0" placeholder="Task completed">
        `;
        taskInputsContainer.appendChild(newInputDiv);
        // Re-render Feather icons after adding new element
        feather.replace();
    }

    // Function to get current location
    function getCurrentLocation() {
        return new Promise((resolve, reject) => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        resolve({
                            latitude: position.coords.latitude,
                            longitude: position.coords.longitude,
                        });
                    },
                    (error) => {
                        reject(error);
                    }
                );
            } else {
                reject(new Error("Geolocation is not supported by this browser."));
            }
        });
    }

    // Event listener for the clock-in form submission
    document.addEventListener('DOMContentLoaded', () => {
        const clockInForm = document.getElementById('clockInForm');
        if (clockInForm) {
            clockInForm.addEventListener('submit', async (event) => {
                event.preventDefault(); // Prevent default form submission

                try {
                    const location = await getCurrentLocation();
                    document.getElementById('latitude').value = location.latitude;
                    document.getElementById('longitude').value = location.longitude;
                    clockInForm.submit(); // Submit the form after getting location
                } catch (error) {
                    console.error("Error getting location for clock-in:", error);
                    alert("Could not get your current location for clock-in. Please ensure location services are enabled and try again.");
                    // Optionally, you might want to submit the form without location or handle this error differently
                    // clockInForm.submit();
                }
            });
        }

        // For the clock-out form, if you also want to capture location at clock-out
        const clockOutForm = document.querySelector('#clockOutModal form'); // Select the form inside the modal
        if (clockOutForm) {
            clockOutForm.addEventListener('submit', async (event) => {
                event.preventDefault(); // Prevent default form submission

                try {
                    const location = await getCurrentLocation();
                    document.getElementById('latitude').value = location.latitude;
                    document.getElementById('longitude').value = location.longitude;
                    clockOutForm.submit(); // Submit the form after getting location
                } catch (error) {
                    console.error("Error getting location for clock-out:", error);
                    alert("Could not get your current location for clock-out. Please ensure location services are enabled and try again.");
                    // Optionally, submit without location or handle
                    // clockOutForm.submit();
                }
            });
        }
    });

</script>
