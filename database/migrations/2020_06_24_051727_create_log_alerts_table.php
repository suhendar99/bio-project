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
            $table->bigIncrements('id');
            $table->string('status');
            $table->string('keterangan');
            $table->unsignedInteger('monitoring_id');
            $table->foreign('monitoring_id')->references('id_monitoring')->on('monitoring');
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
        Schema::dropIfExists('log_alerts');
    }
}
