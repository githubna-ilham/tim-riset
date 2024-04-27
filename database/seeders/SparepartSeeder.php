<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $spareparts = [
            [
                'nama_sparepart' => 'Oli Mesin',
                'harga' => 50000,
                'stok' => 50,
                'kategori_id' => 1, // Sesuaikan dengan ID kategori
            ],
            [
                'nama_sparepart' => 'Ban Mobil',
                'harga' => 800000,
                'stok' => 20,
                'kategori_id' => 2, // Sesuaikan dengan ID kategori
            ],
            [
                'nama_sparepart' => 'Filter Udara',
                'harga' => 250000,
                'stok' => 30,
                'kategori_id' => 3, // Sesuaikan dengan ID kategori
            ],
            // Tambahkan data sparepart lainnya sesuai kebutuhan
        ];

        // Insert data sparepart ke dalam table 'sparepart'
        DB::table('sparepart')->insert($spareparts);
    }
}
