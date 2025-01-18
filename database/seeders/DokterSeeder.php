<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Dokter::insert([
            ['nama' => 'Dr. John', 'spesialis' => 'Umum', 'telepon' => '+628123456789'],
            ['nama' => 'Dr. Lisa', 'spesialis' => 'Anak', 'telepon' => '+628134567890'],
        ]);
    }
}
