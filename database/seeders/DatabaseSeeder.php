<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Memasukkan data kategori terlebih dahulu
        $this->call(CategorySeeder::class);

        // Memasukkan data produk
        $this->call(ProductSeeder::class);
    }
}
