@extends('layouts.restaurant-admin')

@section('content')
    @livewire('restaurant-admin.schedule.edit',[$restaurant, $menu])
@endsection
