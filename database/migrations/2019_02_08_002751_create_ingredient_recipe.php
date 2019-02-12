<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientRecipe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_recipe', function (Blueprint $table) {
            $table->integer('recipe_id');
            $table->integer('ingredient_id');
            $table->string('amount');
            $table->timestamps();

            $table->primary(['recipe_id', 'ingredient_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_recipe');
    }
}
