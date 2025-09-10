<x-app-layout>
    <div class="layout-specing">
        <div class="md:flex justify-between items-center">
            <h5 class="text-lg font-semibold">Manage Profile Structure</h5>

            <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                <li class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-indigo-600 dark:hover:text-white">
                    <a href="/">Website-For-Homecare</a>
                </li>
                <li class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                    <i class="uil uil-angle-right-b"></i>
                </li>
                <li class="inline-block capitalize text-[14px] font-bold text-indigo-600 dark:text-white" aria-current="page">
                    Profile Setup
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
                <h3 class="text-xl font-semibold mb-6 text-center">Define Your Service User Profile Structure</h3>

                <div class="mb-4 flex justify-center">
                    <button type="button" class="tab-button py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 active-tab bg-blue-600 text-white" data-tab="category">Add Category</button>
                    <button type="button" class="tab-button py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ml-2 text-blue-600 hover:bg-blue-100 dark:hover:bg-slate-800" data-tab="sub-category">Add Sub-Category</button>
                    <button type="button" class="tab-button py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ml-2 text-blue-600 hover:bg-blue-100 dark:hover:bg-slate-800" data-tab="question">Add Question</button>
                </div>

                <div id="category-form" class="tab-content active">
                    <h3 class="text-lg font-semibold mb-4">Add New Profile Category</h3>
                    <form action="{{ route('profile.categories.store') }}" method="POST">
                        @csrf
                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                            <div>
                                <label for="category_name" class="form-label font-medium">Category Name: <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <input type="text" id="category_name" name="name" required
                                           class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                           placeholder="e.g., Medical History" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="lg:col-span-2">
                                <label for="category_description" class="form-label font-medium">Description:</label>
                                <div class="form-icon relative mt-2">
                                    <textarea id="category_description" name="description"
                                              class="form-input w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                              placeholder="Description of the category">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md mt-5">
                            Create Category
                        </button>
                    </form>
                </div>

                <div id="sub-category-form" class="tab-content hidden mt-8">
                    <h3 class="text-lg font-semibold mb-4">Add New Profile Sub-Category</h3>
                    <form action="{{ route('profile.subcategories.store') }}" method="POST">
                        @csrf
                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                            <div>
                                <label for="sub_category_category_id" class="form-label font-medium">Parent Category: <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <select id="sub_category_category_id" name="profile_category_id" required
                                            class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
                                        <option value="">Select a Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('profile_category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="sub_category_name" class="form-label font-medium">Sub-Category Name: <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <input type="text" id="sub_category_name" name="name" required
                                           class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                           placeholder="e.g., Allergies" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="lg:col-span-2">
                                <label for="sub_category_description" class="form-label font-medium">Description:</label>
                                <div class="form-icon relative mt-2">
                                    <textarea id="sub_category_description" name="description"
                                              class="form-input w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                              placeholder="Description of the sub-category">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md mt-5">
                            Create Sub-Category
                        </button>
                    </form>
                </div>

                <div id="question-form" class="tab-content hidden mt-8">
                    <h3 class="text-lg font-semibold mb-4">Add New Profile Question</h3>
                    <form action="{{ route('profile.questions.store') }}" method="POST">
                        @csrf
                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                            <div>
                                <label for="questionable_type" class="form-label font-medium">Attach To: <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <select id="questionable_type" name="questionable_type" required
                                            class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
                                        <option value="">Select where to attach</option>
                                        <option value="App\Models\ProfileCategory" {{ old('questionable_type') == 'App\\Models\\ProfileCategory' ? 'selected' : '' }}>Category</option>
                                        <option value="App\Models\ProfileSubCategory" {{ old('questionable_type') == 'App\\Models\\ProfileSubCategory' ? 'selected' : '' }}>Sub-Category</option>
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
                                              placeholder="Enter the question text">{{ old('question_text') }}</textarea>
                                </div>
                            </div>
                            <div>
    <label for="question_type" class="form-label font-medium">Question Type: <span class="text-red-600">*</span></label>
    <div class="form-icon relative mt-2">
        <select id="question_type" name="question_type" required
                class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
            <option value="">Select Question Type</option>
            <option value="boolean" {{ old('question_type') == 'boolean' ? 'selected' : '' }}>Yes/No (Boolean)</option>
            <option value="text" {{ old('question_type') == 'text' ? 'selected' : '' }}>Short Text</option>
            <option value="long_text" {{ old('question_type') == 'long_text' ? 'selected' : '' }}>Long Text (Paragraph)</option>
            <option value="rating" {{ old('question_type') == 'rating' ? 'selected' : '' }}>Rating (1-5, etc.)</option>
            <option value="multiple_choice" {{ old('question_type') == 'multiple_choice' ? 'selected' : '' }}>Multiple Choice</option>
            <option value="date" {{ old('question_type') == 'date' ? 'selected' : '' }}>Date</option>
            <option value="file" {{ old('question_type') == 'file' ? 'selected' : '' }}>File Upload</option>
        </select>
    </div>
</div>
                            <div id="options-container" class="{{ old('question_type') == 'multiple_choice' ? '' : 'hidden' }}">
                                <label for="options" class="form-label font-medium">Options (JSON format):</label>
                                <div class="form-icon relative mt-2">
                                    <textarea id="options" name="options"
                                              class="form-input w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                              placeholder='e.g., ["Option A", "Option B", "Option C"]'>{{ old('options') }}</textarea>
                                    <p class="text-sm text-gray-500 mt-1">Enter options as a JSON array (e.g., `["Option 1", "Option 2"]`).</p>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md mt-5">
                            Create Question
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 mt-6">
            <div class="p-6 relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                <h3 class="text-xl font-semibold mb-4">Existing Profile Structure</h3>
                @forelse($categories as $category)
                    <div class="border border-gray-200 dark:border-gray-700 rounded-md p-4 mb-4">
                        <div class="flex justify-between items-center">
                            <h4 class="text-lg font-semibold">{{ $category->name }} (Category)</h4>
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('profile.categories.edit', $category->id) }}" class="text-blue-600 hover:text-blue-800 text-sm">Edit</a>
                                <form action="{{ route('profile.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category? This will also delete all associated sub-categories and questions.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400">{{ $category->description }}</p>

                        @if($category->questions->isNotEmpty())
                            <h5 class="text-md font-medium mt-2">Category-level Questions:</h5>
                            <ul class="list-disc ml-5 mt-1">
                                @foreach($category->questions as $question)
                                    <li class="flex justify-between items-center">
                                        <span>{{ $question->question_text }} (<span class="font-bold">{{ $question->question_type }}</span>)
                                        @if($question->options)
                                            <span class="text-sm text-gray-500">Options: {{ implode(', ', $question->options) }}</span>
                                        @endif
                                        </span>
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('profile.questions.edit', $question->id) }}" class="text-blue-600 hover:text-blue-800 text-sm">Edit</a>
                                            <form action="{{ route('profile.questions.destroy', $question->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this question?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Delete</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if($category->subCategories->isNotEmpty())
                            <h5 class="text-md font-medium mt-2">Sub-Categories:</h5>
                            <ul class="list-disc ml-5 mt-1">
                                @foreach($category->subCategories as $subCategory)
                                    <li class="border border-gray-100 dark:border-gray-800 rounded-md p-3 mb-2">
                                        <div class="flex justify-between items-center">
                                            <span class="font-medium">{{ $subCategory->name }}</span>
                                            <div class="flex items-center space-x-2">
                                                <a href="{{ route('profile.subcategories.edit', $subCategory->id) }}" class="text-blue-600 hover:text-blue-800 text-sm">Edit</a>
                                                <form action="{{ route('profile.subcategories.destroy', $subCategory->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this sub-category? This will also delete all associated questions.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $subCategory->description }}</p>

                                        @if($subCategory->questions->isNotEmpty())
                                            <h6 class="text-sm font-normal mt-1">Sub-Category-level Questions:</h6>
                                            <ul class="list-circle ml-5 mt-1">
                                                @foreach($subCategory->questions as $question)
                                                    <li class="flex justify-between items-center">
                                                        <span>{{ $question->question_text }} (<span class="font-bold">{{ $question->question_type }}</span>)
                                                        @if($question->options)
                                                            <span class="text-sm text-gray-500">Options: {{ implode(', ', $question->options) }}</span>
                                                        @endif
                                                        </span>
                                                        <div class="flex items-center space-x-2">
                                                            <a href="{{ route('profile.questions.edit', $question->id) }}" class="text-blue-600 hover:text-blue-800 text-sm">Edit</a>
                                                            <form action="{{ route('profile.questions.destroy', $question->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this question?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Delete</button>
                                                            </form>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-600 dark:text-gray-400">No profile categories defined yet.</p>
                @endforelse
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const tabButtons = document.querySelectorAll('.tab-button');
                const tabContents = document.querySelectorAll('.tab-content');
                const questionableTypeSelect = document.getElementById('questionable_type');
                const questionableIdSelect = document.getElementById('questionable_id');
                const questionTypeSelect = document.getElementById('question_type');
                const optionsContainer = document.getElementById('options-container');

                tabButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        // Deactivate all tabs and hide all content
                        tabButtons.forEach(btn => {
                            btn.classList.remove('active-tab', 'bg-blue-600', 'text-white');
                            btn.classList.add('text-blue-600', 'hover:bg-blue-100', 'dark:hover:bg-slate-800');
                        });
                        tabContents.forEach(content => content.classList.add('hidden'));

                        // Activate the clicked tab and show its content
                        this.classList.add('active-tab', 'bg-blue-600', 'text-white');
                        this.classList.remove('text-blue-600', 'hover:bg-blue-100', 'dark:hover:bg-slate-800');
                        const targetTab = this.dataset.tab;
                        document.getElementById(`${targetTab}-form`).classList.remove('hidden');
                    });
                });

                // Handle dynamic options for questionable_id
                const updateQuestionableIdOptions = () => {
                    const selectedType = questionableTypeSelect.value;
                    let optionsHtml = '<option value="">Select a Category/Sub-Category</option>';

                    if (selectedType === 'App\\Models\\ProfileCategory') {
                        @foreach($categories as $category)
                            optionsHtml += `<option value="{{ $category->id }}">{{ $category->name }}</option>`;
                        @endforeach
                    } else if (selectedType === 'App\\Models\\ProfileSubCategory') {
                        @foreach($subCategories as $subCategory)
                            optionsHtml += `<option value="{{ $subCategory->id }}">{{ $subCategory->name }} ({{ $subCategory->category->name ?? 'N/A' }})</option>`;
                        @endforeach
                    }
                    questionableIdSelect.innerHTML = optionsHtml;
                };

                questionableTypeSelect.addEventListener('change', updateQuestionableIdOptions);

                // Trigger change on load if an old value exists for questionable_type
                if (questionableTypeSelect.value) {
                    updateQuestionableIdOptions();
                    // Set the old questionable_id value if it exists
                    @if(old('questionable_id'))
                        questionableIdSelect.value = "{{ old('questionable_id') }}";
                    @endif
                }


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
