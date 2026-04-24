<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Tetap true agar permintaan diproses
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // Kategori wajib dipilih
            'qty'         => 'required|integer|min:1',
            'price'       => 'required|numeric|min:1000',
        ];
    }

    /**
     * Custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'name.required'        => 'Nama produk wajib diisi.',
            'name.max'             => 'Nama produk tidak boleh lebih dari 255 karakter.',
            'category_id.required' => 'Kategori produk wajib dipilih.',
            'category_id.exists'   => 'Kategori yang dipilih tidak valid.',
            'quantity.required'    => 'Jumlah produk wajib diisi.',
            'qty.required'         => 'Jumlah produk wajib diisi.',
            'qty.min'              => 'Jumlah produk minimal 1.',
            'price.required'       => 'Harga produk wajib diisi.',
            'price.numeric'        => 'Harga produk harus berupa angka yang valid.',
            'price.min'            => 'Harga produk minimal Rp 1.000.',
        ];
    }
}