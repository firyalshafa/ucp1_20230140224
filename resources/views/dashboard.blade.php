<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Menampilkan Role secara Dinamis --}}
                    <p class="text-lg font-medium">
                        Role: 
                        <span class="font-bold px-3 py-1 rounded-full {{ Auth::user()->role === 'admin' ? 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200' : 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' }}">
                            {{ ucfirst(Auth::user()->role) }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>