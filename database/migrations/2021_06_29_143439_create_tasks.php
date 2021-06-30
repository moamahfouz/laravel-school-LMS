<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_id')->unsigned();
            $table->integer('school_id');
            $table->integer('teacher_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('file')->nullable();
            $table->string('end_date')->nullable();
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('schoolclasses')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
