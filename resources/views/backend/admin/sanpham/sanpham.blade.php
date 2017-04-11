@extends('backend.admin.master')
@section('container')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Quản Lý Sản Phẩm</h2>
            </div>
            <div class="pull-right">
                @permission(('sanpham-create'))
                <a class="btn btn-success" href="{{ route('sanphams.create') }}"><i class="fa fa-plus"
                                                                                    aria-hidden="true"></i>
                    Thêm Mới Sản Phẩm</a>
                @endpermission
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table id="dataSanPham" class="table table-bordered">
        <thead>
        <tr>
            {{--<th>STT</th>--}}
            <th>Tên Sản Phẩm</th>
            <th>Path</th>
            <th>Hình Sản Phẩm</th>
            <th>Giá</th>
            <th>Danh Mục</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($sanphams as $key => $sanpham)
            <tr>
                {{--<td>{{ ++$i }}</td>--}}
                <td>{{ $sanpham->display_name }}</td>
                <td>{{ $sanpham->path }}</td>
                <td>
                    {{ Html::image('images/sanpham/'.$sanpham->anhsanpham,'',array('class'=>'showHinhSanPham'))}}
                </td>
                <td>@if($sanpham->lienhegia==0)
                        {{$sanpham->price}}
                    @else
                        Liên Hệ Để Biết Giá
                    @endif
                </td>
                <td>{{ $sanpham->tendanhmuc }}</td>
                <td>
                    @permission(('sanpham-edit'))
                    <a class="btn btn-primary" href="{{ route('sanphams.edit',$sanpham->id) }}">Edit</a>
                    @endpermission
                    @permission(('sanpham-delete'))
                    {!! Form::open(['method' => 'DELETE','route' => ['sanphams.destroy', $sanpham->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Xóa Sản Phẩm', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    @endpermission
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--{!! $sanphams->render() !!}--}}

@stop