<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Produk Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                
                {{-- Pesan Error Umum (Jika ada error dari try-catch) --}}
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Nama Produk</label>
                        <input type="text" name="name" value="{{ old('name') }}" 
                               class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Jumlah (Qty)</label>
                        <input type="number" name="quantity" value="{{ old('quantity') }}" 
                               class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white @error('quantity') border-red-500 @enderror">
                        @error('quantity')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Harga</label>
                        <input type="number" name="price" value="{{ old('price') }}" 
                               class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white @error('price') border-red-500 @enderror">
                        @error('price')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Produk</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>