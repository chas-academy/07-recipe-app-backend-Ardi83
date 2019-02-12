<?php

use App\Ingredient;
use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredient::create(
            ['id' => '1',
            'name' => 'potato'],
            ['id' => '2',
            'name' => 'tomato'],
            ['id' => '3',
            'name' => 'salt'],
            ['id' => '4',
            'name' => 'suger'],
            ['id' => '5',
            'name' => 'water'],
            ['id' => '6',
            'name' => 'oil']
        );
    }
}
