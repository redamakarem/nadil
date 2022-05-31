@extends('layouts.restaurant-admin')

@section('content')
    @livewire('restaurant-admin.catalogue-category.create',[$restaurant,$catalogue])
@endsection
