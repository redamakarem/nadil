@extends('layouts.restaurant-admin')

@section('content')
    @livewire('restaurant-admin.catalogue-category.index',[$restaurant,$catalogue])
@endsection
