<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCharachtersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charachters', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('m');
            $table->integer('ws');
            $table->integer('bs');
            $table->integer('s');
            $table->integer('t');
            $table->integer('w');
            $table->integer('i');
            $table->integer('a');
            $table->integer('ld');
            $table->integer('sv');
            $table->string('specialRules');
            $table->string('equipment');
            $table->integer('xp');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('charachters');
    }
}
