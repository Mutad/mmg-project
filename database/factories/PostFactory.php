<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    //Creating at least one category for post seeding
    if (App\Category::all()->count() == 0){
        factory('App\Category')->create();
    }

    return [
        'name'=>$faker->sentence,
        'content'=>$faker->realtext(200,2),
        'category_id'=>App\Category::all(['id'])->random(),
        'file_path'=>"temp.png"
    ];
});
