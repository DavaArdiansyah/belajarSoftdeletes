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
        Schema::table('buku', function (Blueprint $table) {
            $table->softDeletes(); // Menambahkan kolom deleted_at ke tabel buku
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->softDeletes(); // Menambahkan kolom deleted_at ke tabel transaksi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buku', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::table('transaksi', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
