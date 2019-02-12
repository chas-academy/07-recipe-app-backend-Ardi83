<?php
 
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('recipes', 'RecipeController');

Route::group(['prefix' => 'recipes'], function(){
    Route::apiResource('/{recipe}/comments', 'CommentController')->only([
        'index'
    ]);
});

Route::group(['prefix' => 'recipes'], function(){
    Route::apiResource('/{recipe}/meal', 'MealController')->only([
        'index'
    ]);
});

Route::group(['prefix' => 'recipes'], function(){
    Route::apiResource('/{recipe}/ingredients', 'IngredientController');
});

Route::get('meals', [
    'uses' => 'MealsController@index',
    'as' => 'Meals'
]);














// Route::get(
//     'recipes/{recipe}/relationship/meal',
//     [
//         'uses' => \App\Http\Controllers\RecipeRelationshipController::class . '@meal',
//         'as' => 'recipes.relationship.meal',
//     ]
//     );

// Route::get(
//     'recipes/{recipe}/meal',
//     [
//         'uses' => \App\Http\Controllers\RecipeRelationshipController::class . '@meal',
//         'as' => 'recipes.meal',
//     ]
//     );