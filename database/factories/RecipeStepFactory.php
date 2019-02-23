<?php

use Faker\Generator as Faker;

$factory->define(App\RecipeStep::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence,
        'recipe_id' => function () {
            return factory(App\Recipe::class)->create()->id;
        }
    ];
});
