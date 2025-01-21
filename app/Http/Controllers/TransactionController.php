<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\DetailTransaction;
use App\Models\TransactionProduct;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Auth::user()->role === 'admin' ? Transaction::all() : Transaction::where('user_id', Auth::id())->get();
        return view('transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('transaction.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required|array|min:1',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        foreach ($request->products as $productData) {
            $product = Product::find($productData['product_id']);

            if ($productData['quantity'] > $product->quantity) {
                return back()->with('error', 'Stok barang ' . $product->nama_barang . ' tidak mencukupi.');
            }
        }

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'total_amount' => 0,
            'tax' => 0,
            'admin_fee' => 0
        ]);

        $totalAmount = 0;
        $totalTax = 0;
        $totalAdminFee = 0;

        foreach ($request->products as $productData) {
            $product = Product::find($productData['product_id']);

            $price = $product->price * $productData['quantity'];
            $tax = $price * 0.10;
            $adminFee = ($price + $tax) * 0.05;

            $totalAmount += $price;
            $totalTax += $tax;
            $totalAdminFee += $adminFee;

            DetailTransaction::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product->id,
                'quantity' => $productData['quantity'],
                'price' => $price,
                'tax' => $tax,
                'admin_fee' => $adminFee
            ]);

            $product->decrement('quantity', $productData['quantity']);
        }

        $transaction->update([
            'total_amount' => $totalAmount,
            'tax' => $totalTax,
            'admin_fee' => $totalAdminFee
        ]);

        return redirect()->route('transaction.index')->with('success', 'Transaksi berhasil dilakukan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        if (Auth::user()->role !== 'admin' && $transaction->user_id !== Auth::id()) {
            abort(403);
        }
        return view('transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'products' => 'required|array|min:1',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $transaction = Transaction::findOrFail($id);

        $totalAmount = 0;
        $totalTax = 0;
        $totalAdminFee = 0;

        foreach ($request->products as $productData) {
            $product = Product::find($productData['product_id']);

            if ($productData['quantity'] > $product->quantity) {
                return back()->with('error', 'Stok barang ' . $product->nama_barang . ' tidak mencukupi.');
            }

            $price = $product->price * $productData['quantity'];
            $tax = $price * 0.10;
            $adminFee = ($price + $tax) * 0.05;

            $totalAmount += $price;
            $totalTax += $tax;
            $totalAdminFee += $adminFee;

            $detailTransaction = $transaction->details()->where('product_id', $product->id)->first();

            if ($detailTransaction) {
                $detailTransaction->update([
                    'quantity' => $productData['quantity'],
                    'price' => $price,
                    'tax' => $tax,
                    'admin_fee' => $adminFee
                ]);
            } else {
                DetailTransaction::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $product->id,
                    'quantity' => $productData['quantity'],
                    'price' => $price,
                    'tax' => $tax,
                    'admin_fee' => $adminFee
                ]);
            }

            $product->decrement('quantity', $productData['quantity']);
        }

        $transaction->update([
            'total_amount' => $totalAmount,
            'tax' => $totalTax,
            'admin_fee' => $totalAdminFee
        ]);

        return redirect()->route('transaction.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
