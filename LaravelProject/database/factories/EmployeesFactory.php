<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Employee;
use App\Company;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'company_id' => Company::all()->random()->id,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
