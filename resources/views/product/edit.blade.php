@extends('layouts.navbar')

@section('content')
    <h1>Edit Product</h1>

    <form action="{{ route('product.update', $product) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-floating mb-2">
            <input type="text" class="form-control" id="nama_barang" placeholder="Nama Barang" name="nama_barang"
                value="{{ $product->nama_barang }}">
            <label for="nama_barang">Nama Barang</label>
        </div>

        <div class="form-floating mb-2">
            <input type="number" class="form-control" id="price" placeholder="Price" name="price"
                value="{{ $product->price }}">
            <label for="price">Price</label>
        </div>

        <div class="form-floating mb-2">
            <input type="number" class="form-control" id="quantity" placeholder="quantity" name="quantity"
                value="{{ $product->quantity }}">
            <label for="quantity">Quantity</label>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
