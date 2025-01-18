<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Jadwal::insert([
            ['dokter_id' => 1, 'hari' => 'Senin', 'jam_mulai' => '08:00:00', 'jam_selesai' => '12:00:00'],
            ['dokter_id' => 2, 'hari' => 'Selasa', 'jam_mulai' => '09:00:00', 'jam_selesai' => '13:00:00'],
        ]);
    }
}
