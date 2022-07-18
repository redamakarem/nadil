@extends('layouts.site-tw')
@section('content')

    <div id="main-content" class="h-full">
        <div class="flex flex-col px-24 py-[80px]">
            <div class="greeting uppercase">So, What is the plan</div>
            <div>
                <form action="#" class="mb-6">
                    <div class="flex justify-between my-4">
                        <input class="font-lato flex text-center border-none py-6 uppercase bg-nadilBtn-100 shadow-md outline-none rounded-lg" 
                        type="text" name="restaurant_name" id="restaurant_name" placeholder="Search">
                        <input class="font-lato flex text-center border-none py-6 uppercase bg-nadilBtn-100 shadow-md outline-none rounded-lg" 
                        type="text" name="restaurant_name" id="restaurant_name" placeholder="# of people">
                        <input class="font-lato flex text-center border-none py-6 uppercase bg-nadilBtn-100 shadow-md outline-none rounded-lg" 
                        type="text" name="restaurant_name" id="restaurant_name" placeholder="Date">
                        <input class="font-lato flex text-center border-none py-6 uppercase bg-nadilBtn-100 shadow-md outline-none rounded-lg" 
                        type="text" name="restaurant_name" id="restaurant_name" placeholder="Time">
                        <button class="font-lato border-none px-4 uppercase bg-nadilBtn-100 shadow-md outline-none rounded-lg" 
                        type="submit">{{__('Search')}}</button>
                    </div>
                </form>
            </div>
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

                    <a href="{{route('site.restaurants.cuisine',['cuisine' => $cuisine->id])}}">
                        <div class="item rounded-xl border-2 h-28 flex justify-center items-center"
                         style="background-image:url('{{$cuisine->getFirstMediaUrl('cuisine_images')}}'); background-size: cover">
                        <h4 class="text-center text-white lg:text-2xl uppercase">{{ $cuisine->{'name_'.app()->getLocale()} }}</h4>
                    </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection






