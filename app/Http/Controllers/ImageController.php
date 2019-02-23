<?php

namespace App\Http\Controllers;

use App\Image;

class ImageController extends Controller
{
    public function store()
    {
        Image::create([
            'name' => request('name'),
            'file_path' => request()->file('file')->store('file', 'public')
        ]);
        return redirect("/recipes/request('recipe_id')");
    }
}
