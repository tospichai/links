<section class="p-4 flex flex-col gap-9" id="link">
    <section id="location">
        <div class="mb-3">
            <h2 class="text-xl text-slate-500">{{ $category }}</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
            @foreach ($data->usercomponent()->orderBy('ordinal')->get() as $row)
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <div class="font-bold">{{$row->name}}</div>
                        <div class="text-sm text-slate-500">{{$row->detail}}</div>
                    </div>
                    <div class="flex justify-end">
                        <div class="text-sm text-slate-500">
                            <div>
                                {{$row->starttime}}
                            </div>
                            <div>
                                {{$row->endtime}}
                            </div>
                        </div>
                        <div class="text-[27px] pl-2">
                            <a href="tel:{{$row->mobile}}">
                                <i class="fa-solid fa-phone"></i>
                            </a>
                        </div>
                        <div class="text-[27px] pl-2">
                            <a href="{{$row->location}}">
                                <i class="fa-solid fa-location-dot"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</section>
