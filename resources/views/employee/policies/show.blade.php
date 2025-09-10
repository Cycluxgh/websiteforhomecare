<x-app-layout>
    <div class="container-fluid relative px-3 no-copy">
        <div class="layout-specing">
            <div class="md:flex justify-between items-center">
                <h5 class="text-lg font-semibold">Policy Details</h5>
                <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                    <li
                        class="inline-block capitalize text-[14px] font-bold duration-500 dark:text-white/70 hover:text-blue-600 dark:hover:text-white">
                        <a href="{{ route('ourPolicies') }}">Policies</a>
                    </li>
                    <li
                        class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                        <i class="uil uil-angle-right-b"></i>
                    </li>
                    <li class="inline-block capitalize text-[14px] font-bold text-blue-600 dark:text-white"
                        aria-current="page">
                        Policy Details
                    </li>
                </ul>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('info'))
                <div class="bg-blue-100 border border-blue-400 text-blue-950 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Heads up!</strong>
                    <span class="block sm:inline">{{ session('info') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="container relative mt-6">
                <div class="md:flex justify-center">
                    <div class="lg:w-4/5 w-full">
                        <div class="p-6 bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md">
                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5 mb-6">
                                <div>
                                    <label class="form-label font-medium">Title:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="file-text" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $policy->title }}
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label font-medium">Status:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $policy->status === 'published' ? 'check-circle' : 'x-circle' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ ucfirst($policy->status) }}
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label font-medium">Effective Date:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $policy->formatted_effective_date }}
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label font-medium">Expiry Date:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="calendar" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $policy->expiry_date ? $policy->expiry_date->format('jS F Y') : 'N/A' }}
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label font-medium">Featured Policy:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="{{ $policy->is_featured ? 'star' : 'star-off' }}"
                                            class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $policy->is_featured ? 'Yes' : 'No' }}
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="form-label font-medium">Created By:</label>
                                    <div class="form-icon relative mt-2">
                                        <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                        <div
                                            class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 dark:border-gray-800">
                                            {{ $policy->user->name }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-6">
                                <label class="form-label font-medium">Description:</label>
                                <div class="mt-2 p-4 bg-gray-50 dark:bg-slate-800 rounded-md">
                                    {{ $policy->description }}
                                </div>
                            </div>

                            <div class="mb-6">
                                <label class="form-label font-medium">Content:</label>
                                <div
                                    class="mt-2 p-4 bg-gray-50 dark:bg-slate-800 rounded-md prose dark:prose-invert max-w-none">
                                    {!! $policy->content !!}
                                </div>
                            </div>

                            @if($policy->pdf_path)
                                <div class="mb-6">
                                    <label class="form-label font-medium">PDF Document:</label>
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/' . $policy->pdf_path) }}" target="_blank"
                                            class="inline-flex items-center text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                            <i data-feather="file" class="size-4 mr-2"></i>
                                            View PDF Document
                                        </a>
                                    </div>
                                </div>
                            @endif

                            {{-- New Consent Section --}}
                            @auth
                                @if(auth()->user()->role === 'employee' && !$policy->has_consented)
                                    <hr class="my-6 border-gray-200 dark:border-gray-700">
                                    <div class="mb-6 mt-5">
                                        <h4 class="text-xl font-semibold mb-4">Policy Acknowledgment</h4>
                                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                                            By clicking the button below, you confirm that you have read, understood, and agree
                                            to the terms and conditions of this policy.
                                        </p>
                                        <form action="{{ route('policies.consent', $policy) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center rounded-md bg-blue-600 hover:bg-blue-950 border-blue-600 hover:border-blue-950 text-white">
                                                I Have Read and Agree to this Policy
                                            </button>
                                        </form>
                                    </div>
                                @elseif(auth()->user()->role === 'employee' && $policy->has_consented)
                                    <hr class="my-6 border-gray-200 dark:border-gray-700">
                                    <div class="mb-6 text-green-600 dark:text-green-400 flex items-center mt-5">
                                        <i data-feather="check-circle" class="size-5 mr-2"></i>
                                        You have already acknowledged this policy.
                                    </div>
                                @endif
                            @endauth
                            {{-- End New Consent Section --}}

                            <div class="flex justify-end mt-6">
                                <a href="{{ route('ourPolicies') }}"
                                    class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-gray-800 hover:bg-gray-950 border-gray-800 hover:border-gray-950 text-white rounded-md">
                                    Back to Policies
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Prevent context menu (already implemented)
        document.addEventListener('contextmenu', event => event.preventDefault());

        // Prevent text selection
        document.addEventListener('selectstart', event => event.preventDefault());

        // Disable common keyboard shortcuts (e.g., Ctrl+S, Ctrl+P, Ctrl+C)
        document.addEventListener('keydown', function(event) {
            if (event.ctrlKey && ['s', 'p', 'c', 'u'].includes(event.key.toLowerCase())) {
                event.preventDefault();
                alert('This action is disabled to protect policy content.');
            }
        });

        // Add dynamic watermark (if user is authenticated)
        @auth
            const userInfo = {
                name: '{{ auth()->user()->name }}',
                id: '{{ auth()->user()->id }}',
                timestamp: new Date().toISOString()
            };

            function addWatermark() {
                const watermark = document.createElement('div');
                watermark.style.position = 'fixed';
                watermark.style.top = '0';
                watermark.style.left = '0';
                watermark.style.width = '100%';
                watermark.style.height = '100%';
                watermark.style.pointerEvents = 'none';
                watermark.style.opacity = '0.1';
                watermark.style.color = '#000';
                watermark.style.fontSize = '16px';
                watermark.style.textAlign = 'center';
                watermark.style.display = 'flex';
                watermark.style.alignItems = 'center';
                watermark.style.justifyContent = 'center';
                watermark.style.zIndex = '9999';
                watermark.style.background = 'repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(0,0,0,0.05) 10px, rgba(0,0,0,0.05) 20px)';
                watermark.innerText = `Policy Document - ${userInfo.name} (ID: ${userInfo.id}) - ${userInfo.timestamp}`;
                document.body.appendChild(watermark);
            }

            window.onload = addWatermark;
        @endauth

        // Optional: Detect DevTools (unreliable, can be bypassed)
        function detectDevTools() {
            const threshold = 160;
            const widthThreshold = window.outerWidth - window.innerWidth > threshold;
            const heightThreshold = window.outerHeight - window.innerHeight > threshold;
            if (widthThreshold || heightThreshold) {
                alert('Developer tools detected. Access to this page may be restricted.');
                Optionally redirect: window.location.href = '{{ route('ourPolicies') }}';
            }
        }

        setInterval(detectDevTools, 1000);
    </script>

    <style>
        /* Prevent text selection */
        body {
            -webkit-user-select: none; /* Safari */
            -moz-user-select: none; /* Firefox */
            -ms-user-select: none; /* IE10+/Edge */
            user-select: none; /* Standard */
        }

        /* Optional: Add subtle overlay to deter scraping */
        .no-copy::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            background: transparent;
            z-index: 9998;
        }
    </style>
@endpush
</x-app-layout>
