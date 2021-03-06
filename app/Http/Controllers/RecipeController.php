<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Mail\RecipeEmail;
use Illuminate\Support\Facades\Mail;
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

    public function update(Recipe $recipe, Request $request)
    {
        $this->authorize('update', $recipe);

        $attributes = request()->validate([
            'name' => 'required | sometimes',
            'description' => 'required | sometimes',
            'difficulty' => 'required | sometimes',
            'time' => 'required | sometimes',
            'ingredients' => 'min:3 | sometimes',
            'notes' => 'min:3 | sometimes'
        ]);

        $recipe->update($attributes);

        return redirect($recipe->path());
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'difficulty' => 'required',
            'time' => 'required',
            'ingredients' => 'min:3 | sometimes',
            'notes' => 'min:3 | sometimes'
        ]);

        $attributes['user_id'] = auth()->id();

        $recipe = Recipe::create($attributes);

        return redirect($recipe->path());
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect('recipes');
    }

    public function email(Recipe $recipe)
    {
        $message = request('message');

        Mail::to(request('email'))->send(new RecipeEmail($recipe, $message));
        return redirect($recipe->path());
    }

    public function emailRecipeIndex(Recipe $recipe)
    {
        $steps = $recipe->steps();
        return view('recipes.add-recipe-email',
            compact('steps', 'recipe'));
    }

    public function addRecipe(Recipe $recipe)
    {
        $newRecipe = $recipe->replicate();
        $newRecipe->user_id = auth()->id();
        $newRecipe->save();
        return redirect('recipes');
    }

}
