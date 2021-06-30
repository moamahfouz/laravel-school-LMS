<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentClasses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->integer('school_id')->unsigned();
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('schoolclasses')->onDelete('cascade');
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_classes');
    }
}
