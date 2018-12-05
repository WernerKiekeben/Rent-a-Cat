<?php

use Faker\Generator as Faker;

$factory->define(App\Cars::class, function (Faker $faker) {
    return [
        'brand' => $faker->randomElement(['Mercedes','BMW','Ford','Renault','VW','Opel','Audi','Nissan']),
        'model' => $faker->randomElement(['Benz','Class A','M8','Focus','Megan','Golf','Polo','Corsa','R8','Micra']),
        'year' => $faker->numberBetween(2000, 2018),
        'description' => $faker->sentence(),
        'availability' => $faker->numberBetween(0,1),
        'filename' => 'car'.$faker->numberBetween(1,9).'.jpg',
    ];
});
