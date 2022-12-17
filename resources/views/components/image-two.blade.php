<section class="p-4 flex flex-col gap-9" id="link">
    <section id="image-two-column">
        <div class="mb-3">
            <h2 class="text-xl text-slate-500">{{ $category }}</h2>
        </div>
        <div class="grid grid-cols-2 gap-3">
            @foreach ($data->usercomponent()->orderBy('ordinal')->get() as $row)
                <a class="relative rounded-xl overflow-hidden aspect-square" href="@if ($row->url) {{ $row->url }}" target="_blank" @else javascript:; @endif"  @if (!$row->url) onclick="showImage(this)" @endif>
                    <img class="absolute w-full h-full object-cover object-center image" src="{{ asset($row->icon) }}">
                    <div class="absolute bottom-0 left-0 h-[70px] w-[362px] bg-gradient-to-b from-transparent to-slate-800 blur"></div>
                    <div class="absolute bottom-0 left-0 font-bold text-lg p-3 text-white">{{$row->name}}</div>
                </a>
            @endforeach
        </div>
    </section>
</section>
