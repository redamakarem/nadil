@extends('layouts.admin')
@section('content')
    @livewire('admin.bookings.edit',['$booking_id'])
@endsection
