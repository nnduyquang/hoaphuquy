@extends('frontend.master')
@section('breadcrumb')
    <div class="breadcrumb col-md-12">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="breadcrumb-info-title">
                        @if(count($sanphams)!=0)
                            <h3>{{$sanphams[0]->tendanhmuc}}</h3>
                            <div class="blog-slug">
                                <a href="{{URL::to('/')}}">Trang Chủ&nbsp</a>/&nbsp{{$sanphams[0]->tendanhmuc}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('container')
    <div id="wrap-danh-sach-san-pham" class="col-md-12">
        <div class="list">
            @foreach($sanphams as $key=>$sanpham)
                <div class="col-md-3">
                    <div class="row">
                        <div class="list-item">
                            <div class="list-content">
                                <a href="{{URL::to('/danh-muc/'.$sanpham->pathdanhmuc.'/'.$sanpham->path)}}">{{ Html::image('images/sanpham/'.$sanpham->anhsanpham,'',array('class'=>'')) }}</a>
                                <h2><a href="#">{{$sanpham->display_name}}</a></h2>
                                <div class="btn btn-primary">
                                    <a href="{{URL::to('/danh-muc/'.$sanpham->pathdanhmuc.'/'.$sanpham->path)}}">Xem Chi
                                        Tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop