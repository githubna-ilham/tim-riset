<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->uuid('transaksi_id')->primary();
            $table->uuid('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->uuid('kendaraan_id');
            $table->foreign('kendaraan_id')->references('kendaraan_id')->on('kendaraan');
            $table->string('keterangan_transaksi');
            $table->dateTime('tanggal_transaksi');
            $table->decimal('total_harga', 10, 2)->default(0);
            $table->uuid('admin_id');
            $table->foreign('admin_id')->references('admin_id')->on('admin');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}