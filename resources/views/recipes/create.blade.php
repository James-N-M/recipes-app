@extends('layouts.app')

@section('content')
    <h1>Stuff</h1>
<form method="POST" action="/recipes" enctype="multipart/form-data" >
    @csrf
    <input type="text" name="name">
    <input type="text" name="description">
    <input type="number" name="difficulty">
    <input type="number" name="time">
    <input type="file" name="file">
    <button type="submit">Submit</button>
</form>
@endsection
