<x-app-layout>
    <div class="layout-specing">
        <h5 class="text-lg font-semibold mb-4">Create Task Category</h5>

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
            <form method="POST" action="{{ route('tasks.categories.store') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="name" class="form-label font-medium">Category Name</label>
                    <input type="text" name="name" id="name"
                           class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                           value="{{ old('name') }}" placeholder="Enter category name">
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="form-label font-medium">Description (Optional)</label>
                    <textarea name="description" id="description"
                              class="form-input w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                              placeholder="Enter description">{{ old('description') }}</textarea>
                </div>
                <button type="submit"
                        class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-950 border-blue-600 hover:border-blue-950 text-white rounded-md">
                    Create Category
                </button>
                <a href="{{ route('tasks.index') }}"
                   class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-600 hover:bg-gray-700 border-gray-600 hover:border-gray-700 text-white rounded-md ms-2">
                    Cancel
                </a>
            </form>
        </div>
    </div>
</x-app-layout>
