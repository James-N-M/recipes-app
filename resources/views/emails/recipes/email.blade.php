@component('mail::message')
# {{$recipe->name}}

{{$recipe->description}}

@component('mail::table')
    | Ingredient    | Amount        |
    | :-------------: |:-------------:|
    | Sugar       | 2 tbl      |
    | Love      | 1 cup |
@endcomponent

<ul>
@forelse ($recipe->steps as $step)
<li>{{$step->description}}</li>
@empty
## No steps included
@endforelse
</ul>

@component('mail::button', ['url' => ''])
Add To Cookbook
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
