<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CourseCatalog;
use Faker\Generator as Faker;

$factory->define(CourseCatalog::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement($array = array ('Carpinteria','Pintura','Deporte', 'Bricolaje', 'Musica')),
        'start_date' => $faker->unique()->dateTimeThisYear($max = 'now', $timezone = null),
        'end_date' => $faker->unique()->dateTimeThisYear($max = 'now', $timezone = null),
        'weeks' => $faker->numberBetween($min = 2, $max = 5)
    ];
});
