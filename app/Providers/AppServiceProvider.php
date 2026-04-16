<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Definisikan Gate 'manage-product'
        // Hanya user dengan role 'admin' yang diizinkan
        Gate::define('manage-product', function (User $user) {
            return $user->role === 'admin';
        });
    }
}