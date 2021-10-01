<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Marks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('mark', function (Blueprint $table) {
            $table->unsignedInteger('mStudent');
            $table->unsignedInteger('mSubject');
            $table->float('mFinal1', 4, 2)->nullable();
            $table->float('mFinal2', 4, 2)->nullable();
            $table->float('mSkill1', 4, 2)->nullable();
            $table->float('mSkill2', 4, 2)->nullable();
            // $table->primary('mStudent');
            $table->foreign('mStudent')->references('StId')->on('students');
            $table->foreign('mSubject')->references('SubId')->on('subjects');
            $table->primary(['mSubject', 'mStudent']);
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
        Schema::drop('mark');
    }
}
