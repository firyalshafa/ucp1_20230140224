<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Produk: ') }} <span class="text-blue-500">{{ $product->name }}</span>
            </h2>
            <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm shadow-sm transition">
                &larr; Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                <form action="{{ route('products.update', $product) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Produk</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" 
                               class="w-full rounded-md border-gray-300 dark:bg-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500 @error('name') border-red-500 @enderror">
                        @error('name') 
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="qty" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jumlah (Qty)</label>
                        <input type="number" name="qty" id="qty" value="{{ old('qty', $product->qty) }}" 
                               class="w-full rounded-md border-gray-300 dark:bg-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500 @error('qty') border-red-500 @enderror">
                        @error('qty') 
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Harga (Rp)</label>
                        <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" 
                               class="w-full rounded-md border-gray-300 dark:bg-gray-900 dark:text-white focus:border-blue-500 focus:ring-blue-500 @error('price') border-red-500 @enderror">
                        @error('price') 
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                        @enderror
                    </div>

                    <div class="flex justify-end items-center space-x-4 border-t border-gray-100 dark:border-gray-700 pt-6">
                        <a href="{{ route('products.index') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">
                            Batal
                        </a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-md shadow-md transition duration-150 ease-in-out">
                            Update Produk
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>