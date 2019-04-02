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
                <div class="bg-white flex flex-col justify-between p-5 rounded-lg shadow" style="height: 200px">
                    <h3 class="font-normal text-xl py-4 -ml-5 border-l-4 border-blue-light pl-4">
                        <a class="no-underline text-black" href="{{ $recipe->path() }}">{{ $recipe->name }}</a>
                    </h3>

                    <div class="text-grey-dark">{{ str_limit($recipe->description, 100) }}</div>
                    <div class="flex justify-between">
                        <div class="flex">
                            <div>
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < $recipe->difficulty)
                                        <i class="fas fa-star text-blue"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="ml-4">
                                <i class="far fa-clock"></i>
                                <i>{{$recipe->time}}</i>
                                <i>minutes</i>
                            </div>
                        </div>
                        <div>
                            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="far fa-trash-alt text-red"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div>No projects yet</div>
            @endforelse
        </main>
    </div>

@endsection
