@extends('layouts.site-tw')
@section('content')
<div id="main-content" class="h-full">
    <div class="flex flex-col px-24 py-[80px]">
        
        <div class="owl-carousel owl-theme mb-8">
            @foreach($restaurants as $restaurant)
                <div class="item flex flex-col justify-center rounded-xl border-2 h-32 shadow-md font-lato"
                     style="background-image:url('{{$restaurant->getFirstMediaUrl('restaurant_images')}}'); background-size: cover">
                    <a href="{{route('site.restaurants.view',['id'=>$restaurant->id])}}">
                        <h4 class="text-center font-bold text-white uppercase text-[26px] tracking-[2px]">{{ $restaurant->{'name_'.app()->getLocale()}  }}</h4>
                        <div
                            class="address text-center text-white uppercase text-[18px] tracking-[2px]">{{ $restaurant->{'name_'.app()->getLocale()}  }}</div>
                    </a>
                </div>
            @endforeach
        </div>
       
        
    </div>
</div>
@endsection
