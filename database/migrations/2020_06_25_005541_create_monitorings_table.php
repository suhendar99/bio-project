<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitorings', function (Blueprint $table) {
            $table->Increments('id_monitoring');
            $table->date('date');
            $table->time('time');
            $table->float('suhu', 10, 2);
            $table->float('kelembapan', 10, 2);
            $table->float('tekanan', 10, 2);
            $table->string('perangkat_id')->references('no_seri')->on('perangkats');
            $table->unsignedInteger('ruangan_id');
            $table->string('cvc', 10);
            $table->string('vvc', 10);
            $table->foreign('ruangan_id')->references('id')->on('ruangans')->onDelete('cascade');
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
        Schema::dropIfExists('monitorings');
    }
}
