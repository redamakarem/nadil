@extends('layouts.site-mobile',['restaurant' => $restaurant])
@section('content')
    <div class="container mx-auto">
        <div class="flex flex-col justify-center">
            <div class="restaurant-header px-4 py-8">
                <h1 class="text-center font-lato  font-medium font-light text-xl text-black uppercase tracking-[1.0rem]">{{$restaurant->{'name_' . app()->getLocale()} }}</h1>
                <h4 class="text-center font-lato  font-medium font-light text-xs text-black uppercase tracking-[0.6rem]">Kuwait city</h4>
                <h4 class="text-center font-lato  font-medium font-light text-[0.6rem] text-black uppercase tracking-[0.4rem] mt-5">&quot;Curated to unlock new culinary moments &quot;</h4>
                <h4 class="text-center font-lato font-light text-xs text-black uppercase tracking-[0.5rem] font-bold mt-5">Explore some dishes</h4>
            </div>
            @livewire('site.mobile.restaurant.menu',[$restaurant])
        </div>

        </div>
    </div>
@endsection
