<section class="relative md:py-24 py-16">
    <div class="container relative">
        <div class="grid lg:grid-cols-12 grid-cols-1" id="reserve-form">
            <div class="lg:col-start-2 lg:col-span-10">
                <div class="bg-white dark:bg-slate-900 border-0 shadow-sm dark:shadow-gray-800 rounded p-3 -mt-[150px]">
                    <form wire:submit.prevent="render">
                        <div class="relative text-slate-900 dark:text-slate-200 text-start">
                            <div
                                class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-6 lg:divide-x-2 lg:divide-gray-200 dark:lg:divide-gray-700">
                                <div class="relative lg:col-span-3">
                                    <i
                                        class="uil uil-briefcase-alt absolute top-1/2 -translate-y-1/2 start-3 z-1 text-blue-600 text-xl"></i>
                                    <input type="text" id="job-keyword"
                                        class="lg:rounded-t-sm lg:rounded-e-none lg:rounded-b-none lg:rounded-s-sm text-slate-400 lg:outline-0 w-full filter-input-box bg-gray-50 dark:bg-slate-800 border-0 focus:ring-0"
                                        placeholder="Search keywords" wire:model.live="searchKeyword">
                                </div>

                                <div class="relative">
                                    <button type="submit"
                                        class="w-full py-3 px-5 font-semibold tracking-wide text-center align-middle transition duration-500 text-base text-white bg-blue-600 hover:bg-blue-950 border border-blue-600 hover:border-blue-950 rounded-md">
                                        <i class="uil uil-search me-2"></i> Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container relative">
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
            @foreach ($jobPostings as $job)
                <div class="rounded-md shadow-sm dark:shadow-gray-800">
                    <div class="p-6">
                        <div class="flex items-center">
                            <a href="{{ route('job.detail', $job->id) }}"
                                class="title h5 text-lg font-semibold hover:text-blue-600">{{ $job->job_title }}</a>
                            @if ($job->job_category)
                                <span class="ms-2 text-slate-400 text-sm">({{ $job->job_category }})</span>
                            @endif
                        </div>
                        <p class="text-slate-400 mt-2">
                            <i class="uil uil-file-alt text-blue-600"></i> <b>Short Description:</b>
                            {!! substr($job->job_description, 0, 50) !!}
                            @if (strlen($job->job_description) > 50)
                                ...
                            @endif
                        </p>
                        <div class="flex justify-between items-center mt-4">
                            <span
                                class="bg-blue-600/5 text-blue-600 text-xs font-bold px-2.5 py-0.5 rounded h-5">{{ $job->employment_type }}</span>
                            <p class="text-slate-400"><i class="uil uil-usd-circle text-blue-600"></i> {{ $job->status }}
                            </p>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
        <div class="grid md:grid-cols-12 grid-cols-1 mt-8">
            <div class="md:col-span-12 text-center">
                <nav aria-label="Page navigation example">
                    <ul class="inline-flex items-center -space-x-px">
                        {{-- Previous Page Link --}}
                        @if ($jobPostings->onFirstPage())
                            <li>
                                <span
                                    class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-s-lg border border-gray-100 dark:border-gray-800 cursor-not-allowed">
                                    <i class="uil uil-angle-left text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="#" wire:click.prevent="previousPage" rel="prev"
                                    class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-s-lg hover:text-white border border-gray-100 dark:border-gray-800 hover:border-blue-600 dark:hover:border-blue-600 hover:bg-blue-600 dark:hover:bg-blue-600">
                                    <i class="uil uil-angle-left text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                                </a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($jobPostings->links()->elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li>
                                    <span
                                        class="size-[40px] inline-flex justify-center items-center text-slate-400 hover:text-white bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 cursor-not-allowed">
                                        {{ $element }}
                                    </span>
                                </li>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $jobPostings->currentPage())
                                        <li>
                                            <a href="#" aria-current="page"
                                                class="z-10 size-[40px] inline-flex justify-center items-center text-white bg-blue-600 border border-blue-600">
                                                {{ $page }}
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="#" wire:click.prevent="gotoPage({{ $page }})"
                                                class="size-[40px] inline-flex justify-center items-center text-slate-400 hover:text-white bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:border-blue-600 dark:hover:border-blue-600 hover:bg-blue-600 dark:hover:bg-blue-600">
                                                {{ $page }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($jobPostings->hasMorePages())
                            <li>
                                <a href="#" wire:click.prevent="nextPage" rel="next"
                                    class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-e-lg hover:text-white border border-gray-100 dark:border-gray-800 hover:border-blue-600 dark:hover:border-blue-600 hover:bg-blue-600 dark:hover:bg-blue-600">
                                    <i class="uil uil-angle-right text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                                </a>
                            </li>
                        @else
                            <li>
                                <span
                                    class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-e-lg border border-gray-100 dark:border-gray-800 cursor-not-allowed">
                                    <i class="uil uil-angle-right text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                                </span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
