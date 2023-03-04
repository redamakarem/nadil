@extends('layouts.admin')
@section('content')
    <div class="row">

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Top Times</h3>
                    @foreach ($top_time as $item)
                        <p>{{ $item->booking_time }}</p>
                    @endforeach


                </div>
                <div class="icon">
                    <i class="ion ion-android-restaurant"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>Top Booked</h3>
                    @foreach ($top_booked as $item)
                        <p>{{ $item->name_en }}</p>
                    @endforeach


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
                    <h3>Top Weekdays</h3>
                    @foreach ($top_weekdays as $item)
                        <p>{{ $item }}</p>
                    @endforeach


                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-md-12">
            @livewire('admin.reports.charts.users-by-gender')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @livewire('admin.reports.new-users')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @livewire('admin.reports.charts.users-by-age')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @livewire('admin.booking.calendar')
        </div>
    </div>


    </div>
@endsection
