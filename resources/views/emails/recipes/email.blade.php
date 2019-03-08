@component('mail::message')
# {{$recipe->name}}

{{$recipe->description}}

<div>
    Time: <i>{{$recipe->time}} minutes</i>
</div>

<div>
    Difficulty: <i>1/{{$recipe->difficulty}}</i>
</div>

@component('mail::panel')
    <ol>
    @foreach($recipeSteps as $step)
        <li>{{$step->description}}</li>
    @endforeach
    </ol>
@endcomponent

@component('mail::table')
    | Ingredient    | Amount     |
    | ------------- |:-------------:|
    | item      | 1 tsp      |
    | item 2      | 2 tsp |
@endcomponent

@component('mail::button', ['url' => '/recipes/add'])
    Add To Cookbook
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
