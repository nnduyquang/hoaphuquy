@extends('backend.admin.master')
@section('container')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Quản Lý Slider</h2>
            </div>
            <div class="pull-right">
                @permission(('slider-create'))
                <a class="btn btn-success" href="{{ route('sliders.create') }}"><i class="fa fa-plus"
                                                                                   aria-hidden="true"></i>
                    Thêm Mới Slider</a>
                @endpermission
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @elseif($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>STT</th>
            <th>Tên Hình</th>
            <th>Ảnh Slider</th>
            <th>Chú Thích</th>
            <th>Thứ Tự</th>
            <th>Tác Giả</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($sliders as $key => $slider)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $slider->display_name }}</td>
                <td>
                    {{ Html::image('images/slider/'.$slider->anhslider,'',array('class'=>'showSlider'))}}
                </td>
                <td>{{ $slider->chuthich }}</td>
                <td>{{ $slider->order }}</td>
                <td>{{ $slider->users->name }}</td>
                <td>
                    @permission(('slider-edit'))
                    <a class="btn btn-primary" href="{{ route('sliders.edit',$slider->id) }}">Edit</a>
                    @endpermission
                    @permission(('slider-delete'))
                    {!! Form::open(['method' => 'DELETE','route' => ['sliders.destroy', $slider->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Xóa Slide', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    @endpermission
                </td>
            </tr>
        @endforeach
    </table>
    {!! $sliders->render() !!}
@stop