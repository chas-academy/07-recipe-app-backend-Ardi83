<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('starter_id')->unsigned();
            $table->integer('snack_id')->unsigned();
            $table->integer('main_course_id')->unsigned();
            $table->integer('dessert_id')->unsigned();
            $table->timestamps();

            $table->foreign('starter_id')->references('id')->on('starters');
            $table->foreign('snack_id')->references('id')->on('snacks');
            $table->foreign('main_courses_id')->references('id')->on('main_courses');
            $table->foreign('derssert_id')->references('id')->on('desserts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
