<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = auth()->user()->recipes;

        return view('recipes.index', compact('recipes'));
    }

    public function show(Recipe $recipe)
    {
        if (auth()->user()->isNot($recipe->user)) {
            abort(403);
        }

        $recipeSteps = $recipe->steps;

        return view('recipes.show', compact('recipe', compact('recipeSteps')));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'difficulty' => 'required',
            'time' => 'required',
        ]);

        $attributes['user_id'] = auth()->id();

        $recipe = Recipe::create($attributes);

        return redirect($recipe->path());
    }
}
