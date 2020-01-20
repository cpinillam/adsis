<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'course_id_catalog' => $faker->numberBetween($min = 1, $max = 4),
        'user_id' => $faker->numberBetween($min = 1, $max = 9),
    ];
});
