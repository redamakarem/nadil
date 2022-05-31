@extends('layouts.site-tw')
@section('content')


    {{--    <div class="container">--}}
    {{--        <p>So Reda, What's the plan</p>--}}
    {{--        <div class="owl-carousel owl-theme">--}}
    {{--            @foreach($restaurants as $restaurant)--}}
    {{--                <div class="item" style="background-image:url('{{$restaurant->getFirstMediaUrl('restaurant_images')}}'); background-size: cover">--}}
    {{--                    <a href="{{route('site.restaurants.view',['id'=>$restaurant->id])}}">--}}
    {{--                        <h4 class="text-center">{{ $restaurant->name }}</h4>--}}
    {{--                        <div class="address text-center">{{ $restaurant->address }}</div>--}}
    {{--                    </a>--}}
    {{--                </div>--}}
    {{--            @endforeach--}}
    {{--        </div>--}}

    {{--        <div class="owl-carousel owl-theme">--}}
    {{--            @foreach($cuisines as $cuisine)--}}

    {{--                <div class="item" style="background-image:url('{{$cuisine->getFirstMediaUrl('cuisine_images')}}'); background-size: cover">--}}
    {{--                    <h4 class="text-center">{{ $cuisine->name }}</h4>--}}
    {{--                    <div class="address text-center">{{ $cuisine->address }}</div>--}}
    {{--                </div>--}}
    {{--            @endforeach--}}
    {{--        </div>--}}
    {{--    </div>--}}



    <div id="main-content" class="h-full">
        <div class="flex flex-col px-24 py-[80px]">
            <div class="greeting uppercase">So Reda, What is the plan</div>
            {{--        <div class="flex mt-8 justify-between">--}}
            {{--            <div class="uppercase bg-nadilBg-100 px-20 py-6 rounded-lg shadow-lg">Search</div>--}}
            {{--            <div class="uppercase bg-nadilBg-100 px-20 py-6 rounded-lg shadow-lg">Search</div>--}}
            {{--            <div class="uppercase bg-nadilBg-100 px-20 py-6 rounded-lg shadow-lg">Search</div>--}}
            {{--            <div class="uppercase bg-nadilBg-100 px-20 py-6 rounded-lg shadow-lg">Search</div>--}}
            {{--        </div>--}}


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

            {{--   Restaurants by meal types     --}}
            @foreach($meal_types as $meal_type)
                <h2>{{$meal_type->{'name_'.app()->getLocale()} }}</h2>
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

            <div class="owl-carousel owl-theme">
                @foreach($cuisines as $cuisine)

                    <div class="item rounded-xl border-2 h-28 flex justify-center items-center"
                         style="background-image:url('{{$cuisine->getFirstMediaUrl('cuisine_images')}}'); background-size: cover">
                        <h4 class="text-center text-white lg:text-2xl uppercase">{{ $cuisine->{'name_'.app()->getLocale()} }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection






