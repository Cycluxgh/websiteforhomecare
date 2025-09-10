<div class="grid lg:grid-cols-12 grid-cols-1 mt-6 gap-6">
    @foreach(range(1, 3) as $table)
        <div class="xl:col-span-4 lg:col-span-12">
            <div class="relative overflow-hidden rounded-md shadow-sm dark:shadow-gray-700 bg-white dark:bg-slate-900">
                <div class="p-6 flex items-center justify-between border-b border-gray-100 dark:border-gray-800">
                    <h6 class="text-lg font-semibold h-6 w-1/3 bg-gray-200 dark:bg-gray-700 rounded animate-pulse"></h6>
                    <span class="h-4 w-1/4 bg-gray-200 dark:bg-gray-700 rounded animate-pulse"></span>
                </div>

                <div class="relative overflow-x-auto block w-full max-h-[400px]" data-simplebar>
                    <table class="w-full text-start">
                        <thead class="text-base">
                            <tr>
                                @foreach(range(1, 3) as $header)
                                    <th class="text-start font-semibold text-[15px] p-4 min-w-[128px]">
                                        <span class="h-4 w-3/4 bg-gray-200 dark:bg-gray-700 rounded animate-pulse block"></span>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(range(1, 5) as $row)
                                <tr>
                                    @foreach(range(1, 3) as $cell)
                                        <td class="text-start border-t border-gray-100 dark:border-gray-800 p-4">
                                            <span class="h-4 w-full bg-gray-200 dark:bg-gray-700 rounded animate-pulse block"></span>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
</div>
