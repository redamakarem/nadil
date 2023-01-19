@extends('layouts.admin')

@section('content')
    <div class="row">
        @if (\Illuminate\Support\Facades\Session::has('info'))
            <p class="alert-success">{{ \Illuminate\Support\Facades\Session::get('info') }}</p>
        @endif
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $restaurant_count }}</h3>

                    <p>Restaurants</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-restaurant"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">

            @livewire('admin.components.restaurant-registration-submissions-box')
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $user_count }}</h3>

                    <p>Clients</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="row">
            @livewire('admin.booking.calendar')
        </div>
    </div>
@endsection
