<x-app-layout>
    <div class="layout-specing">
        <div class="md:flex justify-between items-center">
            <h5 class="text-lg font-semibold">Questions for {{ $patientProfile->patient->name }}: {{ $category->name }}</h5>
            <a href="{{ route('patients.index') }}"
               class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-950 border-indigo-600 hover:border-indigo-700 text-white rounded-md">
                Back to Patients
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
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

        <div class="mt-6">
            <div class="p-6 relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-950 rounded-md">

                <form method="POST" action="{{ route('patient-profiles.answers.save', ['patientProfileId' => $patientProfile->id, 'categoryId' => $category->id]) }}" enctype="multipart/form-data">
    @csrf

    <h3 class="text-lg font-semibold mb-4">{{ $category->name }}</h3>
    <p class="text-gray-500 dark:text-gray-400 mb-4">{{ $category->description ?? '' }}</p>

    @if ($questions->isNotEmpty())
        @foreach ($questions as $question)
            <div class="form-group mb-3">
                <label for="answer_{{ $question->id }}" class="form-label font-medium">{{ $question->question_text }}</label>
                @if ($question->question_type === 'boolean')
                    <select name="answers[{{ $question->id }}][answer]"
                            class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                            id="answer_{{ $question->id }}">
                        <option value="" disabled {{ !$question->answers->first() ? 'selected' : '' }}>Select</option>
                        <option value="true" {{ $question->answers->first() && $question->answers->first()->answer === 'true' ? 'selected' : '' }}>Yes</option>
                        <option value="false" {{ $question->answers->first() && $question->answers->first()->answer === 'false' ? 'selected' : '' }}>No</option>
                    </select>
                    <input type="hidden" name="answers[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                @elseif ($question->question_type === 'rating')
                    <select name="answers[{{ $question->id }}][answer]"
                            class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                            id="answer_{{ $question->id }}">
                        <option value="" disabled {{ !$question->answers->first() ? 'selected' : '' }}>Select Rating</option>
                        @foreach ($question->options ?? [1, 2, 3, 4, 5] as $option)
                            <option value="{{ $option }}" {{ $question->answers->first() && $question->answers->first()->answer == $option ? 'selected' : '' }}>{{ $option }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="answers[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                @elseif ($question->question_type === 'multiple_choice')
                    <select name="answers[{{ $question->id }}][answer]"
                            class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                            id="answer_{{ $question->id }}">
                        <option value="" disabled {{ !$question->answers->first() ? 'selected' : '' }}>Select Option</option>
                        @foreach ($question->options ?? [] as $option)
                            <option value="{{ $option }}" {{ $question->answers->first() && $question->answers->first()->answer === $option ? 'selected' : '' }}>{{ $option }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="answers[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                @elseif ($question->question_type === 'long_text')
                    <textarea name="answers[{{ $question->id }}][answer]"
                              class="form-input w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                              id="answer_{{ $question->id }}"
                              placeholder="Enter your answer">{{ $question->answers->first() ? $question->answers->first()->answer : old('answers.' . $question->id . '.answer') }}</textarea>
                    <input type="hidden" name="answers[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                @elseif ($question->question_type === 'date')
                    <input type="date" name="answers[{{ $question->id }}][answer]"
                           class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                           id="answer_{{ $question->id }}"
                           value="{{ $question->answers->first() ? $question->answers->first()->answer : old('answers.' . $question->id . '.answer') }}">
                    <input type="hidden" name="answers[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                @elseif ($question->question_type === 'file')
                    <input type="file" name="answers[{{ $question->id }}][answer]"
                           class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                           id="answer_{{ $question->id }}">
                    @if ($question->answers->first() && $question->answers->first()->answer)
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Current file: <a href="{{ Storage::url($question->answers->first()->answer) }}" target="_blank" class="text-blue-600 hover:underline">{{ basename($question->answers->first()->answer) }}</a></p>
                    @endif
                    <input type="hidden" name="answers[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                @else
                    <input type="text" name="answers[{{ $question->id }}][answer]"
                           class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                           id="answer_{{ $question->id }}"
                           placeholder="Enter your answer"
                           value="{{ $question->answers->first() ? $question->answers->first()->answer : old('answers.' . $question->id . '.answer') }}">
                    <input type="hidden" name="answers[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                @endif
            </div>
        @endforeach
    @else
        <p class="text-gray-500 dark:text-gray-400">Sub Category Below</p>
    @endif

    @foreach ($category->subCategories as $subCategory)
        <div class="mt-6">
            <h4 class="text-base font-semibold mb-2">{{ $subCategory->name }}</h4>
            <p class="text-gray-500 dark:text-gray-400 mb-4">{{ $subCategory->description ?? '' }}</p>
            @if ($subCategory->questions->isNotEmpty())
                @foreach ($subCategory->questions as $question)
                    <div class="form-group mb-3">
                        <label for="answer_{{ $question->id }}" class="form-label font-medium">{{ $question->question_text }}</label>
                        @if ($question->question_type === 'boolean')
                            <select name="answers[{{ $question->id }}][answer]"
                                    class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                    id="answer_{{ $question->id }}">
                                <option value="" disabled {{ !$question->answers->first() ? 'selected' : '' }}>Select</option>
                                <option value="true" {{ $question->answers->first() && $question->answers->first()->answer === 'true' ? 'selected' : '' }}>Yes</option>
                                <option value="false" {{ $question->answers->first() && $question->answers->first()->answer === 'false' ? 'selected' : '' }}>No</option>
                            </select>
                            <input type="hidden" name="answers[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                        @elseif ($question->question_type === 'rating')
                            <select name="answers[{{ $question->id }}][answer]"
                                    class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                    id="answer_{{ $question->id }}">
                                <option value="" disabled {{ !$question->answers->first() ? 'selected' : '' }}>Select Rating</option>
                                @foreach ($question->options ?? [1, 2, 3, 4, 5] as $option)
                                    <option value="{{ $option }}" {{ $question->answers->first() && $question->answers->first()->answer == $option ? 'selected' : '' }}>{{ $option }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="answers[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                        @elseif ($question->question_type === 'multiple_choice')
                            <select name="answers[{{ $question->id }}][answer]"
                                    class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                    id="answer_{{ $question->id }}">
                                <option value="" disabled {{ !$question->answers->first() ? 'selected' : '' }}>Select Option</option>
                                @foreach ($question->options ?? [] as $option)
                                    <option value="{{ $option }}" {{ $question->answers->first() && $question->answers->first()->answer === $option ? 'selected' : '' }}>{{ $option }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="answers[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                        @elseif ($question->question_type === 'long_text')
                            <textarea name="answers[{{ $question->id }}][answer]"
                                      class="form-input w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                      id="answer_{{ $question->id }}"
                                      placeholder="Enter your answer">{{ $question->answers->first() ? $question->answers->first()->answer : old('answers.' . $question->id . '.answer') }}</textarea>
                            <input type="hidden" name="answers[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                        @elseif ($question->question_type === 'date')
                            <input type="date" name="answers[{{ $question->id }}][answer]"
                                   class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                   id="answer_{{ $question->id }}"
                                   value="{{ $question->answers->first() ? $question->answers->first()->answer : old('answers.' . $question->id . '.answer') }}">
                            <input type="hidden" name="answers[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                        @elseif ($question->question_type === 'file')
                            <input type="file" name="answers[{{ $question->id }}][answer]"
                                   class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                   id="answer_{{ $question->id }}">
                            @if ($question->answers->first() && $question->answers->first()->answer)
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Current file: <a href="{{ Storage::url($question->answers->first()->answer) }}" target="_blank" class="text-blue-600 hover:underline">{{ basename($question->answers->first()->answer) }}</a></p>
                            @endif
                            <input type="hidden" name="answers[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                        @else
                            <input type="text" name="answers[{{ $question->id }}][answer]"
                                   class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                   id="answer_{{ $question->id }}"
                                   placeholder="Enter your answer"
                                   value="{{ $question->answers->first() ? $question->answers->first()->answer : old('answers.' . $question->id . '.answer') }}">
                            <input type="hidden" name="answers[{{ $question->id }}][question_id]" value="{{ $question->id }}">
                        @endif
                    </div>
                @endforeach
            @else
                <p class="text-gray-500 dark:text-gray-400">No questions in this subcategory.</p>
            @endif
        </div>
    @endforeach

    <div class="flex justify-between mt-6">
        <div>
            @if ($prevCategoryId)
                <a href="{{ route('patient-profiles.questions', ['patientProfileId' => $patientProfile->id, 'categoryId' => $prevCategoryId]) }}"
                   class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-800 hover:bg-gray-950 border-gray-800 hover:border-gray-950 text-white rounded-md">
                    Previous Category
                </a>
            @endif
        </div>
        <div>
            <button type="submit"
                    class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-950 border-indigo-600 hover:border-indigo-700 text-white rounded-md">
                Save Answers
            </button>
            @if ($nextCategoryId)
                <a href="{{ route('patient-profiles.questions', ['patientProfileId' => $patientProfile->id, 'categoryId' => $nextCategoryId]) }}"
                   class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-800 hover:bg-gray-950 border-gray-800 hover:border-gray-950 text-white rounded-md ms-2">
                    Next Category
                </a>
            @endif
        </div>
    </div>
</form>
            </div>
        </div>
    </div>
</x-app-layout>
