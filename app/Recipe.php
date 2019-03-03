<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = [];

    public function path()
    {
        return "/recipes/{$this->id}";
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function steps()
    {
        return $this->hasMany('App\RecipeStep');
    }

    public function images()
    {
        return $this->hasMany('App\RecipeImage');
    }

    public function addStep($description)
    {
        return $this->steps()->create(compact('description'));
    }

    public function addImage()
    {

        return $this->images()->create(compact('name', 'file_path'));
    }

}
