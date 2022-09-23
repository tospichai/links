<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data->page_name}} | Links
    </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/341a91bfcf.js" crossorigin="anonymous"></script>
</head>

<body class="bg-slate-200">
    <div class="max-w-3xl mx-auto bg-white shadow-lg md:my-10 rounded-lg overflow-hidden">
        <section id="cover">
            <div class="relative h-[240px]">
                <img class="absolute w-full h-full object-cover object-center" src="{{asset($data->image_cover)}}" alt="">
            </div>
        </section>
        <section id="profile">
            <div class="flex justify-center -mt-16 z-10 relative">
                <div class="p-1 rounded-full" style="background-image: linear-gradient(to right, {{$data->border_c_1}},{{$data->border_c_2}},{{$data->border_c_3}});"><img class="h-28 rounded-full" src="{{asset($data->image)}}" alt=""></div>
            </div>
            <div class="flex justify-center flex-col items-center py-5">
                <div class="text-2xl font-bold flex items-center">
                    <h1>{{$data->page_name}}</h1>
                    <div class="relative group">
                        <i class="fa-sharp fa-solid fa-circle-check text-sm pl-2 @if($data->email_verified_at) text-green-500 @else text-slate-300 @endif"></i></span>
                        @if($data->email_verified_at)
                        <div class="hidden group-hover:block absolute -right-10 text-xs p-1 px-3 text-white bg-green-500 rounded-full">Verified</div>
                        @else
                        <div class="hidden group-hover:block absolute -right-10 text-xs p-1 px-3 text-slate-300 bg-slate-700 rounded-full">Unverified</div>
                        @endif
                    </div>
                </div>
                <h3 class="text-lg text-slate-600 whitespace-pre text-center mt-2">{{$data->bio}}</h3>
            </div>
        </section>
        @foreach ($data->categorycomponent as $row)
            @include($row->component->view, ['data' => $row , 'category' => $row->title])
        @endforeach
        <section class="p-4 flex flex-col gap-9" id="link">
            {{-- <section id="one-column">
                <div class="mb-3">
                    <h2 class="text-xl text-slate-500">One Column</h2>
                </div>
                <div class="grid grid-cols-1">
                    <a href="lin.ee/LxDk4LD">
                        <div class="flex justify-between items-center p-3 border-2 border-slate-200 rounded-xl">
                            <i class="fa-solid fa-link"></i>
                            <div class="grow text-center">lin.ee/LxDk4LD</div>
                        </div>
                    </a>
                </div>
            </section>
            <section id="two-column">
                <div class="mb-3">
                    <h2 class="text-xl text-slate-500">Two Column</h2>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <a href="lin.ee/LxDk4LD">

                        <div class="flex justify-between items-center p-3 border-2 border-slate-200 rounded-xl">
                            <i class="fa-solid fa-link"></i>
                            <div class="grow text-center">lin.ee/LxDk4LD</div>
                        </div>
                    </a>
                    <a href="lin.ee/LxDk4LD">

                        <div class="flex justify-between items-center p-3 border-2 border-slate-200 rounded-xl">
                            <i class="fa-solid fa-link"></i>
                            <div class="grow text-center">lin.ee/LxDk4LD</div>
                        </div>
                    </a>
                </div>
            </section>
            <section id="icon-only">
                <div class="mb-3">
                    <h2 class="text-xl text-slate-500">Icon Only</h2>
                </div>
                <div class="flex justify-around my-5">
                    <a href="https://www.facebook.com"><img class="w-8" src="{{asset('images/icon/facebook.png')}}" alt=""></a>
                    <a href="https://www.instagram.com"><img class="w-8" src="{{asset('images/icon/instagram.png')}}" alt=""></a>
                    <a href="https://www.messenger.com"><img class="w-8" src="{{asset('images/icon/messenger.png')}}" alt=""></a>
                    <a href="https://www.line.com"><img class="w-8" src="{{asset('images/icon/line.png')}}" alt=""></a>
                </div>
            </section> --}}
            <section id="youtube">
                <div class="relative pb-[56.25%] w-full rounded-xl overflow-hidden">
                    <iframe class="absolute top-0 left-0 w-full h-full border-0" width="100%" height="100%" src="https://www.youtube.com/embed/5MIBqnHuICw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </section>
            <section id="image-two-column">
                <div class="mb-3">
                    <h2 class="text-xl text-slate-500">Image Two Column</h2>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <a class="relative h-[362px] rounded-xl overflow-hidden" href="">
                        <img class="absolute w-full h-full object-cover object-center" src="images/product1.jpeg" alt="">
                    </a>
                    <a class="relative h-[362px] rounded-xl overflow-hidden" href="">
                        <img class="absolute w-full h-full object-cover object-center" src="images/product2.jpeg" alt="">
                    </a>
                </div>
            </section>
            <section id="image-one-column">
                <div class="mb-3">
                    <h2 class="text-xl text-slate-500">Image Three Column</h2>
                </div>
                <div class="grid grid-cols-3 gap-3">
                    <a class="relative h-[237.34px] rounded-xl overflow-hidden" href="">
                        <img class="absolute w-full h-full object-cover object-center" src="images/product3.jpeg" alt="">
                    </a>
                    <a class="relative h-[237.34px] rounded-xl overflow-hidden" href="">
                        <img class="absolute w-full h-full object-cover object-center" src="images/product1.jpeg" alt="">
                    </a>
                    <a class="relative h-[237.34px] rounded-xl overflow-hidden" href="">
                        <img class="absolute w-full h-full object-cover object-center" src="images/product2.jpeg" alt="">
                    </a>
                </div>
            </section>
            <section id="location">
                <div class="mb-3">
                    <h2 class="text-xl text-slate-500">Location</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <div class="font-bold">สยามพารากอน</div>
                            <div class="text-sm text-slate-500">ชั้น G หน้า Gourmet โซน Take Home</div>
                        </div>
                        <div class="flex justify-end">
                            <div class="text-sm text-slate-500">
                                <div>
                                    10:00
                                </div>
                                <div>
                                    18:00
                                </div>
                            </div>
                            <div class="text-[27px] pl-2">
                                <a href="">
                                    <i class="fa-solid fa-phone"></i>
                                </a>
                            </div>
                            <div class="text-[27px] pl-2">
                                <a href="">
                                    <i class="fa-solid fa-location-dot"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <div class="font-bold">จอมทอง</div>
                            <div class="text-sm text-slate-500">หมู่บ้านเชาวลิต ซอย 2</div>
                        </div>
                        <div class="flex justify-end">
                            <div class="text-sm text-slate-500">
                                <div>
                                    10:00
                                </div>
                                <div>
                                    18:00
                                </div>
                            </div>
                            <div class="text-[27px] pl-2">
                                <a href="">
                                    <i class="fa-solid fa-phone"></i>
                                </a>
                            </div>
                            <div class="text-[27px] pl-2">
                                <a href="">
                                    <i class="fa-solid fa-location-dot"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        <footer>
            <div class="flex justify-center mt-20">
                <div>made with link</div>
            </div>
            <div class="flex justify-center pb-20 pt-3">
                <div class="text-2xl font-bold">Links{}</div>
            </div>
        </footer>
    </div>
</body>

</html>