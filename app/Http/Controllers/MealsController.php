<?php

namespace App\Http\Controllers;
use App\Meal;
use App\http\Resources\MealResource;
use Illuminate\Http\Request;

class MealsController extends Controller
{
    public function index()
    {
        return MealResource::collection(Meal::paginate(15));
    }
}
