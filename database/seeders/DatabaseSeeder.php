<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        // AdminSeeder
        // $this->call(AdminSeeder::class);
        // CustomerSeeder
        // $this->call(CustomerSeeder::class);
        // kendaraanSeeder
        // $this->call(KendaraanSeeder::class);
        // KategoriSparepartSeeder
        // $this->call(KategoriSparepartSeeder::class);
        // SparepartSeeder
        // $this->call(SparepartSeeder::class);
        // TransaksiSeeder
        $this->call(AdminSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(KategoriSparepartSeeder::class);
        $this->call(KendaraanSeeder::class);
        $this->call(SparepartSeeder::class);
        $this->call(TransaksiSeeder::class);
    }
}
