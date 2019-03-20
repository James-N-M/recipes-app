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

    public $recipe, $message;
    public function __construct(Recipe $recipe, $message)
    {
        $this->recipe = $recipe;
        $this->message = $message;
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
                'message' => $this->message,
            ]);
    }
}
