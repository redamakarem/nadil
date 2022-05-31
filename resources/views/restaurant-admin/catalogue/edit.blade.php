@extends('layouts.restaurant-admin')

@section('content')
    @livewire('restaurant-admin.catalogue.edit',[$restaurant, $menu])
@endsection
