<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecipeTest extends TestCase
{
    use RefreshDatabase;
    public function test_it_has_a_path()
    {
        $recipe = factory('App\Recipe')->create();

        $this->assertEquals("/recipes/" . $recipe->id, $recipe->path());
    }

    public function test_it_belongs_to_a_user()
    {
        $recipe = factory('App\Recipe')->create();

        $this->assertInstanceOf('App\User', $recipe->user);
    }

    public function test_it_can_add_a_step()
    {
        $recipe = factory('App\Recipe')->create();

        $step = $recipe->addStep('this is a step description');

        $this->assertCount(1, $recipe->steps);
        $this->assertTrue($recipe->steps->contains($step));
    }
}
