<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $commentable = [
        App\Category::class,
        App\Post::class
    ];

    // Creating at least one category and post for comment
    if (App\Category::all()->count() == 0) {
        factory('App\Category')->create();
    }
    if (App\Post::all()->count() == 0) {
        factory('App\Post')->create();
    }

    //Selecting random commentable type from array
    //and selecting random id of this type
    $commentableType = $faker->randomElement($commentable);
    $commentableId = $commentableType::all(['id'])->random();

    return [
        'author'=>$faker->firstName . ' '. $faker->lastName,
        'content'=>$faker->paragraph,
        'commentable_type' => $commentableType,
        'commentable_id' => $commentableId,
    ];
});
