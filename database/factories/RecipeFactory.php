<?php

use Faker\Generator as Faker;

$factory->define(App\Recipe::class, function (Faker $faker) {
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    return [
        'name' => $faker->foodName(),
        'user_id' => factory(App\User::class)->create()->id,
        'description' => $faker->sentence(4),
        'difficulty' => $faker->numberBetween(1,5),
        'time' => $faker->numberBetween(1,60),
    ];
});
