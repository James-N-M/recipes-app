<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Step;

class StepController extends Controller
{
    public function show(Step $step)
    {
        return view('steps.show', compact('step'));
    }

    public function store()
    {
        $attributes = [
            'recipe_id' => request('recipe_id'),
            'description' => request('description'),
            'image_path' => request('image_path'),
        ];

        $step = Step::create($attributes);

        return redirect("/recipes/$step->recipe_id");
    }
}
