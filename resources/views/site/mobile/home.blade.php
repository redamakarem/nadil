@extends('layouts.site-mobile')
@section('content')
    <div class="container">
        <p>So, What's the plan</p>
        <div class="owl-carousel owl-theme">
            @foreach($restaurants as $restaurant)
                <div class="item rounded-xl py-12 shadow-lg filter grayscale" style="background-image:url('{{$restaurant->getFirstMediaUrl('restaurant_images')}}'); background-size: cover">
                    <a href="{{route('site.restaurants.view',['id'=>$restaurant->id])}}">
                        <h4 class="text-center">{{ $restaurant->{'name_'.app()->getLocale()} }}</h4>
                        <div class="address text-center">{{ $restaurant->address }}</div>
                    </a>
                </div>
            @endforeach
        </div>

        {{--   Restaurants by meal types     --}}
        <div class="greeting uppercase font-lato">Browse by meal type</div>

        @foreach($meal_types as $meal_type)
            <h2 class="mt-6 uppercase ltr:font-lato rtl:font-ahlan text-[#454545]">{{$meal_type->{'name_'.app()->getLocale()} }}</h2>
            <div class="owl-carousel owl-theme mb-8">
                @foreach($meal_type->restaurants as $meal_restaurant)
                    <div class="item flex flex-col justify-center rounded-xl border-2 h-32 shadow-md font-lato"
                         style="background-image:url('{{$meal_restaurant->getFirstMediaUrl('restaurant_images')}}'); background-size: cover">
                        <a href="{{route('site.restaurants.view',['id'=>$meal_restaurant->id])}}">
                            <h4 class="text-center font-bold text-blue uppercase text-[26px] tracking-[2px]">{{ $meal_restaurant->{'name_'.app()->getLocale()}  }}</h4>
                            <div
                                class="address text-center text-blue uppercase text-[18px] tracking-[2px]">{{ $meal_restaurant->{'name_'.app()->getLocale()}  }}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach

        <div class="greeting uppercase font-lato text-[#454545]">{{__('Pick the cuisine')}}</div>
        <div class="owl-carousel owl-theme">
            @foreach($cuisines as $cuisine)

                <div class="item rounded-xl py-12 shadow-lg filter grayscale" style="background-image:url('{{$cuisine->getFirstMediaUrl('cuisine_images')}}'); background-size: cover">
                    <h4 class="text-center">{{ $cuisine->{'name_'.app()->getLocale()} }}</h4>
                    <div class="address text-center">{{ $cuisine->address }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
