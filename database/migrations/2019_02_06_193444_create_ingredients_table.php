<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supply_id');
            $table->integer('starter_id');
            $table->integer('snack_id');
            $table->integer('main_course');
            $table->integer('dessert_id');
            $table->integer('sauce_id');
            $table->integer('salad_id');
            $table->float('amount');
            $table->enum('units', ['kg', 'g', 'dg', 'hg', 'ts', 'Ts', 'cup', 'l',
            'ml', 'dl']);            
            $table->timestamps();

            $table->foreign('supply_id')->references('id')->on('supplies');
            $table->foreign('starter_id')->references('id')->on('starters');
            $table->foreign('snack_id')->references('id')->on('snacks');
            $table->foreign('main_course_id')->references('id')->on('main_courses');
            $table->foreign('dessert_id')->references('id')->on('desserts');
            $table->foreign('sauce_id')->references('id')->on('sauces');
            $table->foreign('salad_id')->references('id')->on('salads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
