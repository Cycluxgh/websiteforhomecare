<x-app-layout>
    <div class="layout-specing">
        <div class="md:flex justify-between items-center">
            <h5 class="text-lg font-semibold">Service User: {{ $patient->name }}</h5>
            @if(auth()->check() && auth()->user()->role !== 'employee')
            <a href="{{ route('patients.index') }}"
                class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md">
                Back to Service User
            </a>
            @endif
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="mt-6">
            <div
                class="p-6 relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                <h3 class="text-lg font-semibold mb-4">Patient Details</h3>
                <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                    <div>
                        <strong>Name:</strong> {{ $patient->name }}
                    </div>
                    <div>
                        <strong>Mobile Phone:</strong> {{ $patient->mobile_phone_number }}
                    </div>
                    <div>
                        <strong>Telephone:</strong> {{ $patient->telephone_number ?? 'N/A' }}
                    </div>
                    <div>
                        <strong>Date of Birth:</strong>
                        {{ \Carbon\Carbon::parse($patient->date_of_birth)->format('jS F Y') }}
                    </div>
                    <div>
                        <strong>Address:</strong> {{ $patient->address }}
                    </div>
                    <div>
                        <strong>Image:</strong>
                        @if ($patient->image_path)
                            <img src="{{ asset('storage/' . $patient->image_path) }}" alt="{{ $patient->name }}"
                                class="h-16 w-16 object-cover rounded">
                        @else
                            N/A
                        @endif
                    </div>
                </div>

                <h3 class="text-lg font-semibold mt-6 mb-4">Questions and Answers</h3>
                @foreach ($categories as $category)
                    <div class="mb-6">
                        <h4 class="text-base font-semibold">{{ $category->name }}</h4>
                        @if ($category->questions->isNotEmpty())
                            <table class="w-full text-start mt-2">
                                <thead class="text-base">
                                    <tr>
                                        <th class="text-start p-4 min-w-[300px]">Question</th>
                                        <th class="text-start p-4 min-w-[150px]">Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category->questions as $question)
                                        @php
                                            $answer = $patient->profile->answers->where('profile_question_id', $question->id)->first();
                                        @endphp
                                        <tr>
                                            <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                                {{ $question->question_text }}
                                            </td>
                                            <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                                @if ($answer)
                                                    @if ($question->question_type === 'boolean')
                                                        {{ $answer->answer === 'true' ? 'Yes' : ($answer->answer === 'false' ? 'No' : 'N/A') }}
                                                    @elseif ($question->question_type === 'file')
                                                        @if ($answer->answer)
                                                            <a href="{{ Storage::url($answer->answer) }}" target="_blank"
                                                                class="inline-flex items-center px-3 py-1 bg-blue-600 text-white rounded-md text-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                                                <i class="mdi mdi-file-eye-outline me-1"></i> View File Attachment
                                                            </a>
                                                        @else
                                                            No file uploaded
                                                        @endif
                                                    @else
                                                        {{ $answer->answer }}
                                                    @endif
                                                @else
                                                    Not answered
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        @foreach ($category->subCategories as $subCategory)
                            <div class="mt-4">
                                <h5 class="text-sm font-semibold">{{ $subCategory->name }}</h5>
                                @if ($subCategory->questions->isNotEmpty())
                                    <table class="w-full text-start mt-2">
                                        <thead class="text-base">
                                            <tr>
                                                <th class="text-start p-4 min-w-[300px]">Question</th>
                                                <th class="text-start p-4 min-w-[150px]">Answer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subCategory->questions as $question)
                                                @php
                                                    $answer = $patient->profile->answers->where('profile_question_id', $question->id)->first();
                                                @endphp
                                                <tr>
                                                    <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                                        {{ $question->question_text }}
                                                    </td>
                                                    <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                                        @if ($answer)
                                                            @if ($question->question_type === 'boolean')
                                                                {{ $answer->answer === 'true' ? 'Yes' : ($answer->answer === 'false' ? 'No' : 'N/A') }}
                                                            @elseif ($question->question_type === 'file')
                                                                @if ($answer->answer)
                                                                    <a href="{{ Storage::url($answer->answer) }}" target="_blank"
                                                                        class="inline-flex items-center px-3 py-1 bg-blue-600 text-white rounded-md text-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                                                        <i class="mdi mdi-file-eye-outline me-1"></i> View File Attachment
                                                                    </a>
                                                                @else
                                                                    No file uploaded
                                                                @endif
                                                            @else
                                                                {{ $answer->answer }}
                                                            @endif
                                                        @else
                                                            Not answered
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p class="text-gray-500 dark:text-gray-400">No questions in this subcategory.</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
