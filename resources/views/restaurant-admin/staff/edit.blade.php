@extends('layouts.restaurant-admin')

@section('content')
    @livewire('restaurant-admin.staff.edit',[$restaurant,$staff])
@endsection
