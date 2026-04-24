<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 tracking-tight">
                    Product Detail
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Viewing product #{{ $product->id }}</p>
            </div>
            
            <div class="flex items-center gap-3">
                {{-- Tombol Edit: Hanya muncul jika User adalah Admin --}}
                @can('update', $product)
                    <x-edit-button :url="route('products.edit', $product)" />
                @endcan

                {{-- Tombol Delete: Hanya muncul jika User adalah Admin --}}
                @can('delete', $product)
                    <x-delete-button :url="route('products.destroy', $product)" />
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl border border-gray-200 dark:border-gray-700">
                
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Product Name</div>
                        <div class="md:col-span-2 text-lg font-bold text-gray-900 dark:text-white uppercase tracking-wide">
                            {{ $product->name }}
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6 items-center">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Quantity</div>
                        <div class="md:col-span-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400">
                                {{ $product->quantity }} In Stock
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Price</div>
                        <div class="md:col-span-2 text-lg font-semibold text-gray-900 dark:text-white">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6 items-center">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Owner</div>
                        <div class="md:col-span-2 flex items-center gap-2">
                            <div class="h-8 w-8 rounded-full bg-indigo-500 flex items-center justify-center text-white text-xs font-bold">
                                {{ substr($product->user->name, 0, 1) }}
                            </div>
                            <span class="text-gray-900 dark:text-white font-medium">{{ $product->user->name }}</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-6">
                        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Created At</div>
                        <div class="md:col-span-2 text-gray-700 dark:text-gray-300">
                            {{ $product->created_at->format('d M Y, H:i') }}
                        </div>
                    </div>

                </div>

                <div class="bg-gray-50 dark:bg-gray-800/50 p-6 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('products.index') }}" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Product List
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>