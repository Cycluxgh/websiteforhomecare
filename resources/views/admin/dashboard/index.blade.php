<x-app-layout>
    <div class="container-fluid relative px-3">
        <div class="layout-specing">
            <!-- Start Content -->
            <div class="flex justify-between items-center">
                <div>
                    @php
                        $hour = now()->hour;
                        if ($hour < 12) {
                            $greeting = 'Good morning';
                        } elseif ($hour < 18) {
                            $greeting = 'Good afternoon';
                        } else {
                            $greeting = 'Good evening';
                        }
                    @endphp
                    <h5 class="text-xl font-bold">{{ $greeting }}, {{ Auth::user()->name }}</h5>
                    <h6 class="text-slate-400 font-semibold">We hope you have a productive day!</h6>
                </div>

            </div>

            <livewire:dashboard-stats />

            <livewire:dashboard-tables />
            <!-- End Content -->
        </div>
    </div><!--end container-->


</x-app-layout>
