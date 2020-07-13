<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $commentable = [
        App\Category::class,
        App\Post::class
    ];

    $commentableType = $faker->randomElement($commentable);
    $commentableId = $commentableType::all(['id'])->random();

    return [
        'author'=>$faker->firstName . ' '. $faker->lastName,
        'content'=>$faker->paragraph,
        'commentable_type' => $commentableType,
        'commentable_id' => $commentableId,
    ];
});
