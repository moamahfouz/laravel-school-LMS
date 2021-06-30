<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->string('first')->nullable();
            $table->string('mid')->nullable();
            $table->string('final')->nullable();
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('schoolclasses')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}
