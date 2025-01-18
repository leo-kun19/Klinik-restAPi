<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamMedisTable extends Migration
{
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pasien_id');
        $table->unsignedBigInteger('dokter_id');
        $table->text('diagnosis');
        $table->text('pengobatan');
        $table->timestamps();

        $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
        $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rekam_medis');
    }
}
