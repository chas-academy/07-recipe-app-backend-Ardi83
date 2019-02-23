<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Requests\IngredientRequest;
use App\Http\Resources\IngredientResource;
use Symfony\Component\HttpFoundation\Response;

class IngredientController extends Controller 
{
    
    public function __construct()
    {
        // $this->middleware('auth:api')->except('index', 'show');
    }

    public function index(Recipe $recipe)
    {
        return IngredientResource::collection($recipe->ingredients);
    }


    public function show(Recipe $recipe, Ingredient $ingredient)
    {
        // $ingredients = 
        foreach($ingredient->recipes as $recipe) {
            return [
                "id" => $ingredient->id,
                "name" => $ingredient->name,
                "amount" => $recipe->pivot->amount,
            ];
            response(Response::HTTP_OK);
        }
        // $ingredient->recipes()->pivot('amount')
    }

    public function store(Recipe $recipe, IngredientRequest $request)
    {     
        // We can implement validation on request body model state.
        if (1 == 1)
        {
            for ($i=0; $i < count($request->all()) ; $i++)
            { 
                $ingredient = new Ingredient;   
                $ingredient->name = $request[$i]['name'];
                $id = $ingredient->id;
                $ingredient->save();
                $ingredient->recipes()->attach($recipe, ['amount' => $request[$i]['amount']]);
                    
            }
            return response(Response::HTTP_CREATED);
        }
        else
        {
            return response(Response::HTTP_BAD_REQUEST);
        }
    }


    public function update(Recipe $recipe, Ingredient $ingredient,Request $request)
    {
        $ingredient->update([
            $ingredient->name = $request->name,
            $id = $ingredient->id,
            ]);
            $ingredient->recipes()->updateExistingPivot($recipe->id, ['amount' => $request->amount]);     
    
            return response([
                'Response' => 'Updated successfully'
            ],Response::HTTP_OK);
    }


    public function destroy(Recipe $recipe, Ingredient $ingredient)
    {
        $ingredient->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
