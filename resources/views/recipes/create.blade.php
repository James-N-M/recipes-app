@extends('layouts.app')

@section('content')
    <div class="container m-auto">
        <header class="flex items-center mb-3 py-4 h-24">
            <div class="flex justify-between items-center w-full">
                <h2 class="font-normal text-xl text-grey-dark"><a class="text-grey-dark no-underline" href="/recipes">My Recipes</a></h2>
            </div>
        </header>

        <main>
            <form class="w-full" action="/recipes" method="POST">
                @csrf
                <div class="flex items-center justify-center mb-6">
                    <div class="1/5">
                        <label class="block text-black font-bold mb-1 pr-4"for="">
                            Name
                        </label>
                    </div>
                    <div class="w-1/2">
                        <input class="bg-white appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" type="text" name="name">
                    </div>
                </div>

                <div class="flex items-center justify-center mb-6">
                    <div class="1/5">
                        <label class="block text-black font-bold mb-1 pr-4"for="">
                            Description
                        </label>
                    </div>
                    <div class="w-1/2">
                        <input class="bg-white appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" type="text" name="description">
                    </div>
                </div>

                <div class="flex items-center justify-center mb-6">
                    <div class="">
                        <label class="block text-black font-bold mb-1 pr-4"for="">
                            Difficulty
                        </label>
                    </div>
                    <div class="">
                        <input class="bg-white appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" type="text" name="difficulty">
                    </div>
                </div>

                <div class="flex items-center justify-center mb-6">
                    <div class="">
                        <label class="block text-black font-bold mb-1 pr-4"for="">
                            Time
                        </label>
                    </div>
                    <div class="">
                        <input class="bg-white appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" type="text" name="time">
                    </div>
                </div>


                <div class="flex items-center justify-center mb-6">
                    <div class="">
                        <label class="block text-black font-bold mb-1 pr-4"for="">
                            Notes
                        </label>
                    </div>
                    <div class="">
                        <input class="bg-white appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" type="text" name="notes">
                    </div>
                </div>
                <button type="submit" class="bg-blue font-bold px-4 py-2 rounded-lg text-white">Create</button>

            </form>
        </main>


    </div>



@endsection
