<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pesanan')->unsigned();
            $table->string('nama_pelanggan');
            $table->string('tanggal_pemesanan');
            $table->enum('status_pesanan',['proses','selesai','batal']);
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
        Schema::dropIfExists('status_services');
    }
}
