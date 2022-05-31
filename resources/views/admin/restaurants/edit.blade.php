@extends('layouts.admin')
@section('content')
    @livewire('admin.restaurants.edit', [$restaurant, $cuisines]);
@endsection
