@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h2>Daftar Transaksi</h2>

        @if (Auth::user()->role == 'customer')
            <a href="{{ route('transaction.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Pajak</th>
                    <th>Biaya Admin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->user->name }}</td>
                        <td>Rp. {{ number_format($transaction->total_amount, 2, ',', '.') }}</td>
                        <td>Rp. {{ number_format($transaction->tax, 2, ',', '.') }}</td>
                        <td>Rp. {{ number_format($transaction->admin_fee, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('transaction.show', $transaction->id) }}" class="btn btn-info">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
