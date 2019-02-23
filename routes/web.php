<?php

Route::group(['middleware' => 'auth'], function() {
    Route::resource('recipes', 'RecipeController');

    Route::resource('steps', 'StepController');

    Route::post('images', 'ImageController@store');

    Route::post('recipes/{recipe}/steps', 'RecipeStepController@store');

    Route::patch('recipes/{recipe}/steps/{step}', 'RecipeStepController@update');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
