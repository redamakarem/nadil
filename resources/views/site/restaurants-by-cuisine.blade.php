@extends('layouts.site-tw')
@section('content')
{{-- {{dd($restaurants)}} --}}
<div id="main-content" class="h-full">
    <div class="grid grid-cols-3 gap-4 px-8 py-[80px]">
        
        
            @foreach($restaurants as $restaurant)
                <div class="item flex flex-col justify-center rounded-xl border-2 h-32 shadow-md font-lato"
                     style="background-image:url('{{$restaurant->getFirstMediaUrl('restaurant_images')}}'); background-size: cover">
                    <a href="{{route('site.restaurants.view',['id'=>$restaurant->id])}}">
                        <h4 class="text-center font-bold  uppercase text-[26px] tracking-[2px]">{{ $restaurant->{'name_'.app()->getLocale()}  }}</h4>
                        <div
                            class="address text-center  uppercase text-[18px] tracking-[2px]">{{ $restaurant->{'name_'.app()->getLocale()}  }}</div>
                    </a>
                </div>
            @endforeach
       
        
    </div>
</div>
@endsection
