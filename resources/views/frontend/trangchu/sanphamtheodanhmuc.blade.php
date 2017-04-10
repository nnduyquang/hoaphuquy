<div class="empty-space"></div>


@foreach($sanphamtheodanhmucs as $key=>$sanphamtheodanhmuc)
<div class="san-pham-danh-muc col-md-12">
    <div class="row">
        <div class="title-san-pham">
            <h3>
                {{$sanphamtheodanhmuc['tendanhmuc']}}
            </h3>
        </div>
        <div class="wrap-san-pham-danh-muc">
            @foreach($sanphamtheodanhmuc['listsanpham'] as $key=>$sp)
            <div class="list-item">
                <div class="list-content">
                    <a href="{{URL::to('/danh-muc/'.$sp->pathdanhmuc.'/'.$sp->path)}}">{{ Html::image('images/sanpham/'.$sp->anhsanpham,'',array('class'=>'')) }}</a>
                    <h2><a href="#">{{$sp->display_name}} </a></h2>
                    <div class="btn btn-primary">
                        <a href="{{URL::to('/danh-muc/'.$sp->pathdanhmuc.'/'.$sp->path)}}">Xem Chi Tiết</a>
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
<div class="empty-space"></div>
@endforeach
