@extends('layouts.app')

@section('content')
    <div class="container m-auto">
        <header class="flex items-center mb-3 py-4 h-24">
            <div class="flex justify-between items-center w-full">
                <h2 class="font-normal text-2xl text-grey-dark">My Recipes</h2>

                <a href="/recipes/create"><button class="bg-blue font-bold px-4 py-2 rounded-lg text-white">New Recipe</button></a>
            </div>
        </header>

        <main class="flex flex-wrap">
            @forelse( $recipes as $recipe )
            <div class="w-1/3 px-3 pb-6">
                <div class="bg-white p-5 rounded-lg shadow" style="height: 200px">
                    <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-light pl-4">
                        <a class="no-underline text-black" href="{{ $recipe->path() }}">{{ $recipe->name }}</a>
                    </h3>

                    <div class="text-grey-dark">{{ str_limit($recipe->description, 100) }}</div>
                </div>
            </div>
            @empty
                <div>No projects yet</div>
            @endforelse
        </main>
    </div>

@endsection
