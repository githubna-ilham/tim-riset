<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                // generate uuid for admin_id here
                'admin_id' => Str::uuid(),
                'username' => 'admin1',
                'password' => Hash::make('password123'),
                'nama_admin' => 'Admin Satu',
                'email' => 'admin1@example.com',
                'no_telp' => '081234567891',
            ],
            [
                'admin_id' => Str::uuid(),
                'username' => 'admin2',
                'password' => Hash::make('password456'),
                'nama_admin' => 'Admin Dua',
                'email' => 'admin2@example.com',
                'no_telp' => '082345678912',
            ],
            // Tambahkan data admin lainnya sesuai kebutuhan
        ];

        // Insert data admin ke dalam table 'admin'
        DB::table('admin')->insert($admins);
    }
}
