<x-app-layout>
<!-- Start -->
<section class="relative h-screen flex items-center justify-center text-center bg-gray-50 dark:bg-slate-800">
    <div class="container relative">
        <div class="grid grid-cols-1">
            <div class="title-heading text-center my-auto">
                <div class="size-24 bg-green-500/5 text-green-500 rounded-full text-5xl flex align-middle justify-center items-center shadow-xs dark:shadow-gray-700 mx-auto">
                    <i class="uil uil-check-circle"></i>
                </div>
                <h1 class="mt-6 mb-8 md:text-5xl text-3xl font-bold">Thank You!</h1>
                <p class="text-slate-400 max-w-xl mx-auto">Your responses have been successfully submitted. We appreciate your time and valuable feedback.</p>

                <div class="mt-6">
                    <a href="{{ route('home') }}" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600/5 hover:bg-blue-600 border-red-600/10 hover:border-red-600 text-indigo-600 hover:text-white rounded-md">Back to Home</a>
                </div>
            </div>
        </div></div></section><!--end section-->
<!-- End -->
</x-app-layout>
