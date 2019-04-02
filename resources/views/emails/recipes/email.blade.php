@component('mail::message')
# {{$recipe->name}}

{{$recipe->description}}

@component('mail::panel')
{{$recipe->ingredients}}
@endcomponent

<ul>
@forelse ($recipe->steps as $step)
<li>{{$step->description}}</li>
@empty
No steps included
@endforelse
</ul>

<i>Time {{$recipe->time}}</i>

@component('mail::button', ['url' => "{$link}"])
Add To Cookbook
@endcomponent

Thanks, {{$message}}<br>
{{ config('app.name') }}
@endcomponent
