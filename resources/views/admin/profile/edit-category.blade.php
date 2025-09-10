<x-app-layout>
    <div class="layout-specing">
        <div class="md:flex justify-between items-center">
            <h5 class="text-lg font-semibold">Edit Profile Category: {{ $category->name }}</h5>

            <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                <li class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-indigo-600 dark:hover:text-white">
                    <a href="/">Website-For-Homecare</a>
                </li>
                <li class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                    <i class="uil uil-angle-right-b"></i>
                </li>
                <li class="inline-block capitalize text-[14px] font-bold text-indigo-600 dark:text-white" aria-current="page">
                    Edit Category
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
                <form action="{{ route('profile.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                        <div>
                            <label for="category_name" class="form-label font-medium">Category Name: <span class="text-red-600">*</span></label>
                            <div class="form-icon relative mt-2">
                                <input type="text" id="category_name" name="name" required
                                       class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                       placeholder="e.g., Medical History" value="{{ old('name', $category->name) }}">
                            </div>
                        </div>
                        <div class="lg:col-span-2">
                            <label for="category_description" class="form-label font-medium">Description:</label>
                            <div class="form-icon relative mt-2">
                                <textarea id="category_description" name="description"
                                          class="form-input w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                          placeholder="Description of the category">{{ old('description', $category->description) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md mt-5">
                        Update Category
                    </button>
                    <a href="{{ route('profile.setup.create') }}" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-400 hover:bg-gray-500 border-gray-400 hover:border-gray-500 text-white rounded-md mt-5 ml-2">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
