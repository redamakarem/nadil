@extends('layouts.site-mobile')
@section('content')
    <div class="container">
        <div class="w-full flex items-center flex-col space-y-8 my-8">
            @foreach ($bookings as $booking )
            <div class="shadow-md bg-red rounded-md py-8 mx-6 w-full mt-8 cursor-pointer" style="background-image:url('{{$booking->restaurant->getFirstMediaUrl('restaurant_bgs')}}'); background-size: cover">
               <div class="text-3xl text-black text-center"> {{ $booking->restaurant->{'name_'.app()->getLocale()} }}</div>
               <div class="text-black text-center"> {{ $booking->booking_date }}</div>
               <div class="text-black text-center"> {{ $booking->booking_status->{'name_'.app()->getLocale()}  }}</div>
               @if ($booking->booking_date > \Carbon\Carbon::now() && $booking->booking_status_id==1)
               <a href="#" class="text-black" onclick="event.preventDefault();
               document.getElementById('cancel-booking-form-{{$booking->id}}').submit();">{{__('Cancel Booking')}}</a>
               
                <form action="{{ route('user.cancel-booking') }}" id="cancel-booking-form-{{$booking->id}}" method="POST" >
                    @csrf
                    <input type="hidden" name="booking-id" value="{{$booking->id}}">
                </form>
               @endif
            
            </div>
            @endforeach
        </div>

        </div>
    </div>
@endsection
