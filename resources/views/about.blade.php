<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Biodata Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                <h3 class="text-lg font-bold mb-4">Informasi Pribadi</h3>
                <hr class="mb-4 border-gray-200 dark:border-gray-700">
                
                <div class="space-y-3">
                    <p><strong>Nama:</strong> Firyal Shafa Salsabila</p>
                    <p><strong>NIM:</strong> 20230140224</p>
                    <p><strong>Program Studi:</strong> Teknik Informatika</p>
                    <p><strong>Hobi:</strong> Memasak makanan gurih dan pedas</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>