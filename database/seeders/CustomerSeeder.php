<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [
                'username' => 'customer1',
                'password' => Hash::make('password123'),
                'nama_customer' => 'Customer Satu',
                'email' => 'customer1@example.com',
                'no_telp' => '081234567891',
            ],
            [
                'username' => 'customer2',
                'password' => Hash::make('password456'),
                'nama_customer' => 'Customer Dua',
                'email' => 'customer2@example.com',
                'no_telp' => '082345678912',
            ],
            // Tambahkan data customer lainnya sesuai kebutuhan
        ];

        // Insert data customer ke dalam table 'customers'
        DB::table('customers')->insert($customers);
    }
}
