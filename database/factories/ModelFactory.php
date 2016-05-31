<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'password' => 'password',
        'remember_token' => str_random(10),
        'type' => 'member',
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word,
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word,
    ];
});

$factory->define(App\Resource::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'author' => $faker->name,
        'editorial' => $faker->lastName,
        'content' => $faker->text($maxNbChars = 200),
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'category_id' => $faker->numberBetween($min = 1, $max = 8),
    ];
});

$factory->define(App\Book::class, function (Faker\Generator $faker) {
    return [
        'name' => 'biblioteca_virtual_1456892895.odt',
        'resource_id' => $faker->unique()->numberBetween($min = 1, $max = 20),
    ];
});
