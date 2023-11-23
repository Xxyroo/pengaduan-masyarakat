<?php
// database/migrations/xxxx_xx_xx_create_laporans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_laporan');
            $table->text('isi_laporan');
            $table->string('status');
            $table->string('photo_path')->nullable(); // Assuming you want to store the photo path
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}