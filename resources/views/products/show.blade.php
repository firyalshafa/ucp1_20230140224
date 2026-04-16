<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Produk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Informasi Produk</h3>
                    <p class="text-gray-600 dark:text-gray-400">Berikut adalah rincian lengkap produk.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <span class="block text-sm text-gray-500">Nama Produk</span>
                        <span class="text-lg font-medium text-gray-900 dark:text-white">{{ $product->name }}</span>
                    </div>

                    <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <span class="block text-sm text-gray-500">Harga</span>
                        <span class="text-lg font-medium text-gray-900 dark:text-white">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    </div>

                    <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <span class="block text-sm text-gray-500">Jumlah Stok (Qty)</span>
                        <span class="text-lg font-medium text-gray-900 dark:text-white">{{ $product->quantity }} pcs</span>
                    </div>

                    <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <span class="block text-sm text-gray-500">Pemilik Produk</span>
                        <span class="text-lg font-medium text-gray-900 dark:text-white">{{ $product->user->name }}</span>
                    </div>
                </div>

                <div class="mt-6 flex space-x-3">
                    <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
                    
                    @can('update', $product)
                        <a href="{{ route('products.edit', $product) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit Produk</a>
                    @endcan
                </div>

            </div>
        </div>
    </div>
</x-app-layout>