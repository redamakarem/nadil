@extends('layouts.restaurant-admin')

@section('content')
    @livewire('restaurant-admin.catalogue-category.edit',[$catalogue,$category])
@endsection
