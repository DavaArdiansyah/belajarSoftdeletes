<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id('kode_kategori');
            $table->string('nama_kategori');
        });

        Schema::create('buku', function (Blueprint $table) {
            $table->id('kode_buku');
            $table->string('judul_buku');
            $table->unsignedBigInteger('kode_kategori');
            $table->integer('stok_buku');
            $table->year('tahun_buku');

            $table->foreign('kode_kategori')->references('kode_kategori')->on('kategori')->onDelete('cascade');
        });

        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('kode_transaksi');
            $table->string('nama_peminjam');
            $table->text('alamat_peminjam');
            $table->string('no_kontak_peminjam');
            $table->date('tanggal_meminjam');
            $table->timestamps();
        });

        Schema::create('transaksi_buku', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_transaksi');
            $table->unsignedBigInteger('kode_buku');
            $table->integer('jumlah_buku');

            $table->foreign('kode_transaksi')->references('kode_transaksi')->on('transaksi')->onDelete('cascade');
            $table->foreign('kode_buku')->references('kode_buku')->on('buku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_buku');
        Schema::dropIfExists('transaksi');
        Schema::dropIfExists('buku');
        Schema::dropIfExists('kategori');
    }
};
