<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_alerts', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('status', 100);
            $table->text('keterangan');
            $table->unsignedInteger('monitoring_id');
            $table->time('time');
            $table->timestamps();
            $table->foreign('monitoring_id')->references('id_monitoring')->on('monitorings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_alerts');
    }
}
