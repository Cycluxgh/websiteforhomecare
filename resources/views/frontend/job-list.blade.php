<x-frontend-layout>
    <!-- Start Hero -->
    <section
        class="relative table w-full py-36 lg:py-44 bg-[url('../../assets/images/job/job.jpg')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 opacity-80 bg-slate-900"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 mt-10 text-center">
                <h3 class="mb-4 text-3xl font-medium leading-normal text-white md:text-4xl md:leading-normal">Job
                    Listings</h3>

                <ul class="tracking-[0.5px] mb-0 inline-block">
                    <li
                        class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
                        <a href="{{ route('home') }}">{{ config('app.name') }}</a>
                    </li>

                    <li class="inline-block mx-0.5 text-base text-white/50 ltr:rotate-0 rtl:rotate-180"><i
                            class="uil uil-angle-right-b"></i></li>
                    <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white"
                        aria-current="page">All Jobs</li>
                </ul>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <div class="relative">
        <div
            class="shape absolute sm:-bottom-px -bottom-[2px] start-0 end-0 overflow-hidden text-white dark:text-slate-900">
            <svg class="w-full h-auto scale-[2.0] origin-top" viewBox="0 0 2880 48" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- End Hero -->


    <livewire:job-list />


</x-frontend-layout>
