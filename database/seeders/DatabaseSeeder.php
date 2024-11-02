<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $kategori = [
            ['nama_kategori' => 'Fiksi'],
            ['nama_kategori' => 'Non-Fiksi'],
            ['nama_kategori' => 'Edukasi'],
            ['nama_kategori' => 'Teknologi'],
            ['nama_kategori' => 'Sejarah'],
            ['nama_kategori' => 'Biografi'],
            ['nama_kategori' => 'Sains']
        ];

        DB::table('kategori')->insert($kategori);

        $buku = [
            [
                'judul_buku' => 'Harry Potter dan Batu Bertuah',
                'kode_kategori' => 1,  // Sesuaikan ID kategori yang sesuai
                'stok_buku' => 10,
                'tahun_buku' => 1997
            ],
            [
                'judul_buku' => 'Pengenalan Pemrograman',
                'kode_kategori' => 4,  // Teknologi
                'stok_buku' => 15,
                'tahun_buku' => 2010
            ],
            [
                'judul_buku' => 'Ensiklopedia Sejarah Dunia',
                'kode_kategori' => 5,  // Sejarah
                'stok_buku' => 8,
                'tahun_buku' => 2005
            ],
            [
                'judul_buku' => 'Biografi Albert Einstein',
                'kode_kategori' => 6,  // Biografi
                'stok_buku' => 5,
                'tahun_buku' => 2001
            ],
            [
                'judul_buku' => 'Dasar-dasar Sains Modern',
                'kode_kategori' => 7,  // Sains
                'stok_buku' => 20,
                'tahun_buku' => 2015
            ],
        ];

        DB::table('buku')->insert($buku);
    }
}
