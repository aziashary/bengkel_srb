<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_masuk', function (Blueprint $table) {
            $table->bigIncrements('id_stokmasuk');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->string('nama_user');
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
        Schema::dropIfExists('stok_masuk');
    }
}
