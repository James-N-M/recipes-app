<?php

Route::group(['middleware' => 'auth'], function() {
    Route::resource('recipes', 'RecipeController');

    Route::resource('steps', 'StepController');

    Route::post('recipes/{recipe}/steps', 'RecipeStepController@store');

    Route::post('recipes/{recipe}/images', 'RecipeImageController@store');

    Route::patch('recipes/{recipe}/steps/{step}', 'RecipeStepController@update');
});


Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');
