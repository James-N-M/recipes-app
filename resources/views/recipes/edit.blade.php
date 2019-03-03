@extends('layouts.app')

@section('content')
    <div class="container m-auto">
        <header class="flex items-center mb-3 py-4 h-24">
            <div class="flex justify-between items-center w-full">
                <h2 class="font-normal text-xl text-grey-dark"><a class="text-grey-dark no-underline" href="{{$recipe->path()}}">{{$recipe->name}}</a></h2>
            </div>
        </header>

    <main>
        <form class="w-full" action="{{$recipe->path()}}" method="POST">
            @method('PATCH')
            @csrf
            <div class="flex items-center justify-center mb-6">
                <div class>
                    <label class="block text-black font-bold mb-1 pr-4"for="">
                        Name
                    </label>
                </div>
                <div class="w-1/3">
                    <input class="bg-white appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" type="text" name="name" value="{{$recipe->name}}">
                </div>
            </div>

            <div class="flex items-center justify-center mb-6">
                <div>
                    <label class="block text-black font-bold mb-1 pr-4"for="">
                        Description
                    </label>
                </div>
                <div class="w-1/3">
                    <input class="bg-white appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" type="text" name="description" value="{{$recipe->description}}">
                </div>
            </div>

            <div class="flex items-center justify-center mb-6">
                <div class="">
                    <label class="block text-black font-bold mb-1 pr-4"for="">
                        Difficulty
                    </label>
                </div>
                <div class="">
                    <input class="bg-white appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" type="text" name="difficulty" value="{{$recipe->difficulty}}">
                </div>
            </div>

            <div class="flex items-center justify-center mb-6">
                <div class="">
                    <label class="block text-black font-bold mb-1 pr-4"for="">
                        Time
                    </label>
                </div>
                <div class="">
                    <input class="bg-white appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" type="text" name="time" value="{{$recipe->time}}">
                </div>
            </div>


            <div class="flex items-center justify-center mb-6">
                <div class="">
                    <label class="block text-black font-bold mb-1 pr-4"for="">
                        Notes
                    </label>
                </div>
                <div class="">
                    <input class="bg-white appearance-none border-2 border-grey-lighter rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple" type="text" name="notes" value="{{$recipe->notes}}">
                </div>
            </div>
            <button type="submit" class="bg-blue font-bold px-4 py-2 rounded-lg text-white">Update</button>

        </form>

        <h3>Recipe Image Upload Form</h3>
        <form class="w-full" action="{{$recipe->path() . "/images"}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="">Image Upload</label>
            <input type="file" name="image">
            <button type="submit">Upload Photo</button>
        </form>
    </main>
@endsection
