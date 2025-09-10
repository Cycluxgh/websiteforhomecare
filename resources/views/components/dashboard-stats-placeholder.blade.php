<div class="grid xl:grid-cols-5 md:grid-cols-3 grid-cols-1 mt-6 gap-6">
    @foreach(range(1, 5) as $i)
        <div class="relative overflow-hidden rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
            <div class="p-5 flex items-center">
                <span class="flex justify-center items-center rounded-md size-14 min-w-[56px] bg-gray-200 dark:bg-gray-700 animate-pulse"></span>

                <span class="ms-3 w-full">
                    <span class="text-slate-400 font-semibold block h-4 w-1/2 bg-gray-200 dark:bg-gray-700 rounded animate-pulse"></span>
                    <span class="flex items-center justify-between mt-1">
                        <span class="text-xl font-semibold h-6 w-1/3 bg-gray-200 dark:bg-gray-700 rounded animate-pulse"></span>
                        <span class="h-4 w-1/4 bg-gray-200 dark:bg-gray-700 rounded animate-pulse"></span>
                    </span>
                </span>
            </div>

            <div class="px-5 py-4 bg-gray-50 dark:bg-slate-800">
                <span class="h-4 w-1/3 bg-gray-200 dark:bg-gray-700 rounded animate-pulse"></span>
            </div>
        </div>
    @endforeach
</div>
