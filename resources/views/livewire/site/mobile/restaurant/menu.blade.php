<div id="menu-container">

    <div class="px-4">
        <div class="mx-2 bg-[#F5F5F5] shadow-md rounded-[16px] py-6 px-5 ">
            @forelse ($categories as $category )
                @if ($category->dishes->count()>0)
                <h2 class="text-center uppercase font-bold font-lato rtl:font-ahlan rtl:tracking-normal tracking-[4px] mb-4">
                    {{ $category->{'name_' . app()->getLocale()} }}</h2>
                @forelse ($category->dishes as $dish)
                    @if ($dish->is_featured)
                        <div class="bg-[#E0E0E0] rounded-xl shadow-md py-5 px-4 mb-4">
                            <div class="flex flex-col">
                                <div class="flex">
                                    <div class="dish-img">
                                        <img class="rounded-full w-24 h-24"
                                            src="{{ $dish->getFirstMediaUrl('dish_images') }}"
                                            alt="{{ $dish->{'name_' . app()->getLocale()} }}">
                                    </div>
                                    <div class="flex flex-col justify-center items-center w-full">
                                        <div class="uppercase font-lato font-thin text-sm">Nadil recommends</div>
                                        <div class="uppercase font-lato font-semibold rtl:font-ahlan rtl:tracking-normal">
                                            {{ $dish->{'name_' . app()->getLocale()} }}</div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    @else
                        <div class="my-8">
                            <h3 class="uppercase font-lato text-center text-xs rtl:font-ahlan rtl:tracking-normal">{{ $dish->{'name_' . app()->getLocale()} }}
                            </h3>
                            <div class="font-lato rtl:font-ahlan rtl:tracking-normal mx-3 font-thin text-center text-xs">
                                {{ $dish->{'description_' . app()->getLocale()} }}</div>
                        </div>
                    @endif
                @empty
                    <div class="text-center">No dishes</div>
                @endforelse
                @endif
            @empty
                <div>Something went wrong</div>
            @endforelse
        </div>
    </div>

    <div class="flex justify-center my-8">
        <a
        class="bg-nadilBtn-100 rounded-xl shadow-lg px-6 py-2 uppercase font-lato rtl:font-ahlan rtl:tracking-normal" href="{{route('site.restaurants.book',$restaurant->id)}}">{{__('nadil.booking.book_now')}}</a>
    </div>

    <div class="flex justify-center">
        <div class="flex flex-col items-center w-full">
            <div id="googleMap" class="min-h-[300px] w-[100%]"></div>
        </div>
    </div>

    <div class="flex flex-col items-center my-4">
        <div class="my-4 font-lato font-thin uppercase tracking-[0.6rem]">Contact Info</div>
        <div class="flex justify-center w-full space-x-4">
            <a class="bg-nadilBtn-100 rounded-xl shadow-lg px-6 py-2 uppercase font-lato" href="#">{{__('nadil.general.email')}}</a>
            <a class="bg-nadilBtn-100 rounded-xl shadow-lg px-6 py-2 uppercase font-lato" href="#">{{__('nadil.general.phone')}}</a>
        </div>
        <div class="my-4 font-lato font-thin uppercase tracking-[0.6rem]">Socials</div>
        <div class="flex justify-center w-full space-x-4">
            @if (!empty($restaurant->facebook))
                <a href="{{ $restaurant->facebook }}"
                    class="flex justify-center items-center uppercase bg-nadilBtn-100 rounded-xl w-12 h-12 text-center">
                    <i class="fa-brands fa-facebook-f"></i></a>
            @endif
            @if (!empty($restaurant->instagram))
                <a href="{{ $restaurant->instagram }}" class="flex justify-center items-center uppercase bg-nadilBtn-100 rounded-xl w-12 h-12 text-center"><i
                        class="fa-brands fa-instagram"></i></a>
            @endif
        </div>
    </div>

</div>

@push('scripts')
    <script>
        // jQuery('#inlinePicker').datepicker();
        document.addEventListener('load', function () {
            initMap();

        })
        function initMap() {
            var coordsStr = "{{$restaurant->coordinates}}";
            const myArray = coordsStr.split(",");
            const lat = myArray[0];
            const lng = myArray[1];

            console.log(coordsStr.toString());
            const myLatlng = { lat: parseFloat(lat), lng: parseFloat(lng) };
            const map = new google.maps.Map(document.getElementById("googleMap"), {
                zoom: 10,
                center: myLatlng,
            });

            const marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
            });


        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfJsNn93pyzgF-9ICzEI1q-N9UN3c0SxE&callback=initMap"></script>
@endpush

