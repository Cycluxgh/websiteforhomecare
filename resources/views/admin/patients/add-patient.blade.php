<x-app-layout>
<div class="layout-specing">
        <div class="md:flex justify-between items-center">
            <h5 class="text-lg font-semibold">Add Service User</h5>

            <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                <li class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white">
                    <a href="/">Website-For-Homecare</a>
                </li>
                <li class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                    <i class="uil uil-angle-right-b"></i>
                </li>
                <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white" aria-current="page">
                    Add Service User
                </li>
            </ul>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
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

        <div class="grid grid-cols-1 mt-6">
            <div class="p-6 relative overflow-x-auto block w-full bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                <form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h3 class="text-lg font-semibold mb-4">Service User Details</h3>
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                        <div>
                            <label class="form-label font-medium">Name: <span class="text-red-600">*</span></label>
                            <div class="form-icon relative mt-2">
                                <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                <input type="text" id="name" name="name" required
                                       class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                       placeholder="Name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div>
                            <label class="form-label font-medium">Mobile Phone Number: <span class="text-red-600">*</span></label>
                            <div class="form-icon relative mt-2">
                                <i data-feather="phone" class="size-4 absolute top-3 start-4"></i>
                                <input type="text" id="mobile_phone_number" name="mobile_phone_number" required
                                       class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                       placeholder="Mobile Phone Number" value="{{ old('mobile_phone_number') }}">
                            </div>
                        </div>
                        <div>
                            <label class="form-label font-medium">Telephone Number:</label>
                            <div class="form-icon relative mt-2">
                                <i data-feather="phone" class="size-4 absolute top-3 start-4"></i>
                                <input type="text" id="telephone_number" name="telephone_number"
                                       class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                       placeholder="Telephone Number" value="{{ old('telephone_number') }}">
                            </div>
                        </div>
                        <div>
                            <label class="form-label font-medium">Date of Birth: <span class="text-red-600">*</span></label>
                            <div class="form-icon relative mt-2">
                                <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                <input type="date" id="date_of_birth" name="date_of_birth" required
                                       class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                       value="{{ old('date_of_birth') }}">
                            </div>
                        </div>
                        <div>
                            <label class="form-label font-medium">Profile Image:</label>
                            <div class="form-icon relative mt-2">
                                <i data-feather="image" class="size-4 absolute top-3 start-4"></i>
                                <input type="file" id="image_path" name="image_path" accept="image/*"
                                       class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0">
                            </div>
                        </div>
                        <div class="lg:col-span-2">
                            <label class="form-label font-medium">Address: <span class="text-red-600">*</span></label>
                            <div class="form-icon relative mt-2">
                                <i data-feather="map-pin" class="size-4 absolute top-3 start-4"></i>
                                <textarea id="address" name="address" required
                                          class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-blue-600 dark:border-gray-800 dark:focus:border-blue-600 focus:ring-0"
                                          placeholder="Address">{{ old('address') }}</textarea>
                            </div>
                        </div>
                    </div><!--end grid-->

                    <input type="submit" id="submit" name="send"
                           class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md mt-5"
                           value="Create Patient">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
