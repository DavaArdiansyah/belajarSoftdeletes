<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'buku';
    protected $primaryKey = 'kode_buku';
    protected $dates = ['deleted_at']; // Menandai deleted_at sebagai instance Carbon
    protected $fillable = [
        'judul_buku',
        'kode_kategori',
        'stok_buku',
        'tahun_buku'
    ];

    public function transaksi()
    {
        return $this->belongsToMany(Transaksi::class, 'transaksi_buku', 'kode_buku', 'kode_transaksi')
            ->withPivot('jumlah_buku');
    }
}
