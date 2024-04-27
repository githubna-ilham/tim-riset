<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(KategoriSparepartSeeder::class);
        $this->call(KendaraanSeeder::class);
        $this->call(SparepartSeeder::class);
        $this->call(TransaksiSeeder::class);
    }
}
