<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
Route::middleware('auth')->group(function () {
    // Pengaturan Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // PERBAIKAN: Pindahkan Product ke sini agar User biasa bisa mengakses Index & Show
    // Pembatasan Create/Edit/Delete dilakukan di dalam ProductController
    Route::resource('products', ProductController::class);
});

// --- GRUP 2: Khusus Admin (Akses Category) ---
// Gunakan Gate 'manage-category' atau 'admin-only' yang sudah kita buat
Route::middleware(['auth', 'can:manage-category'])->group(function () {
    
    // Resource Route untuk Category
    Route::resource('category', CategoryController::class);
});

// Load file route bawaan Laravel Breeze
require __DIR__.'/auth.php';