<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('avarage_rank')->nullable();
            $table->integer('sauce_id')->unsigned();
            $table->integer('meal_id')->unsigned();
            $table->integer('salad_id')->unsigned();
            $table->timestamps();

            $table->foreign('sauce_id')->references('id')->on('sauces');
            $table->foreign('meal_id')->references('id')->on('meals');
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
        Schema::dropIfExists('recipes');
    }
}
