<x-app-layout>
    <div class="layout-specing">
        <div class="md:flex justify-between items-center">
            <h5 class="text-lg font-semibold">Edit Profile Question: {{ $question->question_text }}</h5>

            <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                <li class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-indigo-600 dark:hover:text-white">
                    <a href="/">Website-For-Homecare</a>
                </li>
                <li class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                    <i class="uil uil-angle-right-b"></i>
                </li>
                <li class="inline-block capitalize text-[14px] font-bold text-indigo-600 dark:text-white" aria-current="page">
                    Edit Question
                </li>
            </ul>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
                <strong class="font-bold">Validation Error!</strong>
                <ul class="mt-3 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 mt-6">
            <div class="p-6 relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                <form action="{{ route('profile.questions.update', $question->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                        <div>
                            <label for="questionable_type" class="form-label font-medium">Attach To: <span class="text-red-600">*</span></label>
                            <div class="form-icon relative mt-2">
                                <select id="questionable_type" name="questionable_type" required
                                        class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
                                    <option value="">Select where to attach</option>
                                    <option value="App\Models\ProfileCategory" {{ old('questionable_type', $question->questionable_type) == 'App\\Models\\ProfileCategory' ? 'selected' : '' }}>Category</option>
                                    <option value="App\Models\ProfileSubCategory" {{ old('questionable_type', $question->questionable_type) == 'App\\Models\\ProfileSubCategory' ? 'selected' : '' }}>Sub-Category</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="questionable_id" class="form-label font-medium">Select Item: <span class="text-red-600">*</span></label>
                            <div class="form-icon relative mt-2">
                                <select id="questionable_id" name="questionable_id" required
                                        class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
                                    <option value="">Select a Category/Sub-Category</option>
                                    </select>
                            </div>
                        </div>
                        <div class="lg:col-span-2">
                            <label for="question_text" class="form-label font-medium">Question Text: <span class="text-red-600">*</span></label>
                            <div class="form-icon relative mt-2">
                                <textarea id="question_text" name="question_text" required
                                          class="form-input w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                          placeholder="Enter the question text">{{ old('question_text', $question->question_text) }}</textarea>
                            </div>
                        </div>
                        <div>
                            <label for="question_type" class="form-label font-medium">Question Type: <span class="text-red-600">*</span></label>
                            <div class="form-icon relative mt-2">
                                <select id="question_type" name="question_type" required
                                        class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
                                    <option value="">Select Question Type</option>
                                    <option value="boolean" {{ old('question_type', $question->question_type) == 'boolean' ? 'selected' : '' }}>Yes/No (Boolean)</option>
                                    <option value="text" {{ old('question_type', $question->question_type) == 'text' ? 'selected' : '' }}>Short Text</option>
                                    <option value="long_text" {{ old('question_type', $question->question_type) == 'long_text' ? 'selected' : '' }}>Long Text (Paragraph)</option>
                                    <option value="rating" {{ old('question_type', $question->question_type) == 'rating' ? 'selected' : '' }}>Rating (1-5, etc.)</option>
                                    <option value="multiple_choice" {{ old('question_type', $question->question_type) == 'multiple_choice' ? 'selected' : '' }}>Multiple Choice</option>
                                    <option value="date" {{ old('question_type', $question->question_type) == 'date' ? 'selected' : '' }}>Date</option>
                                    <option value="file" {{ old('question_type', $question->question_type) == 'file' ? 'selected' : '' }}>File Upload</option>
                                </select>
                            </div>
                        </div>
                        <div id="options-container" class="{{ old('question_type', $question->question_type) == 'multiple_choice' ? '' : 'hidden' }}">
                            <label for="options" class="form-label font-medium">Options (JSON format):</label>
                            <div class="form-icon relative mt-2">
                                <textarea id="options" name="options"
                                          class="form-input w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                          placeholder='e.g., ["Option A", "Option B", "Option C"]'>{{ old('options', json_encode($question->options)) }}</textarea>
                                <p class="text-sm text-gray-500 mt-1">Enter options as a JSON array (e.g., `["Option 1", "Option 2"]`).</p>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md mt-5">
                        Update Question
                    </button>
                    <a href="{{ route('profile.setup.create') }}" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-400 hover:bg-gray-500 border-gray-400 hover:border-gray-500 text-white rounded-md mt-5 ml-2">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const questionableTypeSelect = document.getElementById('questionable_type');
                const questionableIdSelect = document.getElementById('questionable_id');
                const questionTypeSelect = document.getElementById('question_type');
                const optionsContainer = document.getElementById('options-container');

                const categories = @json($categories->map->only('id', 'name'));
                const subCategories = @json($subCategories->map(function($subCat) { return ['id' => $subCat->id, 'name' => $subCat->name, 'category_name' => $subCat->category->name ?? 'N/A']; }));

                const updateQuestionableIdOptions = () => {
                    const selectedType = questionableTypeSelect.value;
                    let optionsHtml = '<option value="">Select a Category/Sub-Category</option>';
                    const currentQuestionableId = "{{ $question->questionable_id }}";
                    const currentQuestionableType = "{{ $question->questionable_type }}";

                    if (selectedType === 'App\\Models\\ProfileCategory') {
                        categories.forEach(category => {
                            const selected = (currentQuestionableType === selectedType && currentQuestionableId == category.id) ? 'selected' : '';
                            optionsHtml += `<option value="${category.id}" ${selected}>${category.name}</option>`;
                        });
                    } else if (selectedType === 'App\\Models\\ProfileSubCategory') {
                        subCategories.forEach(subCategory => {
                            const selected = (currentQuestionableType === selectedType && currentQuestionableId == subCategory.id) ? 'selected' : '';
                            optionsHtml += `<option value="${subCategory.id}" ${selected}>${subCategory.name} (${subCategory.category_name})</option>`;
                        });
                    }
                    questionableIdSelect.innerHTML = optionsHtml;
                };

                questionableTypeSelect.addEventListener('change', updateQuestionableIdOptions);
                updateQuestionableIdOptions(); // Call on load to populate based on existing data

                // Show/hide options input based on question_type
                questionTypeSelect.addEventListener('change', function () {
                    if (this.value === 'multiple_choice') {
                        optionsContainer.classList.remove('hidden');
                    } else {
                        optionsContainer.classList.add('hidden');
                    }
                });

                 // Trigger change on load if an old value exists for question_type
                 if (questionTypeSelect.value) {
                    questionTypeSelect.dispatchEvent(new Event('change'));
                }
            });
        </script>
    @endpush
</x-app-layout>
