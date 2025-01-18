<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'spesialis', 'telepon'];

    // Definisikan relasi dengan jadwal
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    // Definisikan relasi dengan rekam medis
    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class);
    }
}
