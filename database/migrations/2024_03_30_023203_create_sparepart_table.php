<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparepartTable extends Migration
{
    public function up()
    {
        Schema::create('sparepart', function (Blueprint $table) {
            $table->uuid('sparepart_id')->primary();
            $table->string('nama_sparepart');
            $table->decimal('harga', 10, 2);
            $table->integer('stok');
            $table->uuid('kategori_id');
            $table->foreign('kategori_id')->references('kategori_id')->on('kategori_sparepart');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sparepart');
    }
}
