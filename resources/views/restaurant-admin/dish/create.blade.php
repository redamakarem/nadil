@extends('layouts.restaurant-admin')

@section('content')
    @livewire('restaurant-admin.dish.create',[$restaurant,$catalogue,$category])
@endsection
