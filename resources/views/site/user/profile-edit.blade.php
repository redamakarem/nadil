@extends('layouts.site-tw')
@section('content')
<div class="flex w-5/6 mx-auto my-32 h-full">
    <div class="w-1/3  flex-col space-y-8 px-8 items-center" >
        <div class="flex flex-col items-center space-y-4 my-4">
            <div class="w-32 h-32 rounded-full shadow-md bg-nadilBg-100
            flex justify-center items-center font-lato text-3xl font-bold uppercase">{{auth()->user()->profile->initials}}</div>
            <div class="font-lato uppercase tracking-[6px]"> Your Profile</div>
        </div>
        <div class="">
            <a href="#"
               class="py-6 px-12 flex flex-1 justify-center rounded-xl shadow-md w-full bg-nadilBtn-100 font-lato font-bold uppercase tracking-[6px]">Account Details</a>
        </div>
        <div class="">
            <a href="#"
               class="py-6 px-12 flex flex-1 justify-center rounded-xl shadow-md w-full bg-nadilBtn-100 font-lato font-bold uppercase tracking-[6px]">History</a>
        </div>
        <div class="">
            <a href="#"
               class="py-6 px-12 flex flex-1 justify-center rounded-xl shadow-md w-full bg-nadilBtn-100 font-lato font-bold uppercase tracking-[6px]">Orders</a>
        </div>
    </div>
    <div class="w-2/3 flex-col ">

        @livewire('site.user.profile.edit')
    </div>
</div>
@endsection
