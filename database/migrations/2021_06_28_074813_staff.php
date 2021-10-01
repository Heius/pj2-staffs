<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Staff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('sId');
            $table->string('sName', 30);
            $table->string('sPassword', 255);
            $table->string('sndPassword', 255);
            $table->string('sEmail', 50)->unique();
            $table->char('sNum', 10);
            $table->boolean('sPer');
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
        Schema::drop('staff');
    }
}
