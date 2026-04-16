<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    // Tentukan kolom mana saja yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'user_id',
        'name',
        'quantity',
        'price',
    ];

    /**
     * Relasi ke User (Setiap produk dimiliki oleh satu user)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}