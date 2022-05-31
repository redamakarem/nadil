@extends('layouts.admin')
@section('content')
    @livewire('restaurant-admin.table.index',[$restaurant])
@endsection