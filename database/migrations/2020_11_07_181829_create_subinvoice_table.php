<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubinvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subinvoice', function (Blueprint $table) {
            $table->bigIncrements('id_subinvoice');
            $table->integer('id_invoice');
            $table->integer('id_subworkorder');
            $table->integer('id_workorder');
            $table->integer('kode_barang');
            $table->integer('jumlah');
            $table->integer('diskon');
            $table->integer('total');
            $table->date('tanggal_transaksi');
            $table->string('no_invoice');
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
        Schema::dropIfExists('subinvoice');
    }
}
