<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\RecipeStep;

class RecipeStepController extends Controller
{
    public function store(Recipe $recipe)
    {
        $this->authorize('update', $recipe);

        request()->validate(['description' => 'required']);

        $recipe->addStep(request('description'));

        return redirect($recipe->path());
    }

    public function update(Recipe $recipe, RecipeStep $step)
    {
        $this->authorize('update', $step->recipe);

        $step->update([
            'description' => request('description')
        ]);

        return redirect($recipe->path());
    }

}
