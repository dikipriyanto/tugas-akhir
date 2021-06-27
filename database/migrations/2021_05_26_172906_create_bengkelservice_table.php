<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBengkelserviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bengkelservice', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nama_jasa_service');
            $table->string('alamat_lengkap');
            $table->string('no_telepon');
            $table->string('nama_kategori');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('token')->nullable();
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
        Schema::dropIfExists('bengkelservice');
    }
}
