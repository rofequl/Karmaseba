<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpShedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_shedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('day');
            $table->integer('h1')->default(0);
            $table->integer('h2')->default(0);
            $table->integer('h3')->default(0);
            $table->integer('h4')->default(0);
            $table->integer('h5')->default(0);
            $table->integer('h6')->default(0);
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
        Schema::dropIfExists('sp_shedules');
    }
}
