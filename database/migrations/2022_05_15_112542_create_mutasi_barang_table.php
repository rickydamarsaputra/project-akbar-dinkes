<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasi_barang', function (Blueprint $table) {
            $table->id();
            $table->string('sumber_dana');
            $table->integer('id_rekening')->default(0);
            $table->string('tujuan_penerima')->default(null);
            $table->integer('total_harga_mutasi')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutasi_barang');
    }
};
