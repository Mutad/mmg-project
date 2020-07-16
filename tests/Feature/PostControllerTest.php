<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function creation_displays_validation_errors()
    {
        $response = $this->post(route('posts.store'),[]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name','content']);
    }

    /** @test */
    public function creating_post()
    {
        $post = factory('App\Post')->create();

        $response = $this->get(route('posts.show',['post'=>$post]));

        $response->assertStatus(200);
        $response->assertViewIs('post.single');
    }

    /** @test */
    public function editing_post(){
        $category = factory('App\Category')->create();
        $post = factory('App\Post')->create();

        $response = $this->put(route('posts.update',['post'=>$post]),['category_id'=>1,'name'=>'edited','content'=>'edited']);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $this->assertTrue($category->posts->contains($post));
    }

    /** @test */
    public function editing_post_throws_validation_errors(){
        $post = factory('App\Post')->create();

        $response = $this->put(route('posts.update',['post'=>$post]),[]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name','content']);
    }

    /** @test */
    public function deleting_category(){
        $post = factory('App\Post')->create();

        $response = $this->get(route('posts.destroy',['post'=>$post]));

        $response->assertStatus(302);

        $response = $this->get(route('posts.show',['post'=>$post]));

        $response->assertStatus(404);
    }
}
