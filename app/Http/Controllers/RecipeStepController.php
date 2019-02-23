<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\RecipeStep;

class RecipeStepController extends Controller
{
    public function store(Recipe $recipe)
    {
        if(auth()->user()->id != $recipe->user_id) {
            abort(403);
        }

        request()->validate(['description' => 'required']);

        $recipe->addStep(request('description'));

        return redirect($recipe->path());
    }

    public function update(Recipe $recipe, RecipeStep $step)
    {
        if(auth()->user()->id != $recipe->user_id) {
            abort(403);
        }
        $step->update([
            'description' => request('description')
        ]);

        return redirect($recipe->path());
    }

}
