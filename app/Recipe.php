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

    public function imagePath()
    {
        return $this->image_path;
    }

    public function addStep($description)
    {
        return $this->steps()->create(compact('description'));
    }

}
