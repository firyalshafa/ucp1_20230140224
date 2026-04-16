<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman utama (Welcome)
Route::get('/', function () {
    return view('welcome');
});

// Halaman About (Bisa diakses tanpa login)
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Halaman Dashboard (Wajib login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// --- GRUP 1: Akses Umum User Login ---
// Route ini bisa diakses siapa saja selama mereka sudah login
Route::middleware('auth')->group(function () {
    // Pengaturan Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- GRUP 2: Khusus Admin (Gate 'manage-product') ---
// User biasa tidak akan bisa masuk ke sini, akan langsung kena 403 Forbidden
Route::middleware(['auth', 'can:manage-product'])->group(function () {
    
    // 1. Menampilkan Semua Produk (Tugas 5 & 6)
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    
    // 2. Form Tambah & Simpan (Tugas 6: Validation & Try-Catch)
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    
    // 3. Lihat Detail Produk (View Blade)
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    
    // 4. Form Edit & Update (CRUD Lengkap)
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    
    // 5. Hapus Produk (Policy Test)
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});

// Load file route bawaan Laravel Breeze (Login, Register, dll)
require __DIR__.'/auth.php';