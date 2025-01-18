<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    public function up()
{
    Schema::create('jadwals', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('dokter_id');
        $table->string('hari');
        $table->time('jam_mulai');
        $table->time('jam_selesai');
        $table->timestamps();

        $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
    });
}


    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}
