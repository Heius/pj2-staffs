<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('students', function (Blueprint $table) {
            $table->increments('StId');
            $table->string('StName', 30);
            $table->string('StAddress', 50);
            $table->date('StDoB');
            $table->boolean('StGender');
            $table->char('StNum', 10)->unique();
            $table->string('StEmail', 50)->unique();
            $table->boolean('StStatus');
            $table->string('StCode', 10)->unique();
            $table->unsignedInteger('StClass');
            $table->string('StPassword', 255);
            $table->foreign('StClass')->references('cId')->on('classes');
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
        Schema::drop('students');
    }
}
