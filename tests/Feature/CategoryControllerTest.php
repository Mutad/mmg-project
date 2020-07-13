<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Category;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function category_page_displays_correct_page()
    {
        $response = $this->get(route('categories.index'));

        $response->assertStatus(200);
        $response->assertViewIs('category.all');
    }

    /** @test */
    public function creation_displays_validation_errors()
    {
        $response = $this->post(route('categories.store'),[]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name','description']);
    }

    /** @test */
    public function creating_category()
    {
        $category = factory('App\Category')->create();

        $response = $this->get(route('categories.show',['category'=>$category]));

        $response->assertStatus(200);
        $response->assertViewIs('category.single');
    }

    /** @test */
    public function editing_category(){
        $category = factory('App\Category')->create();

        $response = $this->put(route('categories.update',['category'=>$category]),['name'=>'edited','description'=>'edited']);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    /** @test */
    public function editing_category_throws_validation_errors(){
        $category = factory('App\Category')->create();

        $response = $this->put(route('categories.update',['category'=>$category]),[]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name','description']);
    }

    /** @test */
    public function deleting_category(){
        $category = factory('App\Category')->create();

        $response = $this->delete(route('categories.destroy',['category'=>$category]));

        $response->assertStatus(302);

        $response = $this->get("/category/{$category->id}");

        $response->assertStatus(404);
    }
}
