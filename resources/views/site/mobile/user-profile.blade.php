@extends('layouts.site-mobile')
@section('content')
    <div id="profile">
        <h1 class="text-xl font-bold uppercase text-center mb-8 mt-4">{{__('Account Details')}}</h1>
    </div>
    <div class="flex flex-col space-y-8 items-center">
        <div class="text-lg uppercase font-lato font-bold">{{__('Name')}}</div>
        <div>{{$profile->name}}</div>
        <div class="text-lg uppercase font-lato font-bold">{{__('Address')}}</div>
        <div>{{$profile->name}}</div>
        <div class="text-lg uppercase font-lato font-bold">{{__('Phone')}}</div>
        <div>{{$profile->phone}}</div>
        <div class="text-lg uppercase font-lato font-bold">{{__('Email')}}</div>
        <div>{{$profile->email}}</div>
        <a href="{{ route('user.profile.edit') }}" class="uppercase font-lato font-bold bg-[#F8F8F8] shadow-md rounded-lg py-4 px-8 text-center w-2/3">{{__('Edit')}}</a>
    </div>
@endsection
