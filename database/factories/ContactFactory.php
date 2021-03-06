<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use App\contact;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(contact::class, function (Faker $faker) {

    return [
       'name' => $faker->firstName.$faker->lastName,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'message' => $faker->paragraph(2),
    ];
});
