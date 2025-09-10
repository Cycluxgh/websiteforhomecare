<x-app-layout>
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Job Policies</h5>

                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li
                        class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white">
                        <a href="/">Website-For-Homecare</a>
                    </li>
                    <li
                        class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="uil uil-angle-right-b"></i>
                    </li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white"
                        aria-current="page">Job Policies</li>
                </ul>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 mt-6 gap-6">
                @forelse ($policies as $policy)
                    <div
                        class="relative rounded-md shadow-sm dark:shadow-gray-700 overflow-hidden bg-white dark:bg-slate-900 h-full flex flex-col {{ $policy->is_featured ? 'bg-gradient-to-br from-amber-50 to-amber-200 dark:from-amber-900/30 dark:to-amber-900/50' : '' }}">
                        <div class="content p-6 flex flex-col flex-grow">
                            <div>
                                <a href="{{ route('admin.policies.show', $policy->slug) }}"
                                    class="title h5 text-lg font-medium hover:text-blue-600 duration-500">{{ $policy->title }}</a>
                                <p class="text-slate-400 mt-3">
                                    {{ Str::limit($policy->description, 100) }}
                                </p>
                            </div>


                            <div class="mt-3 flex flex-wrap gap-2">
                                @if($policy->is_featured)
                                    <span
                                        class="px-2 py-1 text-xs font-semibold bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 rounded-full">
                                        Featured
                                    </span>
                                @endif
                                <span
                                    class="px-2 py-1 text-xs font-semibold {{ $policy->status === 'published' ? 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200' : ($policy->status === 'draft' ? 'bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200' : 'bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200') }} rounded-full">
                                    {{ ucfirst($policy->status) }}
                                </span>
                            </div>


                            <div class="flex-grow"></div>


                            <div
                                class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-between items-center">
                                <div class="flex items-center space-x-4">
                                    <a href="{{ route('admin.policies.show', $policy->slug) }}"
                                        class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-normal hover:text-blue-600 after:bg-blue-600 duration-500">
                                        Read More <i class="uil uil-arrow-right"></i>
                                    </a>
                                    {{-- @if($policy->pdf_path)
                                    <a href="{{ asset( $policy->pdf_path) }}" target="_blank"
                                        class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 flex items-center"
                                        title="Download PDF">
                                        <i data-feather="download" class="size-4 mr-1"></i> PDF
                                    </a>
                                    @endif --}}
                                </div>
                                @auth
                                    @unless(auth()->user()->role === 'employee')
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.policies.edit', $policy->slug) }}"
                                                class="p-2 bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-300 rounded-full hover:bg-blue-200 dark:hover:bg-blue-800 transition-colors duration-200"
                                                title="Edit Policy">
                                                <i data-feather="edit" class="size-4"></i>
                                            </a>
                                            <form action="{{ route('admin.policies.destroy', $policy->id) }}" method="POST"
                                                class="inline" id="delete-policy-{{ $policy->slug }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="p-2 bg-red-100 dark:bg-red-900/50 text-red-600 dark:text-red-300 rounded-full hover:bg-red-200 dark:hover:bg-red-800 transition-colors duration-200"
                                                    title="Delete Policy"
                                                    onclick="confirmDelete('delete-policy-{{ $policy->slug }}')">
                                                    <i data-feather="trash-2" class="size-4"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endunless
                                @endauth
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-500 dark:text-gray-400">No policies found.</p>
                    </div>
                @endforelse
            </div><!--end grid-->

            <div class="flex justify-end mt-6">
                <nav aria-label="Page navigation example">
                    @if ($policies->hasPages())
                        <ul class="inline-flex items-center -space-x-px mt-6">
                            @if ($policies->onFirstPage())
                                <li>
                                    <span
                                        class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-s-lg border border-gray-100 dark:border-gray-700 cursor-default">
                                        <i class="uil uil-angle-left text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                                    </span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $policies->previousPageUrl() }}"
                                        class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-s-lg hover:text-white border border-gray-100 dark:border-gray-700 hover:border-red-600 dark:hover:border-red-600 hover:bg-blue-600 dark:hover:bg-blue-600">
                                        <i class="uil uil-angle-left text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                                    </a>
                                </li>
                            @endif

                            @foreach ($policies->getUrlRange(1, $policies->lastPage()) as $page => $url)
                                <li>
                                    <a href="{{ $url }}"
                                        class="size-[40px] inline-flex justify-center items-center {{ $page == $policies->currentPage() ? 'z-10 text-white bg-blue-600 border border-red-600' : 'text-slate-400 hover:text-white bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-700 hover:border-red-600 dark:hover:border-red-600 hover:bg-blue-600 dark:hover:bg-blue-600' }}"
                                        aria-current="{{ $page == $policies->currentPage() ? 'page' : null }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endforeach

                            @if ($policies->hasMorePages())
                                <li>
                                    <a href="{{ $policies->nextPageUrl() }}"
                                        class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-e-lg hover:text-white border border-gray-100 dark:border-gray-700 hover:border-red-600 dark:hover:border-red-600 hover:bg-blue-600 dark:hover:bg-blue-600">
                                        <i class="uil uil-angle-right text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                                    </a>
                                </li>
                            @else
                                <li>
                                    <span
                                        class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-e-lg border border-gray-100 dark:border-gray-700 cursor-default">
                                        <i class="uil uil-angle-right text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                                    </span>
                                </li>
                            @endif
                        </ul>
                    @endif
                </nav>
            </div>
            <!-- End Content -->
        </div>
    </div><!--end container-->
</x-app-layout>

<script>
    function confirmDelete(formId) {
        if (confirm('Are you sure you want to delete this policy?')) {
            document.getElementById(formId).submit();
        }
    }
</script>
