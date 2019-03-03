<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\RecipeImage;

class RecipeImageController extends Controller
{
    public function store(Recipe $recipe)
    {
        if (auth()->user()->isNot($recipe->user)) {
            abort(403);
        }

        request()->validate(['image' => 'required']);

        $recipeImage = RecipeImage::create([
            'recipe_id' => $recipe->id,
            'name' => request()->file('image')->hashName(),
            'file_path' => request()->file('image')->store('images', 'public')
            ]);

        $recipeImage->save();

        return redirect($recipe->path());
    }
}
