<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2a$12$5MaeYkyR0Ugcazwna7pX9eLqfGJGbOSsnbe1QkjsBMGoCu6ElQ0Pm', // password 123
        'remember_token' => Str::random(10),
        'avatar' => '/img/non_user_default.svg'
    ];
});
