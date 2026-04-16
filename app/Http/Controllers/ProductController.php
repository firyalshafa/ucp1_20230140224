<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        // Cek policy: hanya admin yang boleh
        $this->authorize('create', Product::class);

        return view('products.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Product::class);

        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        Product::create([
            'name'    => $request->name,
            'price'   => $request->price,
            'user_id' => auth()->id(), // simpan siapa yang membuat
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        // Cek policy: admin DAN pemilik produk
        $this->authorize('update', $product);

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);

        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $product->update($request->only('name', 'price'));

        return redirect()->route('products.index')->with('success', 'Produk berhasil diupdate.');
    }

    public function destroy(Product $product)
    {
        // Cek policy: admin DAN pemilik produk
        $this->authorize('delete', $product);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}