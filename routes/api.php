<?php
 
use Illuminate\Http\Request;

Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'ChangePasswordController@process');
});



Route::resource('recipes', 'RecipeController');

Route::group([

    'prefix' => 'recipes'], function(){
    Route::apiResource('/{recipe}/comments', 'CommentController')->only([
        'index'
    ]);
});

Route::group([

    'prefix' => 'recipes'], function(){
    Route::apiResource('/{recipe}/meal', 'MealController')->only([
        'index'
    ]);
});

Route::group([

    'prefix' => 'recipes'], function(){
    Route::apiResource('/{recipe}/ingredients', 'IngredientController');
});

Route::get('meals', [
    'uses' => 'MealsController@index',
    'as' => 'Meals'
]);

Route::get('ingredients', [
    'uses' => 'IngredientsController@index',
    'as' => 'Ingredients'
]);
