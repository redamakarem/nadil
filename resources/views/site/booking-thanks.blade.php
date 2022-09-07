@extends('layouts.site-tw')
@section('content')

<div id="page-wrapper" style="background-image:url('{{$booking->restaurant->getFirstMediaUrl('restaurant_bgs')}}'); background-size: cover">
    <div id="page-content" class="flex flex-grow flex-col w-[85%] max-w-12xl mx-auto py-[80px] ">
        <div class="flex">
            <div id="restaurant-details"
                 class="flex flex-col items-center w-[400px] rounded-[64px] border-2 bg-white">
                <h2 class="ltr:font-lato rtl:font-ahlan text-4xl ltr:tracking-widest rtl:tracking-normal mt-16 uppercase text-center">{{ $booking->restaurant->{'name_'.app()->getLocale()}  }}</h2>
                <hr class="h-1 w-48 mt-4" />
                <h3 class="uppercase ltr:font-din rtl:font-ahlan text-xl ltr:tracking-[6px] rtl:tracking-normal mt-3">{{$booking->restaurant->areaa->governate->{'name_'.app()->getLocale()} }}</h3>
                <a href="{{route('site.restaurants.book',$booking->restaurant->id)}}" class="uppercase mt-12 px-16 py-6 bg-nadilBtn-100 ltr:tracking-[6px] rtl:tracking-normal rounded-[19px]">{{__('nadil.booking.book_now')}}</a>
                <div class="uppercase mt-12 text-center tracking-[6px] rtl:font-ahlan rtl:tracking-normal">{{$booking->restaurant->areaa->governate->{'name_'.app()->getLocale()} }}</div>
                <div class="uppercase  text-center font-din text-[10px] tracking-[3px] rtl:font-ahlan rtl:tracking-normal">{{$booking->restaurant->areaa->{'name_'.app()->getLocale()} }}</div>
                <div class="px-8 flex w-full">
                    <div id="googleMap" class="flex mt-6 flex-grow rounded-[64px] h-[183px] shadow-md"></div>
                </div>
                <div class="flex flex-grow w-full px-4 mt-6 space-x-8 justify-center">
                        <a href="#" class="uppercase px-8 py-4 bg-nadilBtn-100 tracking-[6px] rounded-[19px]">Phone</a>
                        <a href="#" class="uppercase px-8 py-4 bg-nadilBtn-100 tracking-[6px] rounded-[19px]">Email</a>
                </div>
                <div class="flex flex-grow w-full px-4 mt-6 space-x-8 justify-center">
                        @if (!empty($booking->restaurant->facebook))
                            <a href="{{$booking->restaurant->facebook}}" class="uppercase px-4 py-4 bg-nadilBtn-100 tracking-[6px] rounded-[19px]"><i class="fa-brands fa-facebook-f"></i></a>
                        @endif
                        @if (!empty($booking->restaurant->instagram))
                            <a href="{{$booking->restaurant->instagram}}" class="uppercase px-4 py-4 bg-nadilBtn-100 tracking-[6px] rounded-[19px]"><i class="fa-brands fa-instagram"></i></a>
                        @endif
                        
                </div>
    
                <div class="mt-16 pb-28 uppercase font-lato font-italic">&quot;Curated to unlock <br> new culinary moments &quot;</div>
            </div>
    
            <div class="w-12"></div>
    
            <div id="menu"
                 class="flex flex-col space-y-12 items-center flex-1 px-16 py-16 min-h-80 rounded-[64px] border-2 bg-white">
                <div class="h-24 flex justify-center items-center uppercase font-lato font-bold mt-12 px-16 py-6 bg-nadilBtn-100 ltr:tracking-[6px] rtl:tracking-normal rounded-[19px]">Your order has been placed</div>
                <img src="{{asset('/images/booking-thanks.png')}}" alt="booking thanks">
                <div>Order #{{ $booking->booking_code }}</div>
                <div class="flex w-full justify-end">
                    <a href="#" class="uppercase mt-12 px-16 py-6 bg-nadilBg-100 shadow-md ltr:tracking-[6px] rtl:tracking-normal rounded-[19px]">Back to menu</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        jQuery('#inlinePicker').datepicker();
        document.addEventListener('load', function () {
            initMap();




        })
        function initMap() {
            var coordsStr = "{{$booking->restaurant->coordinates}}";
            const myArray = coordsStr.split(",");
            const lat = myArray[0];
            const lng = myArray[1];

            console.log(coordsStr.toString());
            const myLatlng = { lat: parseFloat(lat), lng: parseFloat(lng) };
            const map = new google.maps.Map(document.getElementById("googleMap"), {
                zoom: 17,
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
