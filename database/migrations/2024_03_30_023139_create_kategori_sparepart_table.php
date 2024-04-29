<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriSparepartTable extends Migration
{
    public function up()
    {
        Schema::create('kategori_sparepart', function (Blueprint $table) {
            $table->uuid('kategori_id')->primary();
            $table->string('nama_kategori');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori_sparepart');
    }
}
