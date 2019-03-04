@extends('layouts.app')

@section('content')
    <div class="container m-auto">
        <header class="flex items-center mb-3 py-4 h-24">
            <div class="flex justify-between items-center w-full">
                <h2 class="font-normal text-xl text-grey-dark"><a class="text-grey-dark no-underline" href="/recipes">My Recipes</a></h2>
            </div>
        </header>

        <main class="w-full">
            <h1 class="text-center mb-6 font-hairline">Add Recipe</h1>
            <div class="w-1/2 m-auto">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="/recipes" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                            Name
                        </label>
                        <input name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" type="text">
                    </div>
                    <div class="mb-4">
                        <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                            Description
                        </label>
                        <textarea name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" type="text"></textarea>
                    </div>
                    <div class="mb-4 flex justify-between">
                        <div>
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                                Difficulty
                            </label>
                            <input name="difficulty" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" type="number">
                        </div>

                        <div>
                            <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                                Time
                            </label>
                            <input name="time" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" type="number">
                        </div>
                    </div>
                    <button type="submit" class="bg-blue font-bold px-4 py-2 rounded-lg text-white">Create</button>
                </form>
            </div>
        </main>


    </div>



@endsection
