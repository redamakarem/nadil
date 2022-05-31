@extends('layouts.restaurant-admin')

@section('content')
    @livewire('restaurant-admin.catalogue.index',[$restaurant])
@endsection
