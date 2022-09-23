<section class="p-4 flex flex-col gap-9" id="link">
    <section id="one-column">
        <div class="mb-3">
            <h2 class="text-xl text-slate-500">{{ $category }}</h2>
        </div>
        <div class="grid grid-cols-2 gap-3">
            @foreach ($data->usercomponent()->orderBy('ordinal')->get() as $row)
                <a href="{{ $row->url }}">
                    <div class="flex justify-between items-center p-3 border-2 border-slate-200 rounded-xl">
                        <img class="w-[32px]" src="{{ asset($row->icon) }}">
                        <div class="grow text-center font-bold">{{ $row->name }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
</section>
