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
                <div class="mb-10">
                    @forelse($recipe->images as $image)
                        <img src="{{asset('storage/' . $image->file_path)}}" alt="" style="height: 500px; ">
                    @empty
                        <div>
                            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{$recipe->path() . "/images"}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                                        Image Upload
                                    </label>
                                    <input name="image" value="{{$recipe->name}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" type="file">
                                </div>
                                <button type="submit" class="bg-blue font-bold px-4 py-2 rounded-lg text-white">Upload Photo</button>
                            </form>
                        </div>
                    @endforelse
                </div>

                <h2 class="font-normal text-2xl mb-4 text-grey-dark">Ingredients</h2>
                <div class="px-3 pb-6 my-2">
                    <form action="{{ $recipe->path() }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <textarea class="bg-white p-5 rounded-lg shadow w-full" placeholder="Lorem ipsum" name="ingredients" id="" rows="10">{{ $recipe->ingredients }}</textarea>
                        <button class="mt-5 bg-blue font-bold px-4 py-2 rounded-lg text-white" type="submit">Save</button>
                    </form>
                </div>

                <h2 class="font-normal text-2xl mb-4 text-grey-dark">Steps</h2>
                    @foreach($recipe->steps as $step)
                        <div class="px-3 pb-6 my-2">
                            <form method="POST" action="{{$step->path()}}">
                                @method('PATCH')
                                @csrf
                                <div class="flex w-full bg-white p-5 rounded-lg shadow">
                                    <div class="w-full text-lg font-hairline">{{ $step->description }}</div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                <div class="px-3 pb-6 my-2">
                    <form action="{{ $recipe->path() . '/steps' }}" method="POST">
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

                <div class="px-3 pb-6">
                    <div class="bg-white flex flex-col justify-between p-5 rounded-lg shadow">
                        <h3 class="font-normal text-xl py-4 -ml-5 border-l-4 border-blue-light pl-4">
                            Send To A Friend
                        </h3>

                        <div class="flex justify-between">
                            <form action="/recipes/{{$recipe->id}}}/email" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                                        Email
                                    </label>
                                    <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" type="text">
                                </div>
                                <div class="mb-4">
                                    <label class="block text-grey-darker text-sm font-bold mb-2" for="message">
                                        Message
                                    </label>
                                    <input name="message" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" type="text">
                                </div>
                                <button type="submit" class="bg-blue font-bold px-4 py-2 rounded-lg text-white">Send</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

@endsection

