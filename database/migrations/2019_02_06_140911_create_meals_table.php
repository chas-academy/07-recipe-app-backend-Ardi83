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
            $table->integer('recipe_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('country')->nullable();
            $table->enum('type', ['starter', 'snack', 'main_course', 'dessert', 'salad', 'sauce']);
            $table->enum('allergic_type',['normal', 'vegan', 'vegetarian', 'lactoseFree', 'glutenFree'])->default('normal');
            $table->float('energy')->nullable();
            $table->string('preparing_time')->nullable();
            $table->string('cooking_time')->nullable();
            $table->string('image');
            $table->timestamps();

            $table->foreign('recipe_id')->references('id')->on('recipes')->onUpdate('cascade')->onDelete('cascade');                
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
