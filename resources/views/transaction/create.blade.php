<!-- resources/views/transaction/create.blade.php -->

@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h2>Tambah Transaksi Pembelian</h2>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('transaction.store') }}" method="POST">
                    @csrf
                    <div id="products-container">
                        <div class="product-row mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="product">Nama Barang</label>
                                    <select name="products[0][product_id]" class="form-control" required>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="products[0][quantity]" class="form-control" value="1"
                                        required min="1">
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger"
                                        onclick="removeProductRow(this)">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end mb-3">
                        <button type="button" class="btn btn-primary" onclick="addProductRow()">Tambah Barang</button>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan Transaksi</button>
                </form>
            </div>
        </div>

    </div>

    <script>
        let productIndex = 1;

        function addProductRow() {
            const container = document.getElementById('products-container');
            const row = document.createElement('div');
            row.classList.add('product-row', 'mb-3');
            row.innerHTML = `
            <div class="row">
                <div class="col-md-6">
                    <label for="product">Nama Barang</label>
                    <select name="products[${productIndex}][product_id]" class="form-control" required>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="products[${productIndex}][quantity]" class="form-control" value="1" required min="1">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="button" class="btn btn-danger" onclick="removeProductRow(this)">Hapus</button>
                </div>
            </div>
        `;
            container.appendChild(row);
            productIndex++;
        }

        function removeProductRow(button) {
            const row = button.parentElement.parentElement;
            row.remove();
        }
    </script>
@endsection
