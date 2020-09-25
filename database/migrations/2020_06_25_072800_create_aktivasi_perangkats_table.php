<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAktivasiPerangkatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktivasi_perangkats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_perangkat');
            $table->unsignedInteger('id_ruangan');
            $table->timestamps();
            $table->foreign('id_perangkat')->references('id')->on('perangkats');
            $table->foreign('id_ruangan')->references('id')->on('ruangans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aktivasi_perangkats');
    }
}
