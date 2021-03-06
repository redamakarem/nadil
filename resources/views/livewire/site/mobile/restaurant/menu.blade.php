<div id="menu-container">

    <div class="px-4">
        <div class="mx-2 bg-[#F5F5F5] shadow-md rounded-[16px] py-6 px-5 ">
            @forelse ($categories as $category )
                <h2 class="text-center uppercase font-bold font-lato tracking-[4px] mb-4">
                    {{ $category->{'name_' . app()->getLocale()} }}</h2>
                @forelse ($category->dishes as $dish)
                    @if ($dish->is_featured)
                        <div class="bg-[#E0E0E0] rounded-xl shadow-md py-5 px-4">
                            <div class="flex flex-col">
                                <div class="flex">
                                    <div class="dish-img">
                                        <img class="rounded-full w-24 h-24"
                                            src="{{ $dish->getFirstMediaUrl('dish_images') }}"
                                            alt="{{ $dish->{'name_' . app()->getLocale()} }}">
                                    </div>
                                    <div class="flex flex-col justify-center items-end">
                                        <div class="uppercase font-lato font-thin text-sm">Nadil recommends</div>
                                        <div class="uppercase font-lato font-semibold">
                                            {{ $dish->{'name_' . app()->getLocale()} }}</div>
                                    </div>
                                </div>
                                <div class="font-lato uppercase font-thin text-xs tracking-widest">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, quidem. Quasi corrupti
                                    saepe expedita. Rerum repudiandae, sit molestiae nihil reprehenderit laborum.
                                </div>
                            </div>
                        </div>
                    @else
                        <h3 class="uppercase font-lato text-center text-xs">{{ $dish->{'name_' . app()->getLocale()} }}
                        </h3>
                        <div class="font-lato mx-3 font-thin text-center text-xs">
                            {{ $dish->{'description_' . app()->getLocale()} }}</div>
                    @endif
                @empty
                    <div class="text-center">No dishes</div>
                @endforelse
            @empty
                <div>Something went wrong</div>
            @endforelse
        </div>
    </div>

    <div class="flex justify-center my-8">
        <a
        class="bg-nadilBtn-100 rounded-xl shadow-lg px-6 py-2 uppercase font-lato" href="{{route('site.restaurants.book',$restaurant->id)}}">Book now</a>
    </div>

    <div id="googleMap" class="min-h-[300px]"></div>

    <div class="flex flex-col items-center my-4">
        <div class="my-4 font-lato font-thin uppercase tracking-[0.6rem]">Contact Info</div>
        <div class="flex justify-center w-full space-x-4">
            <a class="bg-nadilBtn-100 rounded-xl shadow-lg px-6 py-2 uppercase font-lato" href="#">Email</a>
            <a class="bg-nadilBtn-100 rounded-xl shadow-lg px-6 py-2 uppercase font-lato" href="#">Phone</a>
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

