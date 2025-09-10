<x-guest-layout>
    <h5 class="my-6 text-xl font-semibold">Reset Your Password</h5>
<div class="grid grid-cols-1">
    <!-- Status Message -->
    @if (session('status'))
        <div class="mb-4 text-green-600 dark:text-green-400 text-sm">
            {{ session('status') }}
        </div>
    @endif

    <p class="text-slate-400 mb-6">
        {{ __('Please enter your email address. You will receive a link to create a new password via email.') }}
    </p>

    <form method="POST" action="{{ route('password.email') }}" class="text-start">
        @csrf
        <div class="grid grid-cols-1">
            <!-- Email Address -->
            <div class="mb-4">
                <label class="font-semibold" for="LoginEmail">Email Address:</label>
                <input id="LoginEmail" name="email" type="email"
                       class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-red-600 dark:border-gray-800 dark:focus:border-red-600 focus:ring-0"
                       placeholder="name@example.com"
                       value="{{ old('email') }}"
                       required
                       autofocus>
                @error('email')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <button type="submit" class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-950 border-blue-600 hover:border-blue-950 text-white rounded-md w-full">
                    {{ __('Send Reset Link') }}
                </button>
            </div>

            <div class="text-center">
                <span class="text-slate-400 me-2">Remember your password?</span>
                <a href="{{ route('login') }}" class="text-slate-900 dark:text-white font-bold inline-block">Sign in</a>
            </div>
        </div>
    </form>
</div>
</x-guest-layout>
