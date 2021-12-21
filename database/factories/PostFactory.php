<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->words( 3, true),
        'content' => $faker->paragraph( 1),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
        'rubric_id' => $faker->numberBetween(1, 4)
    ];
});
