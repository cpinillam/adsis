<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Evaluation;
use Faker\Generator as Faker;

$factory->define(Evaluation::class, function (Faker $faker) {
    return [
        'language' => $faker->numberBetween($min = 1, $max = 10),
        'attitude' => $faker->numberBetween($min = 1, $max = 10),
        'learning' => $faker->numberBetween($min = 1, $max = 10),
        'workflow' => $faker->numberBetween($min = 1, $max = 10),
        'meteo' => $faker->numberBetween($min = 1, $max = 10),
        'course_catalog_id' => $faker->numberBetween($min = 1, $max = 4),
        'scope' => $faker->randomElement($array = array('Teoría', 'Práctica')),
        'user_id' => $faker->numberBetween($min = 1, $max = 11),
        'filled' => false,
        'created_at' => $faker->unique()->dateTimeThisYear('now', null),
    ];
});
