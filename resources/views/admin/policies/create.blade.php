<x-app-layout>

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Create Policy</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li
                        class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white">
                        <a href="/">Website-For-Homecare</a></li>
                    <li
                        class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="uil uil-angle-right-b"></i></li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white"
                        aria-current="page">Create Policy</li>
                </ul>
            </div>
            <div class="grid grid-cols-1 mt-6">
                <div
                    class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                    <div class="p-6 relative rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
                        <form id="policyForm" method="POST" action="{{ route('admin.policies.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="grid grid-cols-1 gap-6 mt-5">
                                <div>
                                    <label for="title" class="form-label font-medium">Policy Title:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="book-open" class="size-4 absolute top-3 start-4"></i>
                                        <input type="text" name="title" id="title"
                                               class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0"
                                               required>
                                    </div>
                                    @error('title')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div hidden>
                                    <label for="slug" class="form-label font-medium">Policy Slug (auto-generated if left blank):</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="link" class="size-4 absolute top-3 start-4"></i>
                                        <input type="text" name="slug" id="slug"
                                               class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                    </div>
                                    @error('slug')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="description" class="form-label font-medium">Short Description:</label>
                                    <textarea name="description" id="description"
                                              class="form-input w-full py-2 px-3 h-20 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0 mt-2"
                                              required></textarea>
                                    @error('description')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="content" class="form-label font-medium">Policy Content:</label>
                                    <textarea name="content" id="content"
                                              class="form-input w-full py-2 px-3 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0 mt-2"></textarea>
                                    @error('content')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- New Fields -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="effective_date" class="form-label font-medium">Effective Date:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                            <input type="date" name="effective_date" id="effective_date"
                                                   class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                        </div>
                                        @error('effective_date')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="expiry_date" class="form-label font-medium">Expiry Date:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                            <input type="date" name="expiry_date" id="expiry_date"
                                                   class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0">
                                        </div>
                                        @error('expiry_date')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="pdf_file" class="form-label font-medium">Upload Policy PDF (optional):</label>
                                    <input type="file" name="pdf_file" id="pdf_file"
                                           class="form-input w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800 focus:border-red-600 dark:focus:border-red-600 focus:ring-0 mt-2"
                                           accept="application/pdf">
                                    @error('pdf_file')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="status" class="form-label font-medium">Policy Status:</label>
                                        <select name="status" id="status" class="form-select form-input w-full py-2 px-2 pe-6 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0">
                                            <option value="draft" @if(old('status') == 'draft') selected @endif>Draft</option>
                                            <option value="published" @if(old('status') == 'published') selected @endif>Published</option>
                                            <option value="archived" @if(old('status') == 'archived') selected @endif>Archived</option>
                                        </select>
                                        @error('status')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="is_featured" class="form-label font-medium">Featured Policy:</label>
                                        <div class="mt-2">
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" name="is_featured" id="is_featured" value="1"
                                                       class="form-checkbox size-4 appearance-none rounded border border-gray-200 dark:border-gray-800 accent-blue-600 checked:appearance-auto dark:accent-blue-600 focus:border-blue-300 focus:ring-0 focus:ring-offset-0 focus:ring-blue-200 focus:ring-opacity-50 me-2">
                                                <span class="ml-2">Mark as featured policy</span>
                                            </label>
                                        </div>
                                        @error('is_featured')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end mt-6">
                                <button type="submit"
                                        class="py-2 px-5 inline-flex items-center font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md">
                                    Create Policy
                                </button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>

            <!-- End Content -->
        </div>
    </div>
    @push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
    <script src="{{ asset('js/policies_form.js') }}"></script>

    @endpush
</x-app-layout>


