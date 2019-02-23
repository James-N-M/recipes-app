@extends('layouts.app')

@section('content')

    <h1>Edit Recipe</h1>
    <a href="/recipes/{{$recipe->id}}">back to recipe</a>
    <h1>{{ $recipe->name }}</h1>
    <h1>{{ $recipe->description }}</h1>
    <h1>{{ $recipe->difficulty }}</h1>
    <h1>{{ $recipe->time }}</h1>

    <img src="{{ asset($recipe->imagePath()) }}" alt="">
@endsection
