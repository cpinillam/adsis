<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Evaluation;
use Faker\Generator as Faker;

$factory->define(Evaluation::class, function (Faker $faker) {
    return [
        'language' => $faker->numberBetween($min = 1, $max = 5),
        'attitude' => $faker->numberBetween($min = 1, $max = 5),
        'participation' => $faker->numberBetween($min = 1, $max = 5),
        'learning' => $faker->numberBetween($min = 1, $max = 5),
        'language' => $faker->numberBetween($min = 1, $max = 5),
        'collaboration' => $faker->numberBetween($min = 1, $max = 5),
        'meteo' => $faker->numberBetween($min = 1, $max = 5),
        'user_id' => $faker->numberBetween($min = 1, $max = 5),
        'review_status' => $faker->boolean
    ];
});
