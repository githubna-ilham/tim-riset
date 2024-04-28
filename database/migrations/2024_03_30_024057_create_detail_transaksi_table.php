<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->uuid('detail_transaksi_id')->primary();
            $table->uuid('transaksi_id');
            $table->foreign('transaksi_id')->references('transaksi_id')->on('transaksi');
            $table->uuid('sparepart_id');
            $table->foreign('sparepart_id')->references('sparepart_id')->on('sparepart');
            $table->integer('quantity');
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_transaksi');
    }
}
