<?php

use Faker\Generator as Faker;

$factory->define(App\Cars::class, function (Faker $faker) {
    return [
        'brand' => $faker->name,
        'model' => $faker->name,
        'year' => $faker->numberBetween(2000, 2018),
        'description' => $faker->sentence(),
        'availability' => $faker->numberBetween(0,1),
        'filename' => 'car'.$faker->numberBetween(1,9).'.jpg',
    ];
});
