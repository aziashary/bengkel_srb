<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubworkorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subworkorder', function (Blueprint $table) {
            $table->bigIncrements('id_subworkorder');
            $table->integer('id_workorder');
            $table->integer('kode_barang');
            $table->integer('jumlah');
            $table->integer('diskon');
            $table->integer('total');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_transaksi');
            $table->string('no_workorder');
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
        Schema::dropIfExists('subworkorder');
    }
}
