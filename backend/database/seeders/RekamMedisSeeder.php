<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekamMedisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\RekamMedis::insert([
            ['pasien_id' => 1, 'dokter_id' => 1, 'diagnosis' => 'Demam', 'pengobatan' => 'Paracetamol'],
            ['pasien_id' => 2, 'dokter_id' => 2, 'diagnosis' => 'Flu', 'pengobatan' => 'Vitamin C'],
        ]);
    
    }
}
