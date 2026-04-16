<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest; 
use Illuminate\Support\Facades\Log; 
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $this->authorize('create', Product::class);
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $this->authorize('create', Product::class);

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

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);

        $request->validate([
            'name'  => 'required|string|max:255',
            'qty'   => 'required|integer|min:1', // Diganti ke qty
            'price' => 'required|numeric|min:1000',
        ], [
            'name.required'  => 'Nama produk wajib diisi.',
            'qty.min'        => 'Jumlah produk minimal 1.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.min'      => 'Harga produk minimal Rp 1.000.',
        ]);

        // Pastikan hanya name, qty, dan price yang diupdate
        $product->update($request->only('name', 'qty', 'price'));

        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate.');
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}