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

    <div class="mt-20 flex justify-center mt-20">
        <div class="border-2 flex flex-col h-48 items-center justify-center shadow-lg w-48 mx-4">
            <div>
                <i class="fas fa-hamburger text-5xl"></i>
            </div>
            <div class="mt-4">
                <i>Create and view</i>
            </div>
        </div>
        <div class="border-2 flex flex-col h-48 items-center justify-center shadow-lg w-48 mx-4">
            <div>
                <i class="fas fa-camera-retro text-5xl"></i>
            </div>
            <div class="mt-4">
                <i>Take Pictures</i>
            </div>
        </div>
        <div class="border-2 flex flex-col h-48 items-center justify-center shadow-lg w-48 mx-4">
            <div>
                <i class="far fa-envelope text-5xl"></i>
            </div>
            <div class="mt-4">
                <i>Share with friends</i>
            </div>
        </div>
    </div>
@endsection
