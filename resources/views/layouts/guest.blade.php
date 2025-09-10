<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light scroll-smooth" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

       <!-- favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/website.png') }}">

<!-- Css -->
<!-- Main Css -->
<link href="{{ asset('frontend/assets/libs/@iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('frontend/assets/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/tailwind.css') }}">

    </head>

    <body class="text-base font-nunito text-slate-900 dark:text-white dark:bg-slate-900">
        <!-- Loader Start -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        <!-- Loader End -->

        <section class="md:h-screen py-36 flex items-center bg-[url('../../assets/images/cta.jpg')] bg-no-repeat bg-center bg-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-slate-900"></div>
            <div class="container relative">
                <div class="flex justify-center">
                    <div class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-800 rounded-md">
                        <a href="/"><img src="{{ asset('frontend/assets/images/auth-page.png') }}" class="mx-auto" alt="" width="70%"></a>
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </section><!--end section -->

        <div class="fixed bottom-3 end-3">
            <a href="{{ route('home') }}" class="inline-flex justify-center items-center text-base tracking-wide text-center text-white align-middle bg-blue-600 rounded-full border border-blue-600 duration-500 back-button size-9 hover:bg-blue-950 hover:border-blue-950"><i data-feather="arrow-left" class="size-4"></i></a>
        </div>

        <!-- JAVASCRIPTS -->
<script src="{{ asset('frontend/assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins.init.js') }}"></script>
<script src="{{ asset('frontend/assets/js/app.js') }}"></script>
<!-- JAVASCRIPTS -->
    </body>
</html>
