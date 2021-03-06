<?php

namespace Tests\Feature;

use App\Recipe;
use App\User;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
        $this->get('/recipes/create')->assertRedirect('/login');
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
            'notes' => $this->faker->text,
        ];

        $this->get('/recipes/create')->assertStatus(200); // they can access a create page

        $this->post('/recipes', $attributes);

        $this->assertDatabaseHas('recipes', $attributes);

        $this->get('/recipes')->assertSee($attributes['name']);
    }

    public function test_a_user_can_update_a_recipe()
    {
        $this->withoutExceptionHandling(); // when exceptions are thrown laravel catches them but we want the exception

        $this->signIn();

        $recipe = factory(Recipe::class)->create(['user_id' => auth()->id()]);

        $this->patch($recipe->path(), ['notes' => 'this is a note','difficulty' => 2]);

        $this->assertDatabaseHas('recipes', ['difficulty' => 2]);
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

    public function test_the_owner_of_a_recipe_may_update_it()
    {
        $this->withExceptionHandling();
        $this->signIn();

        $recipe = factory(Recipe::class)->create();

        $this->patch($recipe->path(), ['notes' => 'the new updated notes section'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('recipes', ['notes' => 'the new updated notes section']);
    }

    public function test_the_owner_of_a_recipe_may_upload_a_picture()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $recipe = factory(Recipe::class)->create(['user_id' => auth()->id()]);

        Storage::fake('public');

        $this->post($recipe->path() . '/images' , [
            'image' => $file = UploadedFile::fake()->image('image.jpg')
        ]);

        $this->assertDatabaseHas('recipe_images', ['name' => $file->hashName()]);

        Storage::disk('public')->assertExists('images/' . $file->hashName()); // check to see the image got uploaded

    }

//    public function test_the_owner_of_a_recipe_may_email_it_to_someone()
//    {
//        $this->withoutExceptionHandling();
//        $this->signIn();
//        $recipe = factory(Recipe::class)->create(['user_id' => auth()->id()]);
//
//        $this->post($recipe->path() . '/email', ['email' => 'test@test.com'])->assertStatus(302);
//    }

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
