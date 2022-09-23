@extends('manage.layout')

@section('navbar')
    <a href="">
    </a>
@endsection

@section('content')
    <div class="shadow-lg bg-white rounded-lg">
        <div class="px-8 py-8">
            <div class="text-4xl">Design</div>
        </div>
        <div class="p-8">
            <div class="flex flex-col sm:flex-row justify-between gap-4 items-center mb-6">
                <div class="flex items-center gap-4">
                    <div class="p-0.5 relative h-[60px] w-[60px] text-slate-500 rounded-full overflow-hidden shrink-0"
                        id="border"
                        style="background-image: linear-gradient(to right, {{ Auth()->user()->border_c_1 }},{{ Auth()->user()->border_c_2 }},{{ Auth()->user()->border_c_3 }});">
                        <img class="w-full z-0 group-hover:opacity-75 h-full rounded-full" src="{{ asset(Auth()->user()->image) }}"
                            alt="" id="profile-preview">
                    </div>
                    <div class="flex flex-col">
                        <div class="font-bold">{{ Auth()->user()->link_name }}</div>
                        <div class="text-slate-500 text-sm">{{ Auth()->user()->bio }}</div>
                    </div>
                </div>
                <div class="flex flex-col justify-center">
                    <a class="py-2 px-4 w-full bg-slate-800 rounded-lg text-white" href="{{ route('manage.profile') }}">Edit
                        profile</a>
                </div>
            </div>
            <hr class="mb-6">
            <a class="group" href="{{route('manage.add')}}">
                <div class="flex gap-4 border-dotted border-slate-800 border-2 rounded-lg items-center p-4 group-hover:bg-slate-100">
                    <div class="flex">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="flex flex-col">
                        <div class="font-bold">Add Block</div>
                        <div class="text-slate-500 text-sm">links, images, contact info</div>
                    </div>
                </div>
            </a>
            <div class="w-full my-5">
                <button type="submit" class="py-3 w-full bg-slate-800 rounded-lg text-white">Save</button>
            </div>
        </div>
    </div>
@endsection
