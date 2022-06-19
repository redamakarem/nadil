@extends('layouts.admin')
@section('content')
    @livewire('admin.restaurants.multi-step-create-form',[$cuisines, $users])
@endsection
