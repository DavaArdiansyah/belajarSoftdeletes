<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaksi';
    protected $primaryKey = 'kode_transaksi';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nama_peminjam',
        'alamat_peminjam',
        'no_kontak_peminjam',
        'tanggal_meminjam'
    ];

    public function buku()
    {
        return $this->belongsToMany(Buku::class, 'transaksi_buku', 'kode_transaksi', 'kode_buku')
            ->withPivot('jumlah_buku');
    }
}
