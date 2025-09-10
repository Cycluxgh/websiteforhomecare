<x-app-layout>
    <div class="layout-specing">
        <div class="md:flex justify-between items-center">
            <h5 class="text-lg font-semibold">Edit Task Category: {{ $category->name }}</h5>
        </div>

        <div class="mt-6 p-6 bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
            <form action="{{ route('tasks.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Category Name:</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-slate-800 dark:border-gray-600" required>
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Description:</label>
                    <textarea name="description" id="description" rows="3"
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-slate-800 dark:border-gray-600">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                            class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-950 border-indigo-600 hover:border-indigo-700 text-white rounded-md">
                        Update Category
                    </button>
                    <a href="{{ route('tasks.index') }}"
                       class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-500 hover:bg-gray-600 border-gray-500 hover:border-gray-600 text-white rounded-md">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
