<?php

use Illuminate\Support\Str;

use Faker\Generator as Faker;

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

$factory->define(App\MediaLink::class, function (Faker $faker) {

            $uniqueWord = $faker->unique()->word;
            $slug = Str::slug($uniqueWord, "-");

        return [

            'name' => $uniqueWord,
            'slug' => $slug,

        ];
});