@extends('frontend.master')
@section('container')
    @include('slider.slider')
    <div class="col-md-12">
        <div class="row">
            @include('frontend.trangchu.event')
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            @include('frontend.trangchu.sanphammoi')
            @include('frontend.trangchu.sanphamtheodanhmuc')
        </div>
    </div>
@stop