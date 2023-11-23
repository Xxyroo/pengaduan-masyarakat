<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggapansTable extends Migration
{
    public function up()
    {
        Schema::create('tanggapans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pengaduan_id");
            $table->date("tgl_tanggapan");
            $table->text("tanggapan");
            $table->unsignedBigInteger("user_id");
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('tanggapans');
    }
}