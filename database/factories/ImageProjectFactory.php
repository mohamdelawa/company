<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\image_project;
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

$factory->define(image_project::class, function (Faker $faker) {
    $profile_project_id = profile_project::all()->pluck('id')->toArray();
    $images = ['../../image_projects/1.png','../../image_projects/2.png','../../image_projects/3.png','../../image_projects/4.png'];
    return [
       'profile_project_id' => $faker->randomElement($profile_project_id),
        'url' =>  $faker->randomElement($images),
    ];
});
