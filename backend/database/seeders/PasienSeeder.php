<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Pasien::insert([
            ['nama' => 'Ali', 'alamat' => 'Jl. Melati No. 1', 'telepon' => '08123456789'],
            ['nama' => 'Budi', 'alamat' => 'Jl. Mawar No. 2', 'telepon' => '08134567890'],
        ]);
    }
}
