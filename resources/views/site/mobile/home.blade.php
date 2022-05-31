@extends('layouts.site-mobile')
@section('content')
    <div class="container">
        <p>So Reda, What's the plan</p>
        <div class="owl-carousel owl-theme">
            @foreach($restaurants as $restaurant)
                <div class="item rounded-xl py-12 shadow-lg filter grayscale" style="background-image:url('{{$restaurant->getFirstMediaUrl('restaurant_images')}}'); background-size: cover">
                    <a href="{{route('site.restaurants.view',['id'=>$restaurant->id])}}">
                        <h4 class="text-center">{{ $restaurant->name }}</h4>
                        <div class="address text-center">{{ $restaurant->address }}</div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="owl-carousel owl-theme">
            @foreach($cuisines as $cuisine)

                <div class="item rounded-xl py-12 shadow-lg filter grayscale" style="background-image:url('{{$cuisine->getFirstMediaUrl('cuisine_images')}}'); background-size: cover">
                    <h4 class="text-center">{{ $cuisine->name }}</h4>
                    <div class="address text-center">{{ $cuisine->address }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
