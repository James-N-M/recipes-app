<div class="px-3 pb-6">
    <div class="bg-white p-5 rounded-lg shadow" style="height: 200px">
        <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-light pl-4">
            <a class="no-underline text-black" href="{{ $recipe->path() }}">{{ $recipe->name }}</a>
        </h3>

        <div class="text-grey-dark">{{ str_limit($recipe->description, 100) }}</div>
    </div>
</div>
