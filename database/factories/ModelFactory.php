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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\Meeting::class, function (Faker\Generator $faker) {

    return [
        'topic' => $faker->title,
        'dept' => str_random(1),
        'begin_time' => $faker->dateTime,
        'duration' => str_random(1),
        'feature' => 'sss',
        'contents' => $faker->paragraph,
        'file' => null,
        'master' => $faker->userName,
        'host' => $faker->address
    ];

});

$factory->define(\App\Models\Room::class, function (Faker\Generator $faker) {
    return [
        'site' => $faker->address
    ];
});