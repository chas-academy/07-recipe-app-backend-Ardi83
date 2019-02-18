<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Recipe;
use App\Http\Resources\MealResource;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index(Recipe $recipe)
    {
        return new MealResource($recipe->meal);
    }
}
