<?php

use App\Ingredient;
use App\Recipe;
use App\Comment;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(IngredientsTableSeeder::class);
        // $this->call(RecipesTableSeeder::class);
        // $this->command->info('first starter table seeded!');
        
        
        $user1 = new User();
        $user1->id = '1';
        $user1->name = 'Ardi';
        $user1->email = 'ardi@gmail.com';
        $user1->password = 'Ardi1234';
        $user1->save();
        
        $user2 = new User();
        $user2->id = '2';
        $user2->name = 'John';
        $user2->email = 'John@gmail.com';
        $user2->password = 'john1234';
        $user2->save();
        
        
        $recipe1 = new Recipe();
        $recipe1->id = '1';
        // $recipe1->author ='Ardi';
        $recipe1->title = 'the first recipe title';
        $recipe1->instructure = '1.Mix all ingredients except ghee and garnishes to marinate for about 4 hours, then grind to form a smooth, thick paste.
        2.Knead this mixture well and mix in the roasted gram and the egg.
        3.Cover and refrigerate for another hour.
        4.About 25 minutes before serving, shape the meat around the skewers and place the kebabs on to a grill over a drip tray, or in a pre-heated oven (also on a drip tray).
        5.If cooking them over a charcoal grill, you will have to keep rotating them so that they brown and cook evenly.
        6.They should take 15-20 minutes to cook.
        7.Brush with ghee and cook another 2 minutes.
        8.Serve garnished with chaat masala onions and the lemon and serve with green chutney.';
        $recipe1->save();
        
        
        
        $recipe2 = new Recipe();
        $recipe2->id = '2';
        $recipe2->author ='Ica';
        // $recipe2->title = 'the first recipe title';
        $recipe2->instructure = 'Sätt ugnen på 250 grader.
        Dela degen i 4 delar och forma till bollar, låt jäsa 15 minuter.
        Kavla ut varje degbit tunt och lägg över på en plåt med bakplåtspapper innan du toppar pizzan.
        Bred ut tomatsås på pizzorna och toppa med ost.
        Tillaga pizzan längst ned i ugnen tills den fått fin färg.';
        $recipe2->save();
        



        $this->call(MealsTableSeeder::class);


        
        $ingredient1 = new Ingredient();
        $ingredient1->id = "1";
        $ingredient1->name= "Potato";
        $ingredient1->save();
        
        $ingredient2 = new Ingredient();
        $ingredient2->id = "2";
        $ingredient2->name= "Salt";
        $ingredient2->save();
        
        $ingredient1->recipes()->attach($recipe1, ['amount'=> '2gr']);
        $ingredient2->recipes()->attach($recipe1, ['amount'=> '1ts']);
        
        
        
        
        $ingredient3 = new Ingredient();
        $ingredient3->id = "3";
        $ingredient3->name= "Cheese";
        $ingredient3->save();
       
        $ingredient4 = new Ingredient();
        $ingredient4->id = "4";
        $ingredient4->name= "TomatSås";
        $ingredient4->save();

        $ingredient3->recipes()->attach($recipe2, ['amount'=> '20gr']);
        $ingredient2->recipes()->attach($recipe2, ['amount'=> '1ts']);
        $ingredient4->recipes()->attach($recipe2, ['amount'=> '10dl']);



        $comment1 = new Comment();
        $comment1->id = '1';
        $comment1->headline = 'the first comment';
        $comment1->body = 'this is really good salads recipe';
        $comment1->rank = '5';
        $comment1->recipe_id = '1';
        $comment1->user_id = '1';
        $comment1->save();
       
        $comment2 = new Comment();
        $comment2->id = '2';
        $comment2->headline = 'the second comment';
        $comment2->body = 'this is really awsome recpi';
        $comment2->rank = '4';
        $comment2->recipe_id = '1';
        $comment2->user_id = '1';
        $comment2->save();

        $comment3 = new Comment();
        $comment3->id = '3';
        // $comment3->headline = 'the third comment';
        $comment3->body = 'this is not bad pizza recipe';
        $comment3->rank = '3';
        $comment3->recipe_id = '2';
        $comment3->user_id = '2';
        $comment3->save();
       
        $comment4 = new Comment();
        $comment4->id = '4';
        $comment4->headline = 'the fourth comment';
        $comment4->body = 'this is bad recpi';
        $comment4->rank = '2';
        $comment4->recipe_id = '2';
        $comment4->user_id = '1';
        $comment4->save();



    }
}
