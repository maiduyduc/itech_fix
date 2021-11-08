<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\courses::class, function (Faker $faker) {
    return [
        'id' => $faker->unique()->ean8,
        'name' => $faker->text(100),
        'image_path' => '/img/course-javascript.jpg',
        'content' => $faker->text,
        'subscriptions' => random_int(0,5555),
        'category_id' => random_int(1,7),
        'created_at' => $faker->time(),
        'updated_at' => $faker->time(),
        'image_name' => 'course-javascript.jpg',
    ];
});
