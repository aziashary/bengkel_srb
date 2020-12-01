<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->bigIncrements('id_invoice');
            $table->string('no_invoice')->unique();
            $table->integer('id_workorder');
            $table->string('no_workorder');
            $table->integer('id_customer');
            $table->string('no_flat');
            $table->string('model');
            $table->date('delivery_date');
            $table->integer('milleage');
            $table->integer('kilometer_awal');
            $table->date('estimasi_selesai');
            $table->integer('total_transaksi');
            $table->integer('id_user');
            $table->string('sales')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('invoice');
    }
}
