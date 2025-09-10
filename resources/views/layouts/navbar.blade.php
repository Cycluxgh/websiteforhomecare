<nav id="topnav" class="defaultscroll is-sticky !bg-white dark:!bg-slate-900">
    <div class="container relative">
        <a class="logo" href="/">
            <img src=" {{ asset('frontend/assets/images/websiteforhomecare.png') }}" class="inline-block dark:hidden" alt=""
                style="width: 140px;">
            <img src="{{ asset('frontend/assets/images/websiteforhomecare.png') }}" class="hidden dark:inline-block" alt=""
                style="width: 140px;">
        </a>

        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>

        <ul class="mb-0 list-none buy-button">

            @auth
            @if(auth()->user()->role === 'employee')
            <li class="inline mb-0">
                <a href="{{ route('employee.dashboard') }}"
                    class="inline-flex justify-center items-center text-base tracking-wide text-center text-indigo-600 align-middle rounded-full border duration-500 size-9 bg-blue-600/5 hover:bg-blue-600 border-red-600/10 hover:border-red-600 hover:text-white"
                    title="Dashboard">
                    <i data-feather="user" class="size-4"></i>
                </a>
            </li>
            @elseif(auth()->user()->role === 'admin' || auth()->user()->role === 'super_admin')
            <li class="inline mb-0">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex justify-center items-center text-base tracking-wide text-center text-indigo-600 align-middle rounded-full border duration-500 size-9 bg-blue-600/5 hover:bg-blue-600 border-red-600/10 hover:border-red-600 hover:text-white"
                    title="Dashboard">
                    <i data-feather="user" class="size-4"></i>
                </a>
            </li>
            @endif
            @else
            <li class="inline mb-0">
                <a href="{{ route('login') }}"
                    class="inline-flex justify-center items-center text-base tracking-wide text-center text-indigo-600 align-middle rounded-full border duration-500 size-9 bg-blue-600/5 hover:bg-blue-600 border-red-600/10 hover:border-red-600 hover:text-white"
                    title="Login">
                    <i data-feather="user-plus" class="size-4"></i>
                </a>
            </li>
            @endauth

            {{-- <li class="inline mb-0" id="pwa-install-button-container">
                <button id="pwa-install-button"
                    class="inline-flex justify-center items-center text-base tracking-wide text-center text-green-600 align-middle rounded-full border duration-500 size-9 bg-green-600/5 hover:bg-green-600 border-green-600/10 hover:border-green-600 hover:text-white"
                    title="Install App">
                    <i data-feather="download" class="size-4"></i>
                </button>
            </li> --}}
        </ul>
        <div id="navigation">
            <ul class="navigation-menu">
                <li><a href="#" class="sub-menu-item">Home</a></li>
                <li class="active"><a href="{{ route('home') }}" class="sub-menu-item active">Job Listing</a></li>
            </ul>
        </div>
    </div>
</nav>