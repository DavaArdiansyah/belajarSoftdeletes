<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('buku')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $buku = Buku::all();
        return view('transaksi.create', compact('buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required|string',
            'alamat_peminjam' => 'required|string',
            'no_kontak_peminjam' => 'required|string',
            'tanggal_meminjam' => 'required|date',
            'buku' => 'required|array',
            'buku.*.kode_buku' => 'required|exists:buku,kode_buku',
            'buku.*.jumlah_buku' => 'required|integer|min:1',
        ]);

        $transaksi = Transaksi::create([
            'nama_peminjam' => $request->nama_peminjam,
            'alamat_peminjam' => $request->alamat_peminjam,
            'no_kontak_peminjam' => $request->no_kontak_peminjam,
            'tanggal_meminjam' => $request->tanggal_meminjam,
        ]);

        foreach ($request->buku as $bukuData) {
            $transaksi->buku()->attach($bukuData['kode_buku'], ['jumlah_buku' => $bukuData['jumlah_buku']]);
        }

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibuat');
    }
}
