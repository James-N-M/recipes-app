<?php

namespace App\Mail;

use App\Recipe;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecipeEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $recipe;

    public function __construct(Recipe $recipe)
    {
        $this->recipe = $recipe;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.recipes.email')
            ->with([
                'recipe' => $this->recipe,
                'recipeSteps' =>$this->recipe->steps,
            ]);
    }
}
