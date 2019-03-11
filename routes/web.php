<?php

Route::group(['middleware' => 'auth'], function() {
    Route::resource('recipes', 'RecipeController');

    Route::post('recipes/{recipe}/email', 'RecipeController@email');

    Route::resource('steps', 'StepController');

    Route::post('recipes/{recipe}/steps', 'RecipeStepController@store');

    Route::post('recipes/{recipe}/images', 'RecipeImageController@store');

    Route::patch('recipes/{recipe}/steps/{step}', 'RecipeStepController@update');
});

Auth::routes();

Route::get('/demo', function () {
    return new App\Mail\RecipeEmail(factory('App\Recipe')->create());
});

Route::get('/', function () {
    echo "welcome";
});
