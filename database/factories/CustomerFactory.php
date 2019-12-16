<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'age' => $faker->numberBetween(18, 60),
        'email' => $faker->unique()->safeEmail,
        'documentid' => $faker->unique()->numberBetween(10000000, 90000000),
        'phone' => $faker->tollFreePhoneNumber
    ];
});
