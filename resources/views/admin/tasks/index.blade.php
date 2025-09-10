<x-app-layout>
    <div class="layout-specing">
        <div class="md:flex justify-between items-center">
            <h5 class="text-lg font-semibold">Task Categories</h5>
            <div>
                <a href="{{ route('tasks.categories.create') }}"
                    class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-950 border-blue-600 hover:border-blue-950 text-white rounded-md">
                    Add Task Category
                </a>
                <a href="{{ route('tasks.items.create') }}"
                    class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-blue-600 hover:bg-blue-950 border-blue-600 hover:border-blue-950 text-white rounded-md ms-2">
                    Add Task Item
                </a>
            </div>
        </div>

        <div class="mt-6">
            @foreach ($taskCategories as $category)
                <div class="p-6 bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-700 rounded-md mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="text-lg font-semibold">{{ $category->name }}</h3>
                        <div class="flex space-x-2">
                            <a href="{{ route('tasks.categories.edit', $category) }}"
                                class="py-1 px-3 text-sm inline-block font-semibold tracking-wide border align-middle duration-500 text-center bg-yellow-500 hover:bg-yellow-600 border-yellow-500 hover:border-yellow-600 text-white rounded-md">
                                Edit Category
                            </a>
                            <form action="{{ route('tasks.categories.destroy', $category) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this category and its items?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="py-1 px-3 text-sm inline-block font-semibold tracking-wide border align-middle duration-500 text-center bg-red-600 hover:bg-red-700 border-red-600 hover:border-red-700 text-white rounded-md">
                                    Delete Category
                                </button>
                            </form>
                        </div>
                    </div>
                    <p class="text-gray-500 dark:text-gray-400 mb-4">
                        {{ $category->description ?? 'No description available' }}</p>
                    @if ($category->taskItems->isNotEmpty())
                        <ul class="list-disc pl-5">
                            @foreach ($category->taskItems as $item)
                                <li class="flex justify-between items-center mb-1">
                                    <span>{{ $item->name }}: {{ $item->description ?? 'No description' }}</span>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('tasks.items.edit', $item) }}"
                                            class="py-1 px-3 text-xs inline-block font-semibold tracking-wide border align-middle duration-500 text-center bg-yellow-500 hover:bg-yellow-600 border-yellow-500 hover:border-yellow-600 text-white rounded-md">
                                            Edit Item
                                        </a>
                                        <form action="{{ route('tasks.items.destroy', $item) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this task item?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="py-1 px-3 text-xs inline-block font-semibold tracking-wide border align-middle duration-500 text-center bg-red-600 hover:bg-red-700 border-red-600 hover:border-red-700 text-white rounded-md">
                                                Delete Item
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 dark:text-gray-400">No task items in this category.</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <div class="fixed-alert-container">
        @if (session('success'))
            <div class="relative px-4 py-2 rounded-md font-medium bg-emerald-600/10 border border-emerald-600/10 text-emerald-600 shadow-lg alert-auto-dismiss"
                role="alert" data-duration="5000">
                <i class="uil uil-check-circle me-1"></i>
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="relative px-4 py-2 rounded-md font-medium bg-red-600/10 border border-red-600/10 text-red-600 shadow-lg alert-auto-dismiss"
                role="alert" data-duration="5000">
                <i class="uil uil-exclamation-octagon me-1"></i>
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="relative px-4 py-2 rounded-md font-medium bg-red-600/10 border border-red-600/10 text-red-600 shadow-lg alert-auto-dismiss"
                role="alert" data-duration="5000">
                <i class="uil uil-exclamation-triangle me-1"></i>
                <strong class="font-bold">Validation Error!</strong>
                <ul class="mt-1 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const alerts = document.querySelectorAll('.alert-auto-dismiss');
                alerts.forEach(alert => {
                    const duration = parseInt(alert.getAttribute('data-duration')) || 5000;

                    setTimeout(() => {
                        alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                        alert.style.opacity = '0';
                        alert.style.transform = 'translateX(100%)';

                        setTimeout(() => {
                            alert.remove();
                        }, 500);
                    }, duration);
                });
            });
        </script>
    @endpush
</x-app-layout>
