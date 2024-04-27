<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoris = [
            [
                'nama_kategori' => 'Oli',
            ],
            [
                'nama_kategori' => 'Ban',
            ],
            [
                'nama_kategori' => 'Filter',
            ],
            // Tambahkan data kategori sparepart lainnya sesuai kebutuhan
        ];

        // Insert data kategori sparepart ke dalam table 'kategori_sparepart'
        DB::table('kategori_sparepart')->insert($kategoris);
    }
}
