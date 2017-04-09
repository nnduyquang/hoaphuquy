@extends('frontend.master')
@section('breadcrumb')
    <div class="breadcrumb col-md-12">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb-info-title">
                        <h3>Quần Tập Thể Dục</h3>
                        <div class="blog-slug">
                            <a href="">Trang Chủ&nbsp</a><a href="">/&nbspQuần Áo Nam&nbsp</a>/&nbsp{{$sanpham->display_name}}
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
                        {{ Html::image('images/sanpham/'.$sanpham->anhsanpham,'',array('class'=>'')) }}
                    </div>
                    <div class="col-md-9">
                        <h3 class="title-sanpham">{{$sanpham->display_name}}</h3>
                        <div class="gia-san-pham">Giá:
                            @if($sanpham->lienhegia==0)
                                {{$sanpham->price}}
                            @else
                                Liên Hệ Để Báo Giá
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div id="wrap-thong-tin-chi-tiet" class="col-md-12">
                <div class="row">
                    <ul class="nav nav-tabs thong-tin-chi-tiet">
                        <li class="active"><a data-toggle="tab" href="#home">Thông Tin Chi Tiết</a></li>
                    </ul>

                    <div class="tab-content">
                        <textarea id="chitietsanpham" class="tab-pane fade in active">
                            {{$sanpham->noidung }}
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop