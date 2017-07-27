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

//alter Faker\Factory.php  const DEFAULT_LOCALE = 'zh_CN';

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

$factory->define(\App\Models\dept::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->domainName,
    ];
});

$factory->define(\App\Models\Meeting::class, function (Faker\Generator $faker) {

    return [
        'topic' => $faker->word,
//        'dept_id' => $faker->numberBetween(1,10),
        'begin_time' => $faker->dateTime,
        'duration' => $faker->numberBetween(30, 600),
        'feature' => $faker->randomElement(['common', 'phone', 'net']),
        'level' => $faker->randomElement(['high', 'middle', 'common']),
        'state' => $faker->randomElement(['prepare', 'ing', 'complete', 'cancel']),
        'contents' => $faker->text(30),
        'file' => null,
        'master' => $faker->userName,
        'host' => "$faker->address",
        'room_id' => $faker->numberBetween(1, 20),
    ];

});

$factory->define(\App\Models\Room::class, function (Faker\Generator $faker) {
    return [
        'site' => $faker->address
    ];
});

$factory->define(\App\Models\dept::class, function (Faker\Generator $faker) {
    //todo 填充静态数据

//    $depts = [
//        '业务部','工程部','生产部','管理部','销售部','市场开发部','售后服务部','' ,
//    ];
    return [

    ];
});