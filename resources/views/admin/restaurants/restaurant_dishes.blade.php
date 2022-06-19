@extends('layouts.admin')

@section('content')
    @livewire('admin.restaurants.restaurant-dishes',[$restaurant])
@endsection
