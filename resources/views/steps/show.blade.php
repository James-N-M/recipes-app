@extends('layouts.app')

@section('content')
    <h1>Show Step</h1>
    <a href="/recipes/{{$step->recipe_id}}">back to recipe</a>
@endsection
