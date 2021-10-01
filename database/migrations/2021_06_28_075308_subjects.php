<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('SubId');
            $table->string('SubName')->unique();
            $table->integer('Duration');
            $table->boolean('Final');
            $table->integer('FTD');
            $table->boolean('Skill');
            $table->integer('STD');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('subjects');
    }
}
