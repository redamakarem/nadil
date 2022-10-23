@extends('layouts.site-tw')
@section('content')
    <div id="main-content" class="h-full">
        <div class="flex flex-col px-24 py-[80px]">
            <div class="greeting uppercase">So, What is the plan</div>



            <div>
                <form action="#" class="mb-6">
                    <div class="flex my-4 items-center">
                        <div class="w-1/2 flex">
                            <input
                                class="flex-1 font-lato flex text-center border-none py-6 uppercase bg-nadilBtn-100 outline-none rounded-l-lg"
                                type="text" name="restaurant_name" id="restaurant_name" placeholder="Date">
                            <div class="bg-gray-600 w-[1px] h-[72px] opacity-40"></div>

                            <input
                                class="flex-1 font-lato flex text-center border-none py-6 uppercase bg-nadilBtn-100 outline-none"
                                type="text" name="search_time" id="search_time" placeholder="Time">
                            <div class="bg-gray-600 w-[1px] h-[72px] opacity-40"></div>

                            <input
                                class="flex-1 font-lato flex text-center border-none py-6 uppercase bg-nadilBtn-100 outline-none rounded-r-lg"
                                type="text" name="restaurant_name" id="restaurant_name" placeholder="# of people">
                        </div>


                        <div class="w-1/2 flex">
                            <input
                            class=" flex-1 font-lato flex text-center border-none py-6 uppercase bg-nadilBtn-100 outline-none rounded-lg mx-6"
                            type="text" name="restaurant_name" id="restaurant_name" placeholder="Search">
                        <button
                            class="font-lato border-none px-12 py-6 uppercase bg-nadilBtn-100 shadow-md outline-none rounded-lg"
                            type="submit">{{ __('Book Now') }}</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="relative carousel-container flex rtl:flex-row-reverse items-center">
                <div
                    class="absolute bg-nadilBtn-100 carousel-nav p-4 prev rounded-full z-10 -left-4 top-[30%] w-12 h-12 flex justify-center items-center shadow-md">
                    <i class="fa-solid fa-chevron-left"></i></div>
                <div class="restaurant-carousel owl-carousel owl-theme mb-8">
                    @foreach ($restaurants as $restaurant)
                        <div class="item flex flex-col justify-center rounded-xl border-2 h-32 font-lato"
                            style="background-image:url('{{ $restaurant->getFirstMediaUrl('restaurant_images') }}'); background-size: cover">
                            <a href="{{ route('site.restaurants.view', ['id' => $restaurant->id]) }}"
                                class="flex flex-col justify-center w-full h-full bg-black rounded-xl bg-opacity-50">
                                <h4
                                    class="text-center font-bold ltr:font-lato rtl:font-ahlan text-white uppercase text-[26px] ltr:tracking-[2px] rtl:tracking-normal text-opacity-100">
                                    {{ $restaurant->{'name_' . app()->getLocale()} }}</h4>
                                <div
                                    class="address text-center text-white uppercase text-[18px] ltr:tracking-[2px] rtl:tracking-normal ltr:font-lato rtl:font-ahlan text-opacity-100">
                                    {{ $restaurant->areaa->{'name_' . app()->getLocale()} }}</div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div
                    class="absolute bg-nadilBtn-100 carousel-nav p-4 next rounded-full z-10 -right-4 top-[30%] w-12 h-12 flex justify-center items-center shadow-md">
                    <i class="fa-solid fa-chevron-right"></i></div>
            </div>

            {{--   Restaurants by meal types     --}}
            <div class="greeting uppercase font-lato">Browse by meal type</div>

            @foreach ($meal_types as $meal_type)
                <h2 class="mt-6 uppercase ltr:font-lato rtl:font-ahlan text-[#454545]">
                    {{ $meal_type->{'name_' . app()->getLocale()} }}</h2>
                <div class="relative carousel-container flex rtl:flex-row-reverse items-center">
                    <div
                        class="absolute bg-nadilBtn-100 carousel-nav p-4 meals-prev rounded-full z-10 -left-4 top-[30%] w-12 h-12 flex justify-center items-center shadow-md">
                        <i class="fa-solid fa-chevron-left"></i></div>
                    <div class="owl-carousel owl-theme mb-8 meals-carousel">
                        @foreach ($meal_type->restaurants as $meal_restaurant)
                            <div class="item flex flex-col justify-center rounded-xl border-2 h-32 shadow-md font-lato"
                                style="background-image:url('{{ $meal_restaurant->getFirstMediaUrl('restaurant_images') }}'); background-size: cover">
                                <a href="{{ route('site.restaurants.view', ['id' => $meal_restaurant->id]) }}"
                                    class="flex flex-col justify-center w-full h-full bg-black rounded-xl bg-opacity-50">
                                    <h4
                                        class="text-center uppercase text-white text-[18px] ltr:tracking-[2px] rtl:tracking-normal ltr:font-lato rtl:font-ahlan text-opacity-100">
                                        {{ $meal_restaurant->{'name_' . app()->getLocale()} }}</h4>
                                    <div
                                        class="address text-center uppercase text-white text-[18px] ltr:tracking-[2px] rtl:tracking-normal ltr:font-lato rtl:font-ahlan text-opacity-100">
                                        {{ $meal_restaurant->areaa->{'name_' . app()->getLocale()} }}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div
                        class="absolute bg-nadilBtn-100 carousel-nav p-4 meals-next rounded-full z-10 -right-4 top-[30%] w-12 h-12 flex justify-center items-center shadow-md">
                        <i class="fa-solid fa-chevron-right"></i></div>
                </div>
            @endforeach
            <div class="greeting uppercase font-lato text-[#454545]">{{ __('Pick the cuisine') }}</div>
            <div class="relative carousel-container flex rtl:flex-row-reverse items-center">
                <div
                    class="absolute bg-nadilBtn-100 carousel-nav p-4 cuisines-prev rounded-full z-10 -left-4 top-[30%] w-12 h-12 flex justify-center items-center shadow-md">
                    <i class="fa-solid fa-chevron-left"></i></div>
                <div class="owl-carousel owl-theme cuisines-carousel">
                    @foreach ($cuisines as $cuisine)
                        <a href="{{ route('site.restaurants.cuisine', ['cuisine' => $cuisine->id]) }}">
                            <div class="item rounded-xl border-2 h-28 flex justify-center items-center"
                                style="background-image:url('{{ $cuisine->getFirstMediaUrl('cuisine_images') }}'); background-size: cover">
                                <h4 class="text-center text-white lg:text-2xl uppercase">
                                    {{ $cuisine->{'name_' . app()->getLocale()} }}</h4>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div
                    class="absolute bg-nadilBtn-100 carousel-nav p-4 cuisines-next rounded-full z-10 -right-4 top-[30%] w-12 h-12 flex justify-center items-center shadow-md">
                    <i class="fa-solid fa-chevron-right"></i></div>
            </div>
        </div>
    </div>
@endsection


@push('styles')
    <link rel="stylesheet" href="{{ asset('pickadate/lib/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('pickadate/lib/themes/default.date.css') }}">
    <link rel="stylesheet" href="{{ asset('pickadate/lib/themes/default.time.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
@push('scripts')
    <script src="{{ asset('pickadate/lib/compressed/picker.js') }}"></script>
    <script src="{{ asset('pickadate/lib/compressed/picker.date.js') }}"></script>
    <script src="{{ asset('pickadate/lib/compressed/picker.time.js') }}"></script>
    <script src="{{ asset('pickadate/lib/compressed/legacy.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        jQuery('#search_time').pickatime({
            interval: 15
        })

        var res_carousel = $('.restaurant-carousel');
        res_carousel.owlCarousel({
            loop: true,
            rtl: {{ app()->getLocale() == 'ar' ? 'true' : 'false' }},
            margin: 10,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
        $('.next').click(function() {
            res_carousel.trigger('next.owl.carousel');
        })
        $('.prev').click(function() {
            res_carousel.trigger('prev.owl.carousel');
        })

        meals_carousel = $('.meals-carousel');
        meals_carousel.owlCarousel({
            loop: true,
            rtl: {{ app()->getLocale() == 'ar' ? 'true' : 'false' }},
            margin: 10,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
        $('.meals-next').click(function() {
            meals_carousel.trigger('next.owl.carousel');
        })
        $('.meals-prev').click(function() {
            meals_carousel.trigger('prev.owl.carousel');
        })

        var cuisines_carousel = $('.cuisines-carousel');
        cuisines_carousel.owlCarousel({
            loop: true,
            rtl: {{ app()->getLocale() == 'ar' ? 'true' : 'false' }},
            margin: 10,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
        $('.cuisines-next').click(function() {
            cuisines_carousel.trigger('next.owl.carousel');
        })
        $('.cuisines-prev').click(function() {
            cuisines_carousel.trigger('prev.owl.carousel');
        })

        $('.owl-carousel-mobile').owlCarousel({
            loop: true,
            margin: 10,
            items: 1
        })
    </script>
@endpush
