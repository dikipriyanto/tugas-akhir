<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimasiBiayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimasi_biayas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('biaya_service');
            $table->bigInteger('biaya_sparepart');
            $table->bigInteger('biaya_kedatangan');
            $table->bigInteger('total_biaya');
            $table->bigInteger('id_pesanan')->unsigned();
            $table->timestamps();
            $table->foreign('id_pesanan')->references('id')->on('pemesanans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimasi_biayas');
    }
}
