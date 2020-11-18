<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempoTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempo_tables', function (Blueprint $table) {
            $table->bigIncrements('id_tempo');
            $table->string('id_barang');
            $table->string('jumlah');
            $table->string('total_harga');
            $table->string('diskon');
            $table->string('deskripsi');
            $table->string('trx');
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
        Schema::dropIfExists('tempo_tables');
    }
}
