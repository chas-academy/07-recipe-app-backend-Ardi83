<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Recipe;
use App\Http\Resources\IngredientResource;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    public function index()
    {
        return Ingredient::all();
    }
}
