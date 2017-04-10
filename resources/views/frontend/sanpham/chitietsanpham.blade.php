@extends('frontend.master')
@section('breadcrumb')
    <div class="breadcrumb col-md-12">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb-info-title">
                        <h3>{{$sanpham->display_name}}</h3>
                        <div class="blog-slug">
                            <a href="{{URL::to('/')}}">Trang Chủ&nbsp</a><a
                                    href="{{URL::to('/danh-muc/'.$sanpham->pathdanhmuc)}}">/&nbsp{{$sanpham->tendanhmuc}}
                                &nbsp</a>/&nbsp{{$sanpham->display_name}}
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
                    <div class="col-md-5">
                        <div class="row">
                            {{ Html::image('images/sanpham/'.$sanpham->anhsanpham,'',array('class'=>'')) }}
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
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
            </div>
            <div id="wrap-thong-tin-chi-tiet" class="col-md-12">
                <div class="row">
                    <ul class="nav nav-tabs thong-tin-chi-tiet">
                        <li class="active"><a data-toggle="tab" href="#home">Thông Tin Chi Tiết</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="chitietsanpham" class="tab-pane fade in active">
                            {!! html_entity_decode($sanpham->noidung) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" id="wrap-san-pham-lien-quan">
                <div class="row">
                    <div class="title-san-pham">
                        <h3>
                            Sản Phẩm Liên Quan
                        </h3>
                    </div>
                    <div class="wrap-san-pham-danh-muc">
                        @foreach($sanphamlienquans as $key=>$splq)
                            <div class="list-item">
                                <div class="list-content">
                                    <a href="{{URL::to('/danh-muc/'.$splq->pathdanhmuc.'/'.$splq->path)}}">{{ Html::image('images/sanpham/'.$splq->anhsanpham,'',array('class'=>'')) }}</a>
                                    <h2><a href="#">{{$splq->display_name}} </a></h2>
                                    <div class="btn btn-primary">
                                        <a href="{{URL::to('/danh-muc/'.$splq->pathdanhmuc.'/'.$splq->path)}}">Xem Chi
                                            Tiết</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="sp-arrow-control">
                        <div class="arrow-nav">
                            <div class="arrow-prev1">
                                <i class="fa fa-angle-left"></i>
                            </div>
                            <div class="arrow-next1">
                                <i class="fa fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop