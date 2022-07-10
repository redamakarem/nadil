@extends('layouts.restaurant-admin')

@section('content')
    @livewire('restaurant-admin.dish.edit',[$restaurant,$catalogue,$category,$dish])
@endsection
