@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h5>User: {{ $transaction->user->name }}</h5>

        <div class="card">
            <div class="card-header">
                Produk yang Dibeli
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Quantity</th>
                            <th>Harga</th>
                            <th>Pajak</th>
                            <th>Biaya Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction->details as $detail)
                            <tr>
                                <td>{{ $detail->product->nama_barang }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>Rp. {{ number_format($detail->price, 2, ',', '.') }}</td>
                                <td>Rp. {{ number_format($detail->tax, 2, ',', '.') }}</td>
                                <td>Rp. {{ number_format($detail->admin_fee, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="mt-4">
            <p>Total: Rp. {{ number_format($transaction->total_amount, 2, ',', '.') }}</p>
            <p>Pajak: Rp. {{ number_format($transaction->tax, 2, ',', '.') }}</p>
            <p>Biaya Admin: Rp. {{ number_format($transaction->admin_fee, 2, ',', '.') }}</p>
        </div>
    </div>
@endsection
