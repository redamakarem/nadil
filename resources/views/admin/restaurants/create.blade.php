@extends('layouts.admin')
@section('content')
    @livewire('admin.restaurants.create',[$cuisines, $users])
@endsection
