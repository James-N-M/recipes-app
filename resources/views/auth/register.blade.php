@extends('layouts.app')

@section('content')
<div class="w-1/2 m-auto h-64 flex justify-center items-center" style="height:32rem">
    <form class="bg-white mb-4 pb-8 pt-6 px-8 rounded shadow-md w-1/2" method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <div class="mb-4">
                <label class="block font-bold mb-2 text-grey-darker text-sm" for="email">Name</label>
                <input class="appearance-none border focus:outline-none focus:shadow-outline focus:border-blue-lightest leading-tight px-3 py-2 rounded shadow text-grey-dark w-full"
                       id="name" type="text"  name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-2 text-grey-darker text-sm" for="email">Email Address</label>
                <input class="appearance-none border focus:outline-none focus:shadow-outline focus:border-blue-lightest leading-tight px-3 py-2 rounded shadow text-grey-dark w-full"
                       id="email" type="email"  name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-2 text-grey-darker text-sm" for="password">Password</label>
                <input class="appearance-none border focus:outline-none focus:shadow-outline focus:border-blue-lightest leading-tight px-3 py-2 rounded shadow text-grey-dark w-full"
                       id="password" type="password"  name="password"  required autofocus>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="mb-4">
                <label class="block font-bold mb-2 text-grey-darker text-sm" for="password">Confirm Password</label>
                <input class="appearance-none border focus:outline-none focus:shadow-outline focus:border-blue-lightest leading-tight px-3 py-2 rounded shadow text-grey-dark w-full"
                       id="password-confirm" type="password"  name="password_confirmation"  required autofocus>
            </div>
        </div>

        <div>
            <button type="submit" class="shadow bg-blue-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Register</button>
        </div>
    </form>
</div>
@endsection
