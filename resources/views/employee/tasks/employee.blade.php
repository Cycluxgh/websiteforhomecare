<x-app-layout>
    <div class="layout-specing">
        <h5 class="text-lg font-semibold mb-4">My Assigned Patients and Tasks</h5>

        @if (session('success'))
            <div class="relative px-4 py-2 rounded-md font-medium bg-emerald-600/10 border border-emerald-600/10 text-emerald-600 block"
                role="alert">
                <i class="uil uil-check-circle me-1"></i>
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="relative px-4 py-2 rounded-md font-medium bg-red-600/10 border border-red-600/10 text-red-600 block"
                role="alert">
                <i class="uil uil-exclamation-octagon me-1"></i>
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="relative px-4 py-2 rounded-md font-medium bg-red-600/10 border border-red-600/10 text-red-600 block"
                role="alert">
                <i class="uil uil-exclamation-triangle me-1"></i>
                <strong class="font-bold">Validation Error!</strong>
                <ul class="mt-3 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mt-6">
            @foreach ($assignments as $assignment)
                <div class="p-6 bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md mb-6">
                    <h3 class="text-lg font-semibold mb-2">Tasks for {{ $assignment->patient->name }}</h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-3">Assigned:
                        {{ $assignment->assigned_date->format('jS F Y') }}</p>
                    <p class="text-gray-500 dark:text-gray-400 mb-4">End Date:
                        {{ $assignment->end_date ? $assignment->end_date->format('jS F Y') : 'No end date' }}</p>

                    <form method="POST" action="{{ route('tasks.answers.save', $assignment->id) }}">
                        @csrf
                        @foreach ($taskCategories as $category)
                            <div class="mb-4">
                                <h4 class="text-base font-semibold mb-2">{{ $category->name }}</h4>
                                @if ($category->taskItems->isNotEmpty())
                                    @foreach ($category->taskItems as $item)
                                        <div class="flex items-center mb-3">
                                            <input type="checkbox" name="answers[{{ $item->id }}][is_completed]"
                                                id="task_{{ $assignment->id }}_{{ $item->id }}" value="1"
                                                {{ optional($assignment->taskItemAnswers->where('task_item_id', $item->id)->first())->is_completed ? 'checked' : '' }}>
                                            <input type="hidden" name="answers[{{ $item->id }}][task_item_id]"
                                                value="{{ $item->id }}">
                                            <label for="task_{{ $assignment->id }}_{{ $item->id }}"
                                                class="ml-2">{{ $item->name }}</label>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-gray-500 dark:text-gray-400">No task items in this category.</p>
                                @endif
                            </div>
                        @endforeach
                        <button type="submit"
                            class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md">
                            Save Task Statuses
                        </button>
                    </form>
                </div>
            @endforeach
            @if ($assignments->isEmpty())
                <p class="text-gray-600 dark:text-gray-400">No patients assigned to you.</p>
            @endif
        </div>
    </div>
</x-app-layout>
