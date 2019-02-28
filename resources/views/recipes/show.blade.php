@extends('layouts.app')

@section('content')
    <div class="container m-auto">
        <header class="flex items-center mb-3 py-4 h-24">
            <div class="flex justify-between items-center w-full">
                <h2 class="font-normal text-xl text-grey-dark"><a class="text-grey-dark no-underline" href="/recipes">My Recipes</a> / {{ $recipe->name }}</h2>

                <a href="/recipes/create"><button class="bg-blue font-bold px-4 py-2 rounded-lg text-white">New Recipe</button></a>
            </div>
        </header>

        <main class="flex flex-wrap">
            <div class="w-2/3">
                <h2 class="font-normal text-2xl mb-4 text-grey-dark">Steps</h2>
                    @foreach($recipe->steps as $step)
                        <div class="px-3 pb-6 my-2">
                            <form method="POST" action="{{$step->path()}}">
                                @method('PATCH')
                                @csrf
                                <div class="flex w-full bg-white p-5 rounded-lg shadow">
                                    {{--<input name="description" class="w-full text-lg font-hairline" value="{{ $step->description }}">--}}
                                    <div class="w-full text-lg font-hairline">{{ $step->description }}</div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                <div class="px-3 pb-6 my-2">
                    <form action="{{ $recipe->path() . '/steps' }}" method="POST" >
                        @csrf
                        <div class="bg-white p-5 rounded-lg shadow">
                            <input placeholder="Add a new step..." class="w-full" name="description">
                        </div>
                    </form>
                </div>

                <h2 class="font-normal text-2xl mb-4 text-grey-dark">General Notes</h2>
                <div class="px-3 pb-6 my-2">
                    <form action="{{ $recipe->path() }}" method="POST" >
                        @method('PATCH')
                        @csrf
                        <textarea class="bg-white p-5 rounded-lg shadow w-full" placeholder="Lorem ipsum" name="notes" id="" rows="10">{{ $recipe->notes }}</textarea>
                        <button class="mt-5 bg-blue font-bold px-4 py-2 rounded-lg text-white" type="submit">Save</button>
                    </form>
                </div>
            </div>
            <div class="w-1/3">
                @include('partials/card')
            </div>
        </main>
    </div>

@endsection

