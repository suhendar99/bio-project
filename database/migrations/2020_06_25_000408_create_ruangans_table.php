<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruangans', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nama', 100);
            $table->text('foto')->nullable();
            $table->float('smax', 10, 2);
            $table->float('smin', 10, 2);
            $table->float('kmax', 10, 2);
            $table->float('kmin', 10, 2);
            $table->float('tmax', 10, 2);
            $table->float('tmin', 10, 2);
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
        Schema::dropIfExists('ruangans');
    }
}
