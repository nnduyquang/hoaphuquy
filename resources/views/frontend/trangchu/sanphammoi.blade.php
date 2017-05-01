<div class="empty-space"></div>
<div id="san-pham-moi" class="col-md-12">
    <div class="row">
        <div class="title-san-pham">
            <h3>
                Sản Phẩm Mới
            </h3>
        </div>
        <div class="wrap-san-pham col-md-12">
            <div class="row">
                <div class="list">
                    @foreach($sanphammois as $key=>$sanphammoi)
                        <div class="col-md-2 col-xs-12">
                            <div class="list-item">
                                <div class="list-content">
                                    <a href="{{URL::to('/danh-muc/'.$sanphammoi->pathdanhmuc.'/'.$sanphammoi->path)}}">{{ Html::image('images/sanpham/'.$sanphammoi->anhsanpham,'',array('class'=>'')) }}</a>
                                    <h2><a href="#">{{$sanphammoi->display_name}} </a></h2>
                                    <div class="btn btn-primary">
                                        <a href="{{URL::to('/danh-muc/'.$sanphammoi->pathdanhmuc.'/'.$sanphammoi->path)}}">Xem
                                            Chi Tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>