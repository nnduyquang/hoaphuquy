@extends('frontend.master')
@section('breadcrumb')
    <div class="breadcrumb col-md-12">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb-info-title">
                        <h3>Quần Áo Nam</h3>
                        <div class="blog-slug">
                            <a href="">Trang Chủ&nbsp</a>/&nbspQuần Áo Nam
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('container')
    <div id="wrap-danh-sach-san-pham" class="col-md-12">
        <div class="list">
            <div class="col-md-3">
                <div class="list-item">
                    <div class="list-content">
                        <a href="{{URL::to('/danh-muc/quan-ao-nam/quan-tay-dai')}}">{{ Html::image('images/sanpham/sanpham01.jpg','',array('class'=>'')) }}</a>
                        <h2><a href="#">Thép Tấm Grade ASTM A572 Gr50 ASTM A572 Gr50 ASTM A572 Gr50 </a></h2>
                        <div class="btn btn-primary">
                            <a href="{{URL::to('/danh-muc/quan-ao-nam/quan-tay-dai')}}">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-item">
                    <div class="list-content">
                        <a href="">{{ Html::image('images/sanpham/sanpham01.jpg','',array('class'=>'')) }}</a>
                        <h2><a href="#">Thép Tấm Grade ASTM A572 Gr50 ASTM A572 Gr50 ASTM A572 Gr50 </a></h2>
                        <div class="btn btn-primary">
                            <a href="#">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-item">
                    <div class="list-content">
                        <a href="">{{ Html::image('images/sanpham/sanpham01.jpg','',array('class'=>'')) }}</a>
                        <h2><a href="#">Thép Tấm Grade ASTM A572 Gr50 ASTM A572 Gr50 ASTM A572 Gr50 </a></h2>
                        <div class="btn btn-primary">
                            <a href="#">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-item">
                    <div class="list-content">
                        <a href="">{{ Html::image('images/sanpham/sanpham01.jpg','',array('class'=>'')) }}</a>
                        <h2><a href="#">Thép Tấm Grade ASTM A572 Gr50 ASTM A572 Gr50 ASTM A572 Gr50 </a></h2>
                        <div class="btn btn-primary">
                            <a href="#">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-item">
                    <div class="list-content">
                        <a href="">{{ Html::image('images/sanpham/sanpham01.jpg','',array('class'=>'')) }}</a>
                        <h2><a href="#">Thép Tấm Grade ASTM A572 Gr50 ASTM A572 Gr50 ASTM A572 Gr50 </a></h2>
                        <div class="btn btn-primary">
                            <a href="#">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-item">
                    <div class="list-content">
                        <a href="">{{ Html::image('images/sanpham/sanpham01.jpg','',array('class'=>'')) }}</a>
                        <h2><a href="#">Thép Tấm Grade ASTM A572 Gr50 ASTM A572 Gr50 ASTM A572 Gr50 </a></h2>
                        <div class="btn btn-primary">
                            <a href="#">Xem Chi Tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop