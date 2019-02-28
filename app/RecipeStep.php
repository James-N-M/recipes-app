<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeStep extends Model
{
    protected $guarded = [];

    protected $touches = ['recipe'];

    public function path()
    {
        return "/recipes/{$this->recipe->id}/steps/{$this->id}";
    }

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }

}
