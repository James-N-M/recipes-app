<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Recipe;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImagesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_a_user_can_create_a_recipe_image()
    {
        $this->withoutExceptionHandling();

        $this->actingAs(factory('App\User')->create());

        Storage::fake('public');

        $this->json('post', '/images', [
            'name' => $this->faker->name,
            'recipe_id' => factory(Recipe::class)->create()->id,
            'file' => $file = UploadedFile::fake()->image('random.jpg')
        ]);

        Storage::disk('public')->assertExists('file/' . $file->hashName());
    }
}
