<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Admin::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->word,
        'email' => $faker->email,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Link::class, function (Faker $faker) {
    return [
        'address' => $faker->url,
        'description' => $faker->sentence
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
        return [
            'name' => $faker->word
        ];
});
