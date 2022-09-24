<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Links
    </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/341a91bfcf.js" crossorigin="anonymous"></script>
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>

<body class="bg-slate-200">
    <div class="max-w-3xl mx-auto md:my-5 overflow-hidden">
        <div class="pb-6">
            <div class="flex justify-between">
                @yield('navbar')
                <div class="p-3 px-4">
                    <div class="dropdown inline-block relative">
                        <button
                            class="bg-gray-300 text-gray-700 font-semibold py-2 px-8 rounded inline-flex items-center">
                            <span class="mr-1"> Menu</span>
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </button>
                        <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 w-full">
                            <li class=""><a
                                class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap flex justify-between items-center"
                                target="_blank"
                                href="{{route('home')}}/{{ Auth()->user()->username }}">View <i class="fa-solid fa-globe"></i></a></li>
                            <li class=""><a
                                    class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap flex justify-between items-center"
                                    href="{{ route('manage.profile') }}">Profile <i class="fa-solid fa-user"></i></a>
                            </li>
                            <li class=""><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap flex justify-between items-center">
                                    Logout <i class="fa-solid fa-right-from-bracket"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        @yield('content')
    </div>
</body>

</html>
