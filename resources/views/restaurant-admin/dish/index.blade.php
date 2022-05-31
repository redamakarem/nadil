@extends('layouts.restaurant-admin')

@section('content')
    @livewire('restaurant-admin.dish.index',[$restaurant,$catalogue,$category])
@endsection
