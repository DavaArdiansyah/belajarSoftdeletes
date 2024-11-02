<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::withTrashed()->get(); // Mengambil semua buku termasuk yang dihapus
        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'kode_kategori' => 'required|exists:kategori,kode_kategori',
            'stok_buku' => 'required|integer',
            'tahun_buku' => 'required|integer',
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul_buku' => 'required',
            'kode_kategori' => 'required|exists:kategori,kode_kategori',
            'stok_buku' => 'required|integer',
            'tahun_buku' => 'required|integer',
        ]);

        $buku->update($request->all());

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete(); // Soft delete
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }

    public function restore($kode_buku)
    {
        $buku = Buku::withTrashed()->find($kode_buku);
        $buku->restore(); // Mengembalikan soft delete
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dikembalikan!');
    }

    public function forceDelete($kode_buku)
    {
        $buku = Buku::withTrashed()->find($kode_buku);
        $buku->forceDelete(); // Menghapus secara permanen
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus secara permanen!');
    }
}
