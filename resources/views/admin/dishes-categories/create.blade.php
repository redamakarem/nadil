@extends('layouts.admin')
{{--@section('breadcrumbs')--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <ol class="breadcrumb float-sm-right">--}}
{{--                                @foreach($breadcrumbs as $key => $breadcrumb)--}}
{{--                                    <li class="breadcrumb-item"><a href="{{$breadcrumb}}">{{$key}}</a></li>--}}
{{--                                @endforeach--}}
{{--                            </ol>--}}
{{--                        </div>--}}
{{--@endsection--}}
@section('content')
    @livewire('admin.dishes-category.create',[$menu,$restaurant])
@endsection
