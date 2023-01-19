@extends('layouts.site-mobile')
@section('content')
    @livewire('site.mobile.user.history',[$bookings,$profile])
@endsection
