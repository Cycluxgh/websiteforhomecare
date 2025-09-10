<div class="container relative">
    <div class="grid grid-cols-1 pb-8 text-center">
        <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Popular Jobs</h3>
        <p class="text-slate-400 max-w-xl mx-auto">Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p>
    </div><div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
        @foreach ($popularJobs as $job)
        <div class="rounded-md shadow-sm dark:shadow-gray-800">
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <a href="{{ route('job.detail', $job->id) }}" class="title h5 text-lg font-semibold hover:text-indigo-600">{{ $job->job_title }}</a>
                    <p class="text-slate-400 text-sm"><i class="uil uil-briefcase-alt text-indigo-600 ms-2"></i> {{ $job->job_category }}</p>
                </div>
                <p class="text-slate-400 mt-2"><i class="uil uil-clock text-indigo-600"></i> Posted {{ $job->created_at->diffForHumans() }}</p>
                <div class="flex justify-between items-center mt-4">
                    <span class="bg-blue-600/5 text-indigo-600 text-xs font-bold px-2.5 py-0.5 rounded h-5">{{ $job->employment_type }}</span>
                    <p class="text-slate-400"><i class="uil uil-usd-circle text-indigo-600"></i> {{ $job->salary_range ?? 'Negotiable' }}</p>
                </div>
            {{-- </div>
            <div class="flex items-center p-6 border-t border-gray-100 dark:border-gray-800">
                <img src="{{ asset('frontend/assets/images/client/facebook-logo-2019.png') }}" class="size-12 shadow-md dark:shadow-gray-800 rounded-md p-2 bg-white dark:bg-slate-900" alt="">
                <div class="ms-3">
                    <h6 class="mb-0 font-semibold text-base">{{ $job->creator->name ?? 'Company Name' }}</h6>
                    <span class="text-slate-400 text-sm">{{ $job->location ?? 'Location' }}</span>
                </div>
            </div> --}}
        </div>
        @endforeach
    </div><div class="grid md:grid-cols-12 grid-cols-1 mt-8">
        <div class="md:col-span-12 text-center">
            <a href="{{ route('jobs.all') }}" class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 text-slate-400 hover:text-indigo-600 after:bg-blue-600 duration-500 ease-in-out">See More Jobs <i class="uil uil-arrow-right align-middle"></i></a>
        </div>
    </div></div>
