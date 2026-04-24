<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * Gate: manage-product
         * Digunakan untuk akses CRUD Produk (Tombol Add, Edit, Delete)
         */
        Gate::define('manage-product', function (User $user) {
            return $user->role === 'admin';
        });

        /**
         * Gate: manage-category
         * Digunakan untuk akses menu Category (hanya muncul untuk Admin)
         * Nama gate ini disesuaikan dengan yang ada di navigation.blade.php
         */
        Gate::define('manage-category', function (User $user) {
            return $user->role === 'admin';
        });

        /**
         * Opsional: admin-only
         * Tetap dibuat jika kamu sudah terlanjur memakainya di routes/web.php
         */
        Gate::define('admin-only', function (User $user) {
            return $user->role === 'admin';
        });
    }
}