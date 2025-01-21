<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ], [
            'nama_barang.required' => 'Nama barang harus diisi',
            'price.required' => 'Harga barang harus diisi',
            'quantity.required' => 'Jumlah barang harus diisi',
        ]);

        Product::create([
            'nama_barang' => $request->nama_barang,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('product.index')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama_barang' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ], [
            'nama_barang.required' => 'Nama barang harus diisi',
            'price.required' => 'Harga barang harus diisi',
            'quantity.required' => 'Jumlah barang harus diisi',
        ]);

        $product->update([
            'nama_barang' => $request->nama_barang,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('product.index')->with('success', 'Barang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Barang berhasil dihapus');
    }
}
