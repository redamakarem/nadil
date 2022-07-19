@extends('layouts.site-mobile')
@section('content')
    <div class="container px-8">
        <p class="uppercase font-lato tracking-[4px] text-center py-6">So, What's the plan</p>
        <div class="flex flex-col items-center">
            <form>
                <div class="my-4">
                    <input
                        class="rounded-[64px] bg-[#E0E0E0] outline-none border-none placeholder:text-center placeholder:font-lato placeholder:uppercase"
                        type="text" name="people" id="people" placeholder="{{ __('# of people') }}">
                </div>
                <div class="my-4">
                    <input
                        class="rounded-[64px] bg-[#E0E0E0] outline-none border-none placeholder:text-center placeholder:font-lato placeholder:uppercase"
                        type="text" name="date" id="date" placeholder="{{ __('Date') }}">
                </div>
                <div class="my-4">
                    <input
                        class="rounded-[64px] bg-[#E0E0E0] outline-none border-none placeholder:text-center placeholder:font-lato placeholder:uppercase"
                        type="text" name="time" id="time" placeholder="{{ __('Time') }}">
                </div>
                <div class="flex justify-center mb-6">
                    <button 
                    class="uppercase font-lato font-bold bg-[#F8F8F8] shadow-md w-full rounded-lg py-4" 
                    type="submit">{{ __('Book Now') }}</button>
                </div>
            </form>
        </div>
        <div class="uppercase font-lato text-center">{{__('Pick the cuisine')}}</div>
        @foreach ($cuisines->chunk(2) as $row )
            <div class="flex justify-between space-x-4 rtl:flex-row-reverse">
            @foreach ($row as $item)
                <a 
                class="my-4 w-1/2 rounded-[64px] py-4 bg-[#E0E0E0] text-center uppercase font-lato"
                href="{{route('site.restaurants.cuisine',['cuisine' => $item->id])}}">{{$item->{'name_' . app()->getLocale()} }}</a>  
            @endforeach
        </div>
        @endforeach
        <div class="uppercase font-lato text-center mb-4">{{__('Pick the spot')}}</div>
        <div class="owl-carousel owl-theme">
            @foreach ($restaurants as $restaurant)
                <div class="item rounded-xl py-12 shadow-lg filter grayscale"
                    style="background-image:url('{{ $restaurant->getFirstMediaUrl('restaurant_images') }}'); background-size: cover">
                    <a href="{{ route('site.restaurants.view', ['id' => $restaurant->id]) }}">
                        <h4 class="text-center">{{ $restaurant->{'name_' . app()->getLocale()} }}</h4>
                        <div class="address text-center">{{ $restaurant->address }}</div>
                    </a>
                </div>
            @endforeach
        </div>

        {{-- Restaurants by meal types --}}
        <div class="greeting uppercase font-lato text-center">Browse by meal type</div>

        @foreach ($meal_types as $meal_type)
            <h2 class="mt-6 uppercase ltr:font-lato rtl:font-ahlan ltr:text-left rtl:text-right text-[#454545]">
                {{ $meal_type->{'name_' . app()->getLocale()} }}</h2>
            <div class="owl-carousel owl-theme mb-8">
                @foreach ($meal_type->restaurants as $meal_restaurant)
                    <div class="item flex flex-col justify-center rounded-xl border-2 h-32 shadow-md font-lato"
                        style="background-image:url('{{ $meal_restaurant->getFirstMediaUrl('restaurant_images') }}'); background-size: cover">
                        <a href="{{ route('site.restaurants.view', ['id' => $meal_restaurant->id]) }}">
                            <h4 class="text-center font-bold text-blue uppercase text-[26px] tracking-[2px]">
                                {{ $meal_restaurant->{'name_' . app()->getLocale()} }}</h4>
                            <div class="address text-center text-blue uppercase text-[18px] tracking-[2px]">
                                {{ $meal_restaurant->{'name_' . app()->getLocale()} }}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endforeach

        <div class="greeting uppercase font-lato text-[#454545]">{{ __('Pick the cuisine') }}</div>
        <div class="owl-carousel owl-theme">
            @foreach ($cuisines as $cuisine)
                <div class="item rounded-xl py-12 shadow-lg filter grayscale"
                    style="background-image:url('{{ $cuisine->getFirstMediaUrl('cuisine_images') }}'); background-size: cover">
                    <h4 class="text-center">{{ $cuisine->{'name_' . app()->getLocale()} }}</h4>
                    <div class="address text-center">{{ $cuisine->address }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
