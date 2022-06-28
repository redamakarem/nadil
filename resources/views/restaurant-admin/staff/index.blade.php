@extends('layouts.restaurant-admin')

@section('content')
    @livewire('restaurant-admin.staff.index',[$restaurant])
@endsection
