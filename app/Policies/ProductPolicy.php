<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    /**
     * Semua user yang login boleh melihat daftar produk.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Semua user yang login boleh melihat detail produk.
     */
    public function view(User $user, Product $product): bool
    {
        return true;
    }

    /**
     * Hanya admin yang boleh membuat produk baru.
     */
    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Hanya admin yang boleh mengupdate — dan hanya produk miliknya sendiri.
     * Logika: role harus 'admin' DAN user_id produk harus cocok dengan id user login.
     */
    public function update(User $user, Product $product): bool
    {
        return $user->role === 'admin' && $user->id === $product->user_id;
    }

    /**
     * Hanya admin yang boleh menghapus — dan hanya produk miliknya sendiri.
     */
    public function delete(User $user, Product $product): bool
    {
        return $user->role === 'admin' && $user->id === $product->user_id;
    }
}