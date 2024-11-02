@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="container">
    <h1>Daftar Buku</h1>
    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Kode Kategori</th>
                <th>Stok Buku</th>
                <th>Tahun Buku</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukus as $buku)
                <tr>
                    <td>{{ $buku->judul_buku }}</td>
                    <td>{{ $buku->kode_kategori }}</td>
                    <td>{{ $buku->stok_buku }}</td>
                    <td>{{ $buku->tahun_buku }}</td>
                    <td>
                        <form action="{{ route('buku.destroy', $buku->kode_buku) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        @if($buku->trashed())
                            <form action="{{ route('buku.restore', $buku->kode_buku) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-warning">Kembalikan</button>
                            </form>
                            <form action="{{ route('buku.forceDelete', $buku->kode_buku) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus Permanen</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
