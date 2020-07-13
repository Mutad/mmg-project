<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Category;
use App\Post;

class CategoryPostRelationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function category_adds_post()
    {
        $category = factory('App\Category')->create();

        $post = factory('App\Post')->create();

        $category->posts()->save($post);

        $this->assertTrue($category->posts->contains($post));
    }

    /** @test */
    public function post_associating_category()
    {
        $category = factory('App\Category')->create();
        $post = factory('App\Post')->create();

        $post->category()->associate($category);
        $post->save();

        $this->assertTrue($category->posts->contains($post));
    }
}
