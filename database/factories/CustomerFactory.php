<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'email' => $faker->unique()->email,
        'city' => $faker->city
    ];
});
