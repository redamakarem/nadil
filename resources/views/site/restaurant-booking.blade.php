@extends('layouts.site-tw')
@section('content')

<div id="page-wrapper" style="background-image:url('{{$restaurant->getFirstMediaUrl('restaurant_bgs')}}'); background-size: cover">
    <div id="page-content" class=" flex flex-grow flex-col max-w-12xl w-[80%] mx-auto py-[80px]">

        <div class="flex">
            <div id="restaurant-details"
                 class="flex flex-col items-center ml-5 w-1/4 rounded-[64px] border-2 bg-white">
                <h2 class="text-4xl tracking-[14px] mt-16 uppercase text-center">{{$restaurant->{'name_'.app()->getLocale()} }}</h2>
                <hr class="h-1 w-48 mt-4" />
                <h3 class="uppercase font-din text-xl tracking-[6px] mt-3">Kuwait City</h3>
                <a href="{{route('site.restaurants.book',$restaurant->id)}}" class="uppercase mt-12 px-16 py-6 bg-nadilBtn-100 tracking-[6px] rounded-[19px]"> Book Now</a>
                <div class="uppercase mt-12 text-center tracking-[6px]">Kuwait City</div>
                <div class="uppercase  text-center font-din text-[10px] tracking-[3px]">Abu Bakr ST Matzouk Tower</div>
                <div class="px-8 flex w-full">
                    <div id="googleMap" class="flex mt-6 flex-grow rounded-[64px] h-[183px]"></div>
                </div>
                <div class="flex flex-grow w-full px-4 mt-12">
    
                    <div class="mx-auto space-x-8">
                        <a href="#" class="uppercase px-8 py-4 bg-nadilBtn-100 tracking-[6px] rounded-[19px]">Phone</a>
                        <a href="#" class="uppercase px-8 py-4 bg-nadilBtn-100 tracking-[6px] rounded-[19px]">Email</a>
                    </div>
    
                </div>
    
                <div class="mt-16 pb-28 uppercase font-lato font-italic">&quot;Curated to unlock <br> new culinary moments &quot;</div>
            </div>
    
            <div class="w-12"></div>
    
            <div id="booking"
                 class="flex flex-1 px-16 py-16 min-h-80 rounded-[64px] bg-white">
                @livewire('site.booking.show',[$restaurant])
            </div>
        </div>
    </div>
</div>

@endsection

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
