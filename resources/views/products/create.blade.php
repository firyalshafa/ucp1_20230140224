<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Produk Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow-sm sm:rounded-lg">
                
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    {{-- 1. Nama Produk --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Nama Produk</label>
                        <input type="text" name="name" value="{{ old('name') }}" 
                               class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- 2. Kategori --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 mb-1">Kategori</label>
                        <select name="category_id" id="category_id" 
                                class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-800 dark:text-gray-300 @error('category_id') border-red-500 @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- 3. Jumlah (Qty) - DIPERBAIKI NAME NYA JADI qty --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Jumlah (Qty)</label>
                        <input type="number" name="qty" value="{{ old('qty') }}" 
                               class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white @error('qty') border-red-500 @enderror">
                        @error('qty')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- 4. Harga --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300">Harga</label>
                        <input type="number" name="price" value="{{ old('price') }}" 
                               class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white @error('price') border-red-500 @enderror">
                        @error('price')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end mt-6">
                        <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600 transition">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Simpan Produk</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>