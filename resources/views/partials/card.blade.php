<div class="px-3 pb-6">
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
                <a class="text-black"href="{{$recipe->path()}}/edit"><i class="fas fa-wrench"></i></a>
            </div>
        </div>
    </div>
</div>
