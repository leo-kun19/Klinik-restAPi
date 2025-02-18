<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatsTable extends Migration
{
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->integer('stok');
        $table->integer('harga');
        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('obats');
    }
}
