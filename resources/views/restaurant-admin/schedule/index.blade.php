@extends('layouts.restaurant-admin')

@section('content')
    @livewire('restaurant-admin.schedule.index',[$restaurant])
@endsection
