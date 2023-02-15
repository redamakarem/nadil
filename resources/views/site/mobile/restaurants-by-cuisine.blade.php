@extends('layouts.site-mobile',['restaurant' => $restaurant])
@section('content')
    <div class="container">
        <div class="flex flex-col justify-center">
            <div class="uppercase font-lato text-center my-4">{{__('Your search results')}}</div>
            <div class="">
                @foreach ($result as $restaurant)
                    <div class="item rounded-xl py-12 shadow-lg filter grayscale mx-6 my-4"
                        style="background-image:url('{{ $restaurant->getFirstMediaUrl('restaurant_images') }}'); background-size: cover">
                        <a href="{{ route('site.restaurants.view', ['id' => $restaurant->id]) }}">
                            <h4 class="text-center font-lato font-normal rtl:font-ahlan rtl:tracking-normal text-white uppercase text-[26px] tracking-[2px]">{{ $restaurant->{'name_' . app()->getLocale()} }}</h4>
                            <div class="address text-center font-lato rtl:font-ahlan rtl:tracking-normal text-white uppercase text-[18px] tracking-[2px]">{{ $restaurant->areaa->{'name_' . app()->getLocale()} }}</div>
                        </a>
                    </div>
                @endforeach
            </div>
            
        </div>

        </div>
    </div>
@endsection
