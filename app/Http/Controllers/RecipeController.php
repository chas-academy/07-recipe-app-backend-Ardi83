<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Meal;
use App\http\Resources\RecipesResource;
use App\http\Resources\RecipeResource;
use App\http\Requests\RecipeRequest;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:api')->except('index', 'show');
    }

    public function index()
    {
        return new RecipesResource(Recipe::with(['meal', 'ingredients', 'comments'])->paginate(15));
    }

    public function create()
    {
        
    }

    public function store(Recipe $recipe, RecipeRequest $request)
    {
        $recipe = new Recipe;
        $recipe->author = $request->author;
        $recipe->title = $request->title;
        $recipe->instructure = $request->instructure;
        $id = $recipe->id;
        $recipe->save();
        
        $meal = new Meal;
        $meal->recipe_id = $recipe->id;
        $meal->name = $request->name;
        $meal->description = $request->description;
        $meal->country = $request->country;
        $meal->type = $request->type;
        $meal->allergic_type = $request->allergic_type;
        $meal->energy = $request->energy;
        $meal->cooking_time = $request->cooking_time;
        $meal->preparing_time = $request->preparing_time;
        $meal->image = $request->image;
        $id = $meal->id;
        $meal->save();
        

        return response([
        'data' => new RecipeResource($recipe)
        ],201);
    }

    public function show(Recipe $recipe)
    {
        return new RecipeResource($recipe);
    }

    public function edit(Recipe $recipe)
    {
        //
    }

    public function update(Request $request, Recipe $recipe)
    {
            return [
                $recipe->update($request->all()),
                $recipe->meal->update($request->all()),
                // response([new RecipeResource($recipe)],201)
            ];
            // return 
    }

    public function destroy(Request $request, Recipe $recipe)
    {           
            $recipe->delete();
            return response(null,204);
    }
}
