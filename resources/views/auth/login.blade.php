<x-guest-layout>
    {{-- <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}

    <h5 class="my-6 text-xl font-semibold">Login</h5>
    <form method="POST" action="{{ route('login') }}" class="text-start">
        @csrf
        <div class="grid grid-cols-1">
            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-green-600 dark:text-green-400 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Email Address -->
            <div class="mb-4">
                <label class="font-semibold" for="LoginEmail">Email Address:</label>
                <input id="LoginEmail" name="email" type="email"
                    class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                    placeholder="name@example.com" value="{{ old('email') }}" required autofocus
                    autocomplete="username">
                @error('email')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="font-semibold" for="LoginPassword">Password:</label>
                <input id="LoginPassword" name="password" type="password"
                    class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                    placeholder="Password" required autocomplete="current-password">
                @error('password')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex justify-between mb-4">
                <div class="flex items-center mb-0">
                    <input id="RememberMe" name="remember" type="checkbox"
                        class="form-checkbox size-4 appearance-none rounded border border-gray-200 dark:border-gray-800 accent-blue-600 checked:appearance-auto dark:accent-blue-600 focus:border-blue-300 focus:ring-0 focus:ring-offset-0 focus:ring-blue-200 focus:ring-opacity-50 me-2">
                    <label class="form-checkbox-label text-slate-400" for="RememberMe">Remember me</label>
                </div>
                @if (Route::has('password.request'))
                    <p class="text-slate-400 mb-0">
                        <a href="{{ route('password.request') }}" class="text-slate-400">Forgot password?</a>
                    </p>
                @endif
            </div>

            <div class="mb-4">
                <button type="submit"
                    class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-950 border-blue-600 hover:border-blue-950 text-white rounded-md w-full">
                    Login / Sign in
                </button>
            </div>

            {{-- <div class="text-center">
                <span class="text-slate-400 me-2">Don't have an account?</span>
                <a href="{{ route('register') }}" class="text-slate-900 dark:text-white font-bold inline-block">Sign
                    Up</a>
            </div> --}}
        </div>
    </form>
</x-guest-layout>
