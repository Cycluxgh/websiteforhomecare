<!-- Top Header -->
<div class="top-header">
    <div class="flex justify-between header-bar">
        <div class="flex items-center space-x-1">
            <!-- Logo -->
            <a href="#" class="block xl:hidden me-2">
                <!-- <img src=" {{ asset('assets/images/logo-icon-64.png') }}" class="block md:hidden" alt="" width="30%"> -->
                 <img src=" {{ asset('assets/images/logo-icon-32.png') }}" class="block md:hidden" alt="">
                 <!-- <span class="hidden md:block">
                    <img src=" {{ asset('assets/images/logo-dark.png') }}" class="inline-block dark:hidden" alt="">
                    <img src="{{ asset('assets/images/logo-light.png') }}" class="hidden dark:inline-block" alt="">
                </span> -->
            </a>
            <!-- Logo -->

            <!-- show or close sidebar -->
            <a id="close-sidebar"
                class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[20px] text-center bg-gray-50 dark:bg-slate-800 hover:bg-gray-100 dark:hover:bg-slate-700 border border-gray-100 dark:border-gray-800 text-slate-900 dark:text-white rounded-full"
                href="javascript:void(0)">
                <i data-feather="menu" class="size-4"></i>
            </a>
            <!-- show or close sidebar -->

            <!-- Searchbar -->
            {{-- <div class="ps-1.5">
                <div class="hidden relative form-icon sm:block">
                    <i class="absolute top-1/2 -translate-y-1/2 uil uil-search start-3"></i>
                    <input type="text"
                        class="px-3 py-2 w-56 h-8 bg-transparent rounded-3xl border border-gray-100 outline-none form-input ps-9 dark:bg-slate-900 dark:text-slate-200 dark:border-gray-800 focus:ring-0"
                        name="s" id="searchItem" placeholder="Search...">
                </div>
            </div> --}}
            <!-- Searchbar -->
        </div>

        <ul class="mb-0 space-x-1 list-none">
            <!-- User/Profile Dropdown -->
            @auth
                <li class="inline-block relative dropdown">
                    <button data-dropdown-toggle="dropdown" class="items-center dropdown-toggle" type="button">
                        <span
                            class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-[20px] text-center bg-gray-50 dark:bg-slate-800 hover:bg-gray-100 dark:hover:bg-slate-700 border border-gray-100 dark:border-gray-800 text-slate-900 dark:text-white rounded-full">
                            @if(Auth::user()->profile_photo_path)
                                <img src="{{ asset(Auth::user()->profile_photo_path) }}" class="rounded-full"
                                    alt="{{ Auth::user()->name }}">
                            @else
                                <span class="text-sm">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                            @endif
                        </span>
                        <span class="font-semibold text-[16px] ms-1 sm:inline-block hidden">{{ Auth::user()->name }}</span>
                    </button>

                    <!-- Dropdown menu -->
                    <div class="hidden overflow-hidden absolute z-10 m-0 mt-4 w-44 bg-white rounded-md shadow-sm dropdown-menu end-0 dark:bg-slate-900 dark:shadow-gray-700"
                        onclick="event.stopPropagation();">
                        <ul class="py-2 text-start">
                            <li>
                                <a href="{{ route('profile.edit') }}"
                                    class="block px-4 py-1 font-medium dark:text-white/70 hover:text-indigo-600 dark:hover:text-white">
                                    <i class="uil uil-user me-2"></i>Profile
                                </a>
                            </li>
                            <li class="my-2 border-t border-gray-100 dark:border-gray-800"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        class="block px-4 py-1 font-medium dark:text-white/70 hover:text-indigo-600 dark:hover:text-white"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="uil uil-sign-out-alt me-2"></i>Logout
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            @endauth
            <!--end dropdown-->
            <!-- User/Profile Dropdown -->
        </ul>
    </div>
</div>
<!-- Top Header -->
