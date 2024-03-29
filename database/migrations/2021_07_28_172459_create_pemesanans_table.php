<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kode_pemesanan')->unique();
            $table->string('nama_pemesan');
            $table->bigInteger('no_wa');
            $table->string('tanggal_pemesanan');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('alamat');
            $table->bigInteger('id_bengkel_service')->unsigned();
            $table->bigInteger('id_pelanggan')->unsigned();
            $table->enum('status_pesanan',['request','proses','selesai','batal'])->default('request');
            $table->string('informasi_tambahan')->nullable();
            $table->timestamps();
            $table->foreign('id_bengkel_service')->references('id')->on('bengkelservice')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
}
