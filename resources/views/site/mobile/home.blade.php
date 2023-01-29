@extends('layouts.site-mobile')
@section('content')
    <div class="lg:hidden container px-8">
        <p class="uppercase font-lato tracking-[4px] text-center py-6">So, What's the plan</p>
        <div class="flex flex-col items-center">
            <form action="{{ route('site.restaurants.search') }}" method="POST">
                @csrf
                <div class="my-4">
                    <select
                        class="rounded-[64px] bg-[#E0E0E0] outline-none border-none placeholder:text-center placeholder:font-lato placeholder:uppercase w-full"
                        name="people" id="people">
                        <option value="1">1 guest</option>
                        <option value="2">2 guests</option>
                        <option value="3">3 guests</option>
                        <option value="4">4 guests</option>
                        <option value="5">5 guests</option>
                        <option value="6">6 guests</option>
                        <option value="7">7 guests</option>
                        <option value="8">8 guests</option>
                        <option value="9">9 guests</option>
                        <option value="10">10 guests</option>
                        <option value="10+">10+ guests</option>
                    </select>
                </div>
                <div class="my-4">
                    <input
                        class="rounded-[64px] bg-[#E0E0E0] outline-none border-none placeholder:text-center placeholder:font-lato placeholder:uppercase w-full"
                        type="text" name="search_date" id="search_date" placeholder="{{ __('Date') }}">
                </div>
                <div class="my-4">
                    <input
                        class="rounded-[64px] bg-[#E0E0E0] outline-none border-none placeholder:text-center placeholder:font-lato placeholder:uppercase w-full"
                        type="text" name="search_time" id="search_time" placeholder="{{ __('Time') }}">
                </div>
                <input
                    class="rounded-[64px] bg-[#E0E0E0] outline-none border-none placeholder:text-center placeholder:font-lato placeholder:uppercase w-full mb-4"
                    type="number" step="1" name="search_seats" id="search_seats" placeholder="{{ __('Seats') }}">
        </div>
        <div class="flex justify-center mb-6">
            <button class="uppercase font-lato font-bold bg-[#F8F8F8] shadow-md w-full rounded-lg py-4"
                type="submit">{{ __('Book Now') }}</button>
        </div>
        <div class="">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Opps Something went wrong</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        </form>
    </div>
    <div class="mx-4">
        <div class="uppercase font-lato text-center">{{ __('Pick the cuisine') }}</div>
        @foreach ($cuisines->chunk(2) as $row)
            <div class="flex justify-between space-x-4 rtl:flex-row-reverse">
                @foreach ($row as $item)
                    <a class="my-4 w-1/2 rounded-[64px] py-4 bg-[#E0E0E0] text-center uppercase font-lato"
                        href="{{ route('site.restaurants.cuisine', ['cuisine' => $item->id]) }}">{{ $item->{'name_' . app()->getLocale()} }}</a>
                @endforeach
            </div>
        @endforeach
    </div>
    <div class="mx-4">
        <div class="uppercase font-lato text-center mb-4">{{ __('Pick the spot') }}</div>
        <div class="owl-carousel owl-theme">
            @foreach ($restaurants as $restaurant)
                <div class="item rounded-xl shadow-lg filter grayscale"
                    style="background-image:url('{{ $restaurant->getFirstMediaUrl('restaurant_images') }}'); background-size: cover">
                    <a href="{{ route('site.restaurants.view', ['id' => $restaurant->id]) }}"
                        class="flex flex-col justify-center py-12 w-full h-full bg-black rounded-xl bg-opacity-50">
                        <h4 class="text-center font-bold text-white uppercase text-[26px] tracking-[2px]">
                            {{ $restaurant->{'name_' . app()->getLocale()} }}</h4>
                        <div class="address text-center text-white uppercase text-[18px] tracking-[2px]">
                            {{ $restaurant->areaa->{'name_' . app()->getLocale()} }}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Restaurants by meal types --}}
    <div class="greeting uppercase font-lato text-center">Browse by meal type</div>

    @foreach ($meal_types as $meal_type)
        <div class="mx-4">
            <h2 class="mt-6 uppercase ltr:font-lato rtl:font-ahlan ltr:text-left rtl:text-right text-[#454545]">
                {{ $meal_type->{'name_' . app()->getLocale()} }}</h2>
            <div class="owl-carousel owl-theme mb-8">
                @foreach ($meal_type->restaurants as $meal_restaurant)
                    <div class="item flex flex-col justify-center rounded-xl border-2 h-32 shadow-md font-lato"
                        style="background-image:url('{{ $meal_restaurant->getFirstMediaUrl('restaurant_images') }}'); background-size: cover">
                        <a href="{{ route('site.restaurants.view', ['id' => $meal_restaurant->id]) }}">
                            <h4 class="text-center font-bold text-white uppercase text-[26px] tracking-[2px]">
                                {{ $meal_restaurant->{'name_' . app()->getLocale()} }}</h4>
                            <div class="address text-center text-white uppercase text-[18px] tracking-[2px]">
                                {{ $meal_restaurant->{'name_' . app()->getLocale()} }}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach


    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('pickadate/lib/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('pickadate/lib/themes/default.date.css') }}">
    <link rel="stylesheet" href="{{ asset('pickadate/lib/themes/default.time.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .flatpickr-day.selected {
            background: #0a0e14;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('pickadate/lib/compressed/picker.js') }}"></script>
    <script src="{{ asset('pickadate/lib/compressed/picker.date.js') }}"></script>
    <script src="{{ asset('pickadate/lib/compressed/picker.time.js') }}"></script>
    <script src="{{ asset('pickadate/lib/compressed/legacy.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        var booking_time = flatpickr("#search_time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "G:i K",
            defaultDate: "18:00",
            minuteIncrement: 15,
            minTime: "08:00",
            maxTime: "22:30",
        });

        var booking_date = flatpickr("#search_date", {
            dateFormat: 'Y-m-d',
            minDate: 'today',
            defaultDate: 'today',
        });
    </script>
@endpush
