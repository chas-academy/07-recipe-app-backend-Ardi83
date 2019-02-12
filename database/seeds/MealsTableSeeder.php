<?php

use App\Meal;
use Illuminate\Database\Seeder;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meal::create(
            [
            'id' => '1',
            'recipe_id' => '1',
            'name' => 'Kakori Kebabs',
            'description' => 'These Lucknowi Kebabs are nothing short of a celebration of meat.',
            'country' => 'Turky',
            'type' => 'salad',
            'allergic_type' => 'normal',
            'energy' => '450',
            'cooking_time' => '00:50',
            'image' => 'http://sjflskjflsjf',
            ]);
            Meal::create(
            [
            'id' => '2',
            'recipe_id' => '2',
            'name' => 'pizza margarita',
            'description' => 'Typical Neapolitan pizza.',
            'country' => 'Itay',
            'type' => 'main_course',
            'allergic_type' => 'vegetarian',
            'energy' => '700',
            'cooking_time' => '00:20',
            'image' => 'http://MargaritaPizza',
            ]);
    }
}
