<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\project;
use App\profile;
use Faker\Generator as Faker;
use App\profile_project;

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

$factory->define(profile_project::class, function (Faker $faker) {
    $profile_ids= profile::all()->pluck('id')->toArray();
    $project_ids= project::all()->pluck('id')->toArray();
    return [
       'profile_id' => $faker->randomElement($profile_ids),
       'project_id' => $faker->randomElement($project_ids),
    ];
});
