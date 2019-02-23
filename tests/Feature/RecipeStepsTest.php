<?php

namespace Tests\Feature;

use App\RecipeStep;
use Tests\TestCase;
use App\Recipe;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecipeStepsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

//    public function test_guests_cannot_add_steps_to_recipes()
//    {
//        $recipe = factory('App\Recipe')->create(['user_id' => '']);
//
//        $this->post($recipe->path() . '/tasks')->assertRedirect('login');
//    }
//
//    public function test_only_the_user_of_a_recipe_may_add_steps()
//    {
//        $this->signIn();
//
//        $recipe = factory('App\Recipe')->create();
//
//        $this->post($recipe->path() . '/tasks', ['description' => 'test description'])
//            ->assertStatus(403);
//
//        $this->assertDatabaseMissing('recipe_steps', ['test description']);
//    }

    public function test_a_recipe_can_have_steps()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $recipe = factory(Recipe::class)->create(['user_id' => auth()->id()]);

        $this->post($recipe->path() . '/steps' , ['description' => 'This is a recipe step description']);

        $this->get($recipe->path())
            ->assertSee('This is a recipe step description');
    }

    public function test_a_step_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->signIn();

        $recipe = factory(Recipe::class)->create(['user_id' => auth()->id()]);

        $step = factory(RecipeStep::class)->create(['recipe_id' => $recipe->id]);

        $this->patch($recipe->path() . '/steps/' . $step->id, ['description' => 'the new updated description']);

        $this->assertDatabaseHas('recipe_steps', ['description' => 'the new updated description']);

        $this->get($recipe->path())
            ->assertSee('the new updated description');
    }

    public function test_the_owner_of_a_recipe_may_update_a_step()
    {
        $this->signIn();

        $recipe = factory(Recipe::class)->create();

        $step = $recipe->addStep('This is a step!');

        $this->patch($recipe->path() . '/steps/' . $step->id, ['description' => 'the new updated description'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('recipe_steps', ['description' => 'the new updated description']);
    }

//    public function testRequiresADescription()
//    {
//        $this->signIn();
//
//        $recipe = factory(Recipe::class)->create(['user_id' => auth()->id()]);
//
//        $attributes = factory(RecipeStep::class)->raw(['description' => '']);
//
//        $this->post($recipe->path(), $attributes)->assertSessionHasErrors('description');
//    }
}
