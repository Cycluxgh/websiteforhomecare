<x-frontend-layout>
    <section
        class="relative table w-full py-36 lg:py-44 bg-[url('../../assets/images/job/job.jpg')]  bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-slate-900 opacity-80"></div>
        <div class="container relative">
            <div class="grid grid-cols-1 pb-8 text-center mt-12">
                <h3 class="mb-4 md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">
                    {{ $jobPosting->job_title }}
                </h3>
                <ul class="list-none">
                    <li class="inline text-slate-400 me-3"><i class="uil uil-map-marker text-white h6 me-1"></i>
                        {{ $jobPosting->location ?? 'Location Not Specified' }} - <span
                            class="text-white">{{ $jobPosting->employment_type }}</span></li>
                </ul>
            </div>
        </div>
        <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
            <ul class="tracking-[0.5px] mb-0 inline-block">
                <li
                    class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
                    <a href="{{ route('home') }}">Website-For-Homecare</a>
                </li>
                <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i
                        class="uil uil-angle-right-b"></i></li>
                <li
                    class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
                    <a href="{{ route('home') }}">Job</a>
                </li>
                <li class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i
                        class="uil uil-angle-right-b"></i></li>
                <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white"
                    aria-current="page">Job Detail</li>
            </ul>
        </div>
    </section>
    <div class="relative">
        <div
            class="shape absolute sm:-bottom-px -bottom-[2px] start-0 end-0 overflow-hidden text-white dark:text-slate-900">
            <svg class="w-full h-auto scale-[2.0] origin-top" viewBox="0 0 2880 48" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>

    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid lg:grid-cols-12 grid-cols-1" id="reserve-form">
                <div class="lg:col-start-2 lg:col-span-10">
                    @if($jobPosting->job_description)
                        <h5 class="mb-4 font-bold text-xl">Description:</h5>
                        <p class="text-slate-400 mb-4" style="color: #252525;">{!! $jobPosting->job_description !!}</p>
                    @endif

                    @if($jobPosting->job_requirements)
                        <h5 class="mb-4 mt-6 font-bold text-xl">Requirements</h5>
                        @foreach(explode("\n", $jobPosting->job_requirements ?? '') as $requirement)
                            @if($requirement)
                                <p class="text-slate-400 mb-4" style="color: #252525;">{!! $requirement !!}</p>
                            @endif
                        @endforeach
                    @endif

                    <div class="mt-6">
                        <a href="{{ route('applications.create', $jobPosting->id) }}"
                            class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-950 border-blue-600 hover:border-blue-950 text-white rounded-md">Apply
                            now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>
