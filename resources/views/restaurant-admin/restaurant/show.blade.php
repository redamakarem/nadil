@extends('layouts.restaurant-admin')

@section('content')
    @livewire('restaurant-admin.restaurant.show',[$restaurant])
@endsection
