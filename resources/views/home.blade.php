@extends('layouts.guest')

@section('content')
    <div class="flex flex-col items-center pt-20">
        <h1 class="font-light text-5xl">Welcome To Recipes !</h1>
        <div class="mt-10">
            <a class="no-underline text-blue text-lg" href="/register">Sign up</a>
            <span class="mx-2">or</span>
            <a href="/login" class="no-underline border-2 border-blue-light px-10 py-3 rounded-lg text-blue text-lg font-bold">
                Login in
            </a>
        </div>
    </div>
@endsection
