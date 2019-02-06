<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ingredients');
            $table->image('url');
            $table->enum('allergic_type',['normal', 'vegan', 'vegetarian', 'lactoseFree', 'glutenFree'])->default('normal');
            $table->float('energy')->nullable();
            $table->time('cooking_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('starters');
    }
}
