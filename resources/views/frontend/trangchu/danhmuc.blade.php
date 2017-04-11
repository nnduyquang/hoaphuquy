<div class="col-md-12 visible-md-block visible-lg-block">
    <div class="row">
        <h2 class="title-category">Danh Mục Sản Phẩm</h2>
        <div class="list-category">
            <ul>
                @foreach ($danhmucs as $key => $danhmuc)
                    <li><a href="{{URL::to('/danh-muc/'.$danhmuc->path)}}">{{$danhmuc->display_name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="col-md-12 empty-space visible-md-block visible-lg-block"></div>
<div class="col-md-12 visible-md-block visible-lg-block">
    <div class="row">
        <div class="hover14 column">
            <div>
                <figure>{{ Html::image('images/temp/'.$cauhinh->hinh,'',array('class'=>'')) }}</figure>
            </div>
        </div>
    </div>
</div>