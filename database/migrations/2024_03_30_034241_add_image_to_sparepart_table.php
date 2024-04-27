<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToSparepartTable extends Migration
{
    public function up()
    {
        Schema::table('sparepart', function (Blueprint $table) {
            $table->string('image')->nullable()->after('stok');
        });
    }

    public function down()
    {
        Schema::table('sparepart', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
