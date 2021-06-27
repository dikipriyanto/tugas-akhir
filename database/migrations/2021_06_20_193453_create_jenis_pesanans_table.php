<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis');
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
        Schema::dropIfExists('jenis_pesanans');
    }
}
