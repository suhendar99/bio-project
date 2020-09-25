<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetmqttsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setmqtts', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('url_broker', 100);
            $table->string('username', 50);
            $table->string('password', 50);
            $table->string('topic', 50);
            $table->enum('qos', [0, 1,2]);
            $table->integer('keep_alive');
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
        Schema::dropIfExists('setmqtts');
    }
}
