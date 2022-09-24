<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data->page_name }} | Links
    </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/341a91bfcf.js" crossorigin="anonymous"></script>
</head>

<body class="bg-slate-200">
    <div class="max-w-3xl mx-auto bg-white shadow-lg md:my-10 rounded-lg overflow-hidden">
        <section id="cover">
            <div class="relative h-[240px]">
                <img class="absolute w-full h-full object-cover object-center" src="{{ asset($data->image_cover) }}"
                    alt="">
            </div>
        </section>
        <section id="profile">
            <div class="flex justify-center -mt-16 z-10 relative">
                <div class="p-1 rounded-full"
                    style="background-image: linear-gradient(to right, {{ $data->border_c_1 }},{{ $data->border_c_2 }},{{ $data->border_c_3 }});">
                    <img class="h-28 rounded-full" src="{{ asset($data->image) }}" alt="">
                </div>
            </div>
            <div class="flex justify-center flex-col items-center py-5">
                <div class="text-2xl font-bold flex items-center">
                    <h1>{{ $data->page_name }}</h1>
                    <div class="relative group">
                        <i
                            class="fa-sharp fa-solid fa-circle-check text-sm pl-2 @if ($data->email_verified_at) text-green-500 @else text-slate-300 @endif"></i></span>
                        @if ($data->email_verified_at)
                            <div
                                class="hidden group-hover:block absolute -right-10 text-xs p-1 px-3 text-white bg-green-500 rounded-full">
                                Verified</div>
                        @else
                            <div
                                class="hidden group-hover:block absolute -right-10 text-xs p-1 px-3 text-slate-300 bg-slate-700 rounded-full">
                                Unverified</div>
                        @endif
                    </div>
                </div>
                <h3 class="text-lg text-slate-600 whitespace-pre text-center mt-2">{{ $data->bio }}</h3>
            </div>
        </section>
        @foreach ($data->categorycomponent as $row)
            @include($row->component->view, ['data' => $row, 'category' => $row->title])
        @endforeach
        <footer>
            <div class="flex justify-center mt-20">
                <div>made with link</div>
            </div>
            <div class="flex justify-center pb-20 pt-3">
                <div class="text-2xl font-bold">Links{}</div>
            </div>
        </footer>
    </div>
    <div id="showimage" class="transition-all duration-300 opacity-0 invisible">
        <div class="overflow-y-auto overflow-x-hidden fixed inset-0 z-50 w-full flex justify-center items-center"
            onclick="hideImage()">
            <div
                class="relative bg-white rounded-none sm:rounded-lg shadow-lg dark:bg-gray-700 max-w-xl overflow-hidden">
                <img id="image" class="" src="http://localhost:8000/images/product/product3.jpeg"
                    alt="">
                <div class="absolute top-0 right-0 cursor-pointer">
                    <div class="w-[32px] h-[32px] rounded-full m-2 p-3 py-1 bg-slate-100"><i
                            class="fa-solid fa-xmark my-[4px]"></i></div>
                </div>
            </div>
        </div>
        <div class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40 flex justify-center items-center"
            onclick="hideImage()">
            <img id="imageblur" class="block sm:hidden scale-[3.5] blur-lg"
                src="http://localhost:8000/images/product/product3.jpeg" alt="">
        </div>
    </div>
    <script>
        function showImage(event) {
            event = event || window.event;
            var src = event.getElementsByClassName("image")[0].src;
            document.getElementById("imageblur").src = src;
            document.getElementById("showimage").classList.remove("opacity-0");
            document.getElementById("showimage").classList.remove("invisible");
            document.getElementById("showimage").classList.add("opacity-100");
        }

        function hideImage(event) {
            document.getElementById("showimage").classList.remove("opacity-100");
            document.getElementById("showimage").classList.add("opacity-0");
            document.getElementById("showimage").classList.add("invisible");
        }
    </script>
</body>

</html>
