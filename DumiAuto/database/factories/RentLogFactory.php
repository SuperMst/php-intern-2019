<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RentLog;
use Faker\Generator as Faker;

$factory->define(RentLog::class, function (Faker $faker) {
    
    $date_start = $faker->dateTimeBetween('now', '+30 days');;
    $date_end = $faker->dateTimeBetween($date_start, $date_start->add(new DateInterval('P1D')));
    return [
        'car_id' => rand(1, 25),
        'user_id' => rand(1, 10),
        'start_date' => $date_start,
        'end_date' => $date_end,
    ];
});
