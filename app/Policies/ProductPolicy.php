<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Product $product): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        // Hanya admin yang bisa tambah produk
        return $user->role === 'admin';
    }

    public function update(User $user, Product $product): bool
    {
        // Sekarang: Semua Admin boleh edit produk apapun
        return $user->role === 'admin';
    }

    public function delete(User $user, Product $product): bool
    {
        // Sekarang: Semua Admin boleh hapus produk apapun
        return $user->role === 'admin';
    }
}