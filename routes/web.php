<?php

Route::get('/', function () {
    return view('home');
});

Route::group(['middleware' => 'auth'], function() {
    Route::resource('recipes', 'RecipeController');

    Route::post('recipes/{recipe}/email', 'RecipeController@email');

    Route::resource('steps', 'StepController');

    Route::post('recipes/{recipe}/steps', 'RecipeStepController@store');

    Route::post('recipes/{recipe}/images', 'RecipeImageController@store');

    Route::patch('recipes/{recipe}/steps/{step}', 'RecipeStepController@update');

    Route::get('add-to-recipes/{recipe}','RecipeController@emailRecipeIndex');

    Route::post('add-to-recipes/{recipe}','RecipeController@addRecipe');
});

Auth::routes();

Route::get('/demo', function () {
    return new App\Mail\RecipeEmail(factory('App\Recipe')->create());
});

