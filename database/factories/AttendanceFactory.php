<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attendance;
use Faker\Generator as Faker;

$factory->define(Attendance::class, function (Faker $faker) {
    $attendance=array("A","FI","FJ","RJ","RI");
    $a_type=array_rand($attendance,1);
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 9),
        'tutor_id' => $faker->numberBetween($min = 1, $max = 3),
        'attendance_type'=> $attendance[$a_type],
        'comment' => $faker->text(100)
    ];
});
