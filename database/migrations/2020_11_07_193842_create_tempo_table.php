<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempo', function (Blueprint $table) {
            $table->bigIncrements('id_tempo');
            $table->string('kode_barang');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('diskon');
            $table->text('deskripsi')->nullable();
            $table->integer('total_harga');
            $table->string('id_users');
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
        Schema::dropIfExists('tempo');
    }
}
