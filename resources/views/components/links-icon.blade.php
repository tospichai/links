<section class="p-4 flex flex-col gap-9" id="link">
    <section id="icon-only">
        <div class="mb-3">
            <h2 class="text-xl text-slate-500">{{ $category }}</h2>
        </div>
        <div class="flex justify-around my-5">
            @foreach ($data->usercomponent()->orderBy('ordinal')->get() as $row)
                <a href="{{ $row->url }}"><img class="w-8" src="{{ asset($row->icon) }}" alt=""></a>
            @endforeach
        </div>
    </section>
</section>
