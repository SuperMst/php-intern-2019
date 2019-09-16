<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    $positions = Array("Office", "Detailing", "Service", "HR");
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'position' => $positions[array_rand($positions)],
        'salary' => rand(300, 700),
    ];
});
