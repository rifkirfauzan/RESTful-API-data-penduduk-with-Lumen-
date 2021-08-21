<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Penduduk extends Migration{
    
    public function up(){
        Schema::create('Penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->bigInteger('nokk');
            $table->bigInteger('nik');
            $table->string('nama');
            $table->string('alamat');
            $table->integer('no_telp');
            $table->string('pekerjaan');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('Penduduk');
    }
}