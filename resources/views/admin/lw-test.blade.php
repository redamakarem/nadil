@extends('layouts.admin')

@section('content')
    
    <div class="row">
        @livewire('admin.reports.charts.users-by-gender')
    </div>
    <div class="row">
        @livewire('admin.reports.new-users')
    </div>
    <div class="row">
        @livewire('admin.reports.charts.users-by-age')
    </div>
    
@endsection
