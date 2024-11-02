@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
<div class="container">
    <h1>Daftar Transaksi</h1>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Peminjam</th>
                <th>Alamat Peminjam</th>
                <th>No Kontak</th>
                <th>Tanggal Peminjaman</th>
                <th>Daftar Buku</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $item)
                <tr>
                    <td>{{ $item->nama_peminjam }}</td>
                    <td>{{ $item->alamat_peminjam }}</td>
                    <td>{{ $item->no_kontak_peminjam }}</td>
                    <td>{{ $item->tanggal_meminjam }}</td>
                    <td>
                        <ul>
                            @foreach($item->buku as $buku)
                                <li>{{ $buku->judul_buku }} ({{ $buku->pivot->jumlah_buku }})</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
