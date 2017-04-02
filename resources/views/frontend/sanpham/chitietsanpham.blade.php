@extends('frontend.master')
@section('breadcrumb')
    <div class="breadcrumb col-md-12">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb-info-title">
                        <h3>Quần Tập Thể Dục</h3>
                        <div class="blog-slug">
                            <a href="">Trang Chủ&nbsp</a><a href="">/&nbspQuần Áo Nam&nbsp</a>/&nbspQuần Tập Thể Dục
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('container')
    <div id="wrap-chi-tiet-san-pham" class="col-md-12">
        <div class="row">
            <div id="wrap-tom-tat" class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        {{ Html::image('images/sanpham/sanpham01.jpg','',array('class'=>'')) }}
                    </div>
                    <div class="col-md-9">
                        <h3 class="title-sanpham">Quần tây nam dài thòong</h3>
                        <div class="gia-san-pham">Giá: 50.000</div>
                    </div>
                </div>
            </div>
            <div id="wrap-thong-tin-chi-tiet" class="col-md-12">
                <div class="row">
                    <ul class="nav nav-tabs thong-tin-chi-tiet">
                        <li class="active"><a data-toggle="tab" href="#home">Thông Tin Chi Tiết</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <h3>HOME</h3>
                            <p>Some content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop