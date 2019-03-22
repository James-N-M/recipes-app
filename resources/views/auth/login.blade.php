@extends('layouts.app')

@section('content')
<div class="w-1/2 m-auto h-screen flex justify-center items-center">
    <form class="bg-white mb-4 pb-8 pt-6 px-8 rounded shadow-md w-1/2" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-4">
            <h1 class="text-center font-thin">Welcome Back</h1>
        </div>
        <div>
            <div class="mb-4">
                <label class="block font-bold mb-2 text-grey-darker text-sm" for="email" class="">Email Address</label>
                <input class="appearance-none border focus:outline-none focus:shadow-outline focus:border-blue-lightest
                leading-tight px-3 py-2 rounded shadow text-grey-dark w-full"
                       id="email" type="email" class="" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="mb-4">
                <label for="password" class="block font-bold mb-2 text-grey-darker text-sm">Password</label>
                <div class="">
                    <input class="appearance-none border focus:outline-none focus:shadow-outline
                    focus:border-blue-lightest leading-tight px-3 py-2 rounded shadow text-grey-dark w-full"
                           id="password" type="password" class="" name="password" required>
                </div>
            </div>

            <div>
                <div class="">
                    <button class="shadow bg-blue-light focus:shadow-outline focus:outline-none text-white font-bold
                    py-2 px-4 rounded">Sign In</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
