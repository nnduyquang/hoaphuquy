<div class="visible-md-block visible-lg-block">
    <h2 class="title-category">Danh Mục Sản Phẩm</h2>
    <div class="list-category">
        <ul>
            @foreach ($danhmucs as $key => $danhmuc)
            <li><a href="{{URL::to('/danh-muc/'.$danhmuc->path)}}">{{$danhmuc->display_name }}</a></li>
            @endforeach
            {{--<li><a href="{{URL::to('/danh-muc/quan-ao-nam')}}">Quần áo nữ</a></li>--}}
            {{--<li><a href="{{URL::to('/danh-muc/quan-ao-nam')}}">Quần áo nam</a></li>--}}
            {{--<li><a href="{{URL::to('/danh-muc/quan-ao-nam')}}">Quần áo nam</a></li>--}}
        </ul>
    </div>
</div>