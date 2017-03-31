@extends('frontend.master')
@section('container')
    <div id="main-contain" class="container col-md-12">
        <div class="empty-space"></div>
        <div class="row">
            <div class="col-md-3">
                @include('frontend.trangchu.danhmuc')
            </div>
            <div class="col-md-9">
                @include('slider.slider')
                <div class="col-md-12">
                    <div class="row">
                        @include('frontend.trangchu.event')
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        @include('frontend.trangchu.sanphammoi')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop