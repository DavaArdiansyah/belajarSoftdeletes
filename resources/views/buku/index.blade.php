@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="container">
    <h1>Daftar Buku</h1>
    <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 25%;">
                    <a href="{{ route('buku.index', ['sort' => 'judul_buku', 'order' => request('sort') === 'judul_buku' && request('order') === 'asc' ? 'desc' : 'asc']) }}"
                       class="btn btn-link text-decoration-none p-0 text-black">
                        Judul Buku
                        @if(request('sort') === 'judul_buku')
                            <i class="bi bi-arrow-{{ request('order') === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </a>
                </th>
                <th style="width: 25%;">
                    <a href="{{ route('buku.index', ['sort' => 'kode_kategori', 'order' => request('sort') === 'kode_kategori' && request('order') === 'asc' ? 'desc' : 'asc']) }}"
                       class="btn btn-link text-decoration-none p-0 text-black">
                        Kode Kategori
                        @if(request('sort') === 'kode_kategori')
                            <i class="bi bi-arrow-{{ request('order') === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </a>
                </th>
                <th style="width: 25%;">
                    <a href="{{ route('buku.index', ['sort' => 'stok_buku', 'order' => request('sort') === 'stok_buku' && request('order') === 'asc' ? 'desc' : 'asc']) }}"
                       class="btn btn-link text-decoration-none p-0 text-black">
                        Stok Buku
                        @if(request('sort') === 'stok_buku')
                            <i class="bi bi-arrow-{{ request('order') === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </a>
                </th>
                <th style="width: 25%;">
                    <a href="{{ route('buku.index', ['sort' => 'tahun_buku', 'order' => request('sort') === 'tahun_buku' && request('order') === 'asc' ? 'desc' : 'asc']) }}"
                       class="btn btn-link text-decoration-none p-0 text-black">
                        Tahun Buku
                        @if(request('sort') === 'tahun_buku')
                            <i class="bi bi-arrow-{{ request('order') === 'asc' ? 'up' : 'down' }}"></i>
                        @endif
                    </a>
                </th>
                <th style="width: 10%;"><span class="btn p-0">Aksi</span></th> <!-- Header untuk kolom aksi -->
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
