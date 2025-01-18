<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Obat::insert([
            ['nama' => 'Paracetamol', 'stok' => 50, 'harga' => 5000],
            ['nama' => 'Amoxicillin', 'stok' => 30, 'harga' => 10000],
        ]);
    }
}
