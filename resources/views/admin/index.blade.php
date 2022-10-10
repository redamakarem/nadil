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
            <div class="col-md-12">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                    href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                    aria-selected="true" wire:ignore>Expected</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile"
                                    aria-selected="false" wire:ignore>Arrived</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill"
                                    href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages"
                                    aria-selected="false" wire:ignore>No Show</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill"
                                    href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings"
                                    aria-selected="false" wire:ignore>Cancelled</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent" >
                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                aria-labelledby="custom-tabs-one-home-tab" wire:ignore.self>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper
                                dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo.
                                Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque
                                tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique
                                senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit
                                suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo
                                est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus
                                quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum
                                ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                aria-labelledby="custom-tabs-one-profile-tab" wire:ignore.self>
                                Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut
                                ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                                cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis
                                posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere
                                nec nunc. Nunc euismod pellentesque diam.
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel"
                                aria-labelledby="custom-tabs-one-messages-tab" wire:ignore.self>
                                Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat
                                augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit
                                sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut
                                velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus
                                tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet
                                sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum
                                gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt
                                eleifend ac ornare magna.
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel"
                                aria-labelledby="custom-tabs-one-settings-tab" wire:ignore.self>
                                Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus
                                turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis
                                vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum
                                pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet
                                urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse
                                platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
