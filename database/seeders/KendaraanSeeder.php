<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer_id_1 = Customer::where('username', 'customer1')->value('customer_id');
        $customer_id_2 = Customer::where('username', 'customer2')->value('customer_id');
        $kendaraans = [
            [
                'kendaraan_id' => Str::uuid(),
                'customer_id' => $customer_id_1, // Sesuaikan dengan ID customer
                'jenis_kendaraan' => 'Mobil',
                'nomor_polisi' => 'B 1234 ABC',
                'merk' => 'Toyota',
                'tahun' => '2020',
            ],
            [
                'kendaraan_id' => Str::uuid(),
                'customer_id' => $customer_id_2, // Sesuaikan dengan ID customer
                'jenis_kendaraan' => 'Motor',
                'nomor_polisi' => 'L 5678 XYZ',
                'merk' => 'Honda',
                'tahun' => '2019',
            ],
            // Tambahkan data kendaraan lainnya sesuai kebutuhan
        ];

        // Insert data kendaraan ke dalam table 'kendaraan'
        DB::table('kendaraan')->insert($kendaraans);
    }
}
