<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Recipe;
use App\RecipeStep;

class StepTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_belongs_to_a_recipe()
    {
        $step = factory('App\RecipeStep')->create();

        $this->assertInstanceOf(Recipe::class, $step->recipe);
    }

    public function test_it_has_a_path()
    {
        $step = factory(RecipeStep::class)->create();
        $this->assertEquals('/recipes/' . $step->recipe->id . '/steps/' . $step->id, $step->path());
    }
}
