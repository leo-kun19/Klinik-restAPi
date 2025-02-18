<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $fillable = ['pasien_id', 'dokter_id', 'diagnosis', 'pengobatan'];

    // Relasi ke pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    // Relasi ke dokter
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
