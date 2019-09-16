<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\Fakecar($faker));
    $car = $faker->vehicleArray;
    return [
        'manufacturer' => $car['brand'],
        'model' => $car['model'],
        'year' => $faker->year,
        'vin' => $faker->vin,
        'registration_number' => $faker->vehicleRegistration,
        'fuel_type' => $faker->vehicleFuelType,
        'body_style' => $faker->vehicleType,
        'gearbox_type' => $faker->vehicleGearboxType,
        'rent_price' => rand(15, 70),
        'times_rented' => rand(0, 20),
        'in_service' => rand(0, 1),
    ];
});
