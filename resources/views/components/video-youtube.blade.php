<section class="p-4 flex flex-col gap-9" id="link">
    <section id="youtube">
        <div class="mb-3">
            <h2 class="text-xl text-slate-500">{{ $category }}</h2>
        </div>
        @foreach ($data->usercomponent()->orderBy('ordinal')->get() as $row)
        <div class="relative aspect-video w-full rounded-xl overflow-hidden">
            <iframe class="absolute top-0 left-0 w-full h-full border-0" width="100%" height="100%" src="https://www.youtube.com/embed/{{ explode("=",$row->url)[1] }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        @endforeach
    </section>
</section>
