<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; 
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest; 
use Illuminate\Support\Facades\Log; 
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate; // Tambahkan ini

class ProductController extends Controller
{
    use AuthorizesRequests;

    /**
     * Menampilkan daftar produk untuk SEMUA user yang login.
     */
    public function index()
    {
        // Jangan panggil $this->authorize() di sini supaya user biasa bisa masuk
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Hanya Admin yang bisa buka halaman Create.
     */
    public function create()
    {
        // Menggunakan Gate secara langsung agar lebih aman
        if (Gate::denies('manage-product')) {
            abort(403, 'Hanya Admin yang boleh menambah produk.');
        }

        $categories = Category::all(); 
        return view('products.create', compact('categories'));
    }

    /**
     * Hanya Admin yang bisa simpan data.
     */
    public function store(StoreProductRequest $request)
    {
        if (Gate::denies('manage-product')) {
            abort(403);
        }

        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        try {
            Product::create($validated);
            return redirect()
                ->route('products.index')
                ->with('success', 'Product created successfully.');

        } catch (QueryException $e) {
            Log::error('Product store database error', ['message' => $e->getMessage()]);
            return redirect()->back()->withInput()->with('error', 'Database error.');
        } catch (\Throwable $e) {
            Log::error('Product store unexpected error', ['message' => $e->getMessage()]);
            return redirect()->back()->withInput()->with('error', 'Unexpected error occurred.');
        }
    }

    /**
     * Semua user bisa melihat detail satu produk.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Hanya Admin (dan pemilik produk) yang bisa edit.
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);

        $request->validate([
            'name'        => 'required|string|max:255',
            'qty'         => 'required|integer|min:1',
            'price'       => 'required|numeric|min:1000',
            'category_id' => 'required|exists:categories,id', 
        ], [
            'name.required'        => 'Nama produk wajib diisi.',
            'qty.min'              => 'Jumlah produk minimal 1.',
            'price.required'       => 'Harga produk wajib diisi.',
            'price.min'            => 'Harga produk minimal Rp 1.000.',
            'category_id.required' => 'Kategori wajib dipilih.',
        ]);

        $product->update($request->only('name', 'qty', 'price', 'category_id'));

        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate.');
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();
        
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}