@extends('layouts.navbar')

@section('content')
    <h1>Data Product</h1>

    <a href="{{ route('product.create') }}" class="btn btn-primary mb-2">Tambah Data</a>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->nama_barang }}</td>
                            <td>{{ $row->price }}</td>
                            <td>{{ $row->quantity }}</td>
                            <td class="d-flex justify-content-center gap-2">
                                <a href="{{ route('product.edit', $row) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('product.destroy', $row) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
