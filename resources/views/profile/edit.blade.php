<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <div class="grid grid-cols-1">
                <div
                    class="profile-banner relative text-transparent rounded-md shadow-sm dark:shadow-gray-700 overflow-hidden">
                    <input id="pro-banner" name="profile-banner" type="file" class="hidden" onchange="loadFile(event)">
                    <div class="relative shrink-0">
                        <img src="assets/images/blog/bg.jpg" class="h-80 w-full object-cover" id="profile-banner"
                            alt="">
                        <div class="absolute inset-0 bg-black/70"></div>
                        <label class="absolute inset-0 cursor-pointer" for="pro-banner"></label>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-12 grid-cols-1">
                <div class="xl:col-span-3 lg:col-span-4 md:col-span-4 mx-6">
                    <div
                        class="p-6 relative rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900 -mt-48">
                        <div class="profile-pic text-center mb-5">
                            <input id="pro-img" name="profile-image" type="file" class="hidden"
                                onchange="loadFile(event)" />
                            <div>
                                <div class="relative size-24 mx-auto">
                                    @if(Auth::user()->profile_photo_path)
                                        <img src="{{ asset(Auth::user()->profile_photo_path) }}"
                                            class="rounded-full shadow-sm dark:shadow-gray-700 ring-4 ring-slate-50 dark:ring-slate-800"
                                            alt="{{ Auth::user()->name }}" id="profile-image" alt="">
                                    @else
                                        <img src="assets/images/client/05.jpg"
                                            class="rounded-full shadow-sm dark:shadow-gray-700 ring-4 ring-slate-50 dark:ring-slate-800"
                                            id="profile-image" alt="">
                                    @endif
                                    <label class="absolute inset-0 cursor-pointer" for="pro-img"></label>
                                </div>

                                <div class="mt-4">
                                    <h5 class="text-lg font-semibold">{{ auth()->user()->name }}</h5>
                                    <p class="text-slate-400">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="border-t border-gray-100 dark:border-gray-700">
                            <ul class="list-none sidebar-nav mb-0 mt-3" id="navmenu-nav">
                                <li class="navbar-item account-menu">
                                    <a href="profile.html"
                                        class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                        <span class="me-2 text-[18px] mb-0"><i class="uil uil-dashboard"></i></span>
                                        <h6 class="mb-0 font-semibold">Profile</h6>
                                    </a>
                                </li>

                                <li class="navbar-item account-menu">
                                    <a href="profile-billing.html"
                                        class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                        <span class="me-2 text-[18px] mb-0"><i class="uil uil-diary-alt"></i></span>
                                        <h6 class="mb-0 font-semibold">Billing Info</h6>
                                    </a>
                                </li>

                                <li class="navbar-item account-menu">
                                    <a href="profile-payment.html"
                                        class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                        <span class="me-2 text-[18px] mb-0"><i class="uil uil-credit-card"></i></span>
                                        <h6 class="mb-0 font-semibold">Payment</h6>
                                    </a>
                                </li>

                                <li class="navbar-item account-menu">
                                    <a href="profile-social.html"
                                        class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                        <span class="me-2 text-[18px] mb-0"><i class="uil uil-process"></i></span>
                                        <h6 class="mb-0 font-semibold">Social Profile</h6>
                                    </a>
                                </li>

                                <li class="navbar-item account-menu">
                                    <a href="profile-notification.html"
                                        class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                        <span class="me-2 text-[18px] mb-0"><i class="uil uil-bell"></i></span>
                                        <h6 class="mb-0 font-semibold">Notifications</h6>
                                    </a>
                                </li>

                                <li class="navbar-item account-menu">
                                    <a href="profile-setting.html"
                                        class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                        <span class="me-2 text-[18px] mb-0"><i class="uil uil-setting"></i></span>
                                        <h6 class="mb-0 font-semibold">Settings</h6>
                                    </a>
                                </li>

                                <li class="navbar-item account-menu">
                                    <a href="auth-lock-screen.html"
                                        class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                        <span class="me-2 text-[18px] mb-0"><i class="uil uil-power"></i></span>
                                        <h6 class="mb-0 font-semibold">Sign Out</h6>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>

                <div class="xl:col-span-9 lg:col-span-8 md:col-span-8 mt-6">
                    <div class="grid grid-cols-1 gap-6">
                        @include('profile.partials.update-profile-information-form')

                        <div class="p-6 relative rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
                            @include('profile.partials.update-password-form')
                        </div>

                        {{-- <div
                            class="p-6 relative rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
                            <h5 class="text-lg font-semibold mb-4 text-red-600">Delete Account :</h5>

                            <p class="text-slate-400 mb-4">Do you want to delete the account? Please press below
                                "Delete" button</p>

                            <a href=""
                                class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-700 border-blue-600 hover:border-blue-700 text-white rounded-md">Delete</a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- End Content -->
        </div>
    </div>
</x-app-layout>
