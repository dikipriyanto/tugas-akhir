<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVerifiedToBengkelservice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bengkelservice', function (Blueprint $table) {
            $table->tinyInteger('verified')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bengkelservice', function (Blueprint $table) {
            $table->dropColumn(['verified']);
        });
    }
}
