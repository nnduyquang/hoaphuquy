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
    <table class="table table-bordered">
        <tr>
            <th>STT</th>
            <th>Tên Sản Phẩm</th>
            <th>Path</th>
            <th>Hình Sản Phẩm</th>
            <th>Danh Mục</th>
            <th>Tác Giả</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($sanphams as $key => $sanpham)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $sanpham->display_name }}</td>
                <td>{{ $sanpham->path }}</td>
                <td>{{ $sanpham->url }}</td>
                <td>{{ $sanpham->danhmucs->display_name }}</td>
                <td>{{ $sanpham->users->name }}</td>
                <td>
                    @permission(('sanpham-edit'))
                    <a class="btn btn-primary" href="{{ route('sanphams.edit',$danhmuc->id) }}">Edit</a>
                    @endpermission
                    @permission(('sanpham-delete'))
                    {!! Form::open(['method' => 'DELETE','route' => ['sanphams.destroy', $danhmuc->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Xóa Danh Mục', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    @endpermission
                </td>
            </tr>
        @endforeach
    </table>
    {!! $sanphams->render() !!}

@stop