<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\KategoriSparepart;
use Illuminate\Support\Str;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori_id_1 = KategoriSparepart::where('nama_kategori', 'Oli')->value('kategori_id');
        $kategori_id_2 = KategoriSparepart::where('nama_kategori', 'Ban')->value('kategori_id');
        $kategori_id_3 = KategoriSparepart::where('nama_kategori', 'Filter')->value('kategori_id');

        $spareparts = [
            [
                'sparepart_id' => Str::uuid(),
                'nama_sparepart' => 'Oli Mesin',
                'harga' => 50000,
                'merk' => 'AHM',
                'stok' => 50,
                'kategori_id' => $kategori_id_1, // Sesuaikan dengan ID kategori
            ],
            [
                'sparepart_id' => Str::uuid(),
                'nama_sparepart' => 'Ban Mobil',
                'harga' => 800000,
                'merk' => 'Suzuki',
                'stok' => 20,
                'kategori_id' => $kategori_id_2, // Sesuaikan dengan ID kategori
            ],
            [
                'sparepart_id' => Str::uuid(),
                'nama_sparepart' => 'Filter Udara',
                'harga' => 250000,
                'merk' => 'Yamaha',
                'stok' => 30,
                'kategori_id' => $kategori_id_3, // Sesuaikan dengan ID kategori
            ],
            // Tambahkan data sparepart lainnya sesuai kebutuhan
        ];

        // Insert data sparepart ke dalam table 'sparepart'
        DB::table('sparepart')->insert($spareparts);
    }
}