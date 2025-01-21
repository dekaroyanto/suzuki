@extends('layouts.navbar')

@section('content')
    <h1>Tambah Product</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="post">
                @csrf
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="nama_barang" placeholder="Nama Barang" name="nama_barang">
                    <label for="nama_barang">Nama Barang</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="number" class="form-control" id="price" placeholder="Price" name="price">
                    <label for="price">Price</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="number" class="form-control" id="quantity" placeholder="quantity" name="quantity">
                    <label for="quantity">Quantity</label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
@endsection
