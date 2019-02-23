<?php

namespace Tests\Feature;

use App\Recipe;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecipesTest extends TestCase
{
    // Fake data, and dump / migrate databases each time
    use WithFaker, RefreshDatabase;

    public function test_a_guest_cant_manage_recipes()
    {
        // you want exception handing to handle the redirect to login
        $recipe = factory('App\Recipe')->create();

        // so that non signed in users cant check your recipes
        $this->get('/recipes')->assertRedirect('/login');
        $this->get("/recipes/$recipe->id")->assertRedirect('/login');
    }

    public function test_a_user_can_create_a_recipe()
    {
        $this->withoutExceptionHandling(); // when exceptions are thrown laravel catches them but we want the exception

        $this->signIn();

        $attributes = [
          'name' => $this->faker->name,
          'description' => $this->faker->sentence,
          'difficulty' => $this->faker->numberBetween(1,5),
          'time' => $this->faker->numberBetween(1,5),
        ];

        $this->post('/recipes', $attributes); // remove the assert redirect  its mundane ..

        $this->assertDatabaseHas('recipes', $attributes);

        $this->get('/recipes')->assertSee($attributes['name']);
    }

    public function test_a_user_can_view_their_recipe()
    {
        $this->withoutExceptionHandling();

        // being the authenticated user
        $this->be(factory('App\User')->create());

        $recipe = factory('App\Recipe')->create(['user_id' => auth()->id()]);

        $this->get($recipe->path())
            ->assertSee($recipe->name);
    }

    public function testRecipeRequiresName()
    {
        $this->signIn();

        $attributes = factory('App\Recipe')->raw(['name' => '']);

        $this->post('/recipes', $attributes)->assertSessionHasErrors('name');
    }

    public function testRecipeRequiresDescription()
    {
        $this->signIn();
        $attributes = factory('App\Recipe')->raw(['description' => '']);

        $this->post('/recipes', $attributes)->assertSessionHasErrors('description');
    }

    public function testRecipeRequiresDifficulty()
    {
        $this->signIn();
        $attributes = factory('App\Recipe')->raw(['difficulty' => '']);
        $this->post('/recipes', $attributes)->assertSessionHasErrors('difficulty');
    }

    public function testRecipeRequiresTime()
    {
        $this->signIn();
        $attributes = factory('App\Recipe')->raw(['time' => '']);
        $this->post('/recipes', $attributes)->assertSessionHasErrors('time');
    }

}
