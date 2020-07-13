<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentRelationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function category_adds_comments(){
        $category = factory('App\Category')->create();
        $comment = factory('App\Comment')->create();

        $category->comments()->save($comment);

        $this->assertTrue($category->comments->contains($comment));
    }

    /** @test */
    public function post_adds_comments(){
        factory('App\Category')->create();
        $post = factory('App\Post')->create();
        $comment = factory('App\Comment')->create();

        $post->comments()->save($comment);

        $this->assertTrue($post->comments->contains($comment));
    }
}
