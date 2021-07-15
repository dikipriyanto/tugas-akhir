<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pesanans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_bengkel_service');
            $table->bigInteger('id_pelanggan');
            $table->string('kode_pemesanan');
            $table->string('nama_pemesan');
            $table->string('tanggal_pemesanan');
            $table->string('status_pesanan');
            $table->string('total_biaya');
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
        Schema::dropIfExists('riwayat_pesanans');
    }
}