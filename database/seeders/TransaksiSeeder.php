<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Ambil ID customer 1 dan kendaraannya dari database
        $customer_id = 1; // Sesuaikan dengan ID customer yang ingin digunakan
        $kendaraan_id = DB::table('kendaraan')->where('customer_id', $customer_id)->value('kendaraan_id');

        // Data transaksi
        $transaksi = [
            'customer_id' => $customer_id,
            'kendaraan_id' => $kendaraan_id,
            'keterangan_transaksi' => $faker->sentence(6),
            'tanggal_transaksi' => $faker->dateTimeThisMonth(),
            'admin_id' => 1, // Sesuaikan dengan ID admin yang akan melakukan transaksi
            'total_harga' => 0, // Total harga diinisialisasi dengan 0
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Insert data transaksi ke dalam table 'transaksi' dan ambil ID transaksi
        $transaksi_id = DB::table('transaksi')->insertGetId($transaksi);

        // Data detail transaksi
        $spareparts = DB::table('sparepart')->get();

        foreach ($spareparts as $sparepart) {
            $quantity = $faker->numberBetween(1, 5); // Jumlah random antara 1 - 5
            $subtotal = $sparepart->harga * $quantity; // Subtotal dihitung dari harga x jumlah

            $detail_transaksi = [
                'transaksi_id' => $transaksi_id,
                'sparepart_id' => $sparepart->sparepart_id,
                'quantity' => $quantity,
                'subtotal' => $subtotal,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Insert data detail transaksi ke dalam table 'detail_transaksi'
            DB::table('detail_transaksi')->insert($detail_transaksi);

            // Update total harga pada data transaksi
            DB::table('transaksi')->where('transaksi_id', $transaksi_id)->increment('total_harga', $subtotal);
        }
    }
}
