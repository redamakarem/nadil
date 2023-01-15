@extends('layouts.site-mobile')
@section('content')
<div class="flex flex-col items-center">
    <div class="uppercase text-center mt-24 mb-4 px-8 py-6 w-full bg-nadilBtn-100 tracking-[4px] rounded-[19px]">Thank you</div>
<img src="{{asset('/images/booking-thanks.png')}}" class="w-32" alt="booking thanks">
<div class="mt-4">Order #{{ $booking->booking_code }}</div>
<div class="flex w-full justify-center">
    <a href="#" class="uppercase mt-12 px-16 py-6 bg-nadilBg-100 shadow-md ltr:tracking-[6px] rtl:tracking-normal rounded-[19px]">Back to home</a>
</div>
</div>
@endsection


