@extends('layouts.restaurant-admin')

@section('content')
    @livewire('restaurant-admin.dish.edit',[$catalogue,$category])
@endsection
