<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipe;
use App\Http\Requests\IngredientRequest;
use App\http\Resources\IngredientResource;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    public function index(Recipe $recipe)
    {
        return IngredientResource::collection($recipe->ingredients);
    }

    public function create()
    {
        //
    }


    public function store(Recipe $recipe, IngredientRequest $request)
    {
        // $ingredient = Ingredient::create(
        //     $request->all()
        // );

        $ingredient = new Ingredient;
        $ingredient->name = $request->name;
        $id = $ingredient->id;
        $ingredient->save();
        $ingredient->amount = $ingredient->recipes()->attach($recipe, ['amount' => $request->amount]);
        
        return response([
            'data' => new IngredientResource($ingredient)
        ],201);
    }

    public function show(Ingredient $ingredient)
    {
        //
    }

    public function edit(Ingredient $ingredient)
    {
        //
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        //
    }

    public function destroy(Ingredient $ingredient)
    {
        //
    }
}
