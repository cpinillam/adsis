<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'language' => $faker->numberBetween($min = 1, $max = 10),
        'attitude' => $faker->numberBetween($min = 1, $max = 10),
        'learning' => $faker->numberBetween($min = 1, $max = 10),
        'workflow' => $faker->numberBetween($min = 1, $max = 10),
        'evaluation_id' => $faker->numberBetween($min = 1, $max = 40),
        'filled' => 'false',
        'created_at' => $faker->unique()->dateTimeThisYear('now', null),
    ];
});
