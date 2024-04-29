<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
                'kategori_id' => Str::uuid(),
                'nama_kategori' => 'Oli',
            ],
            [
                'kategori_id' => Str::uuid(),
                'nama_kategori' => 'Ban',
            ],
            [
                'kategori_id' => Str::uuid(),
                'nama_kategori' => 'Filter',
            ],
            // Tambahkan data kategori sparepart lainnya sesuai kebutuhan
        ];

        // Insert data kategori sparepart ke dalam table 'kategori_sparepart'
        DB::table('kategori_sparepart')->insert($kategoris);
    }
}
