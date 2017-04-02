@extends('backend.admin.master')
@section('container')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Quản Lý Danh Mục</h2>
            </div>
            <div class="pull-right">
                @permission(('danhmuc-create'))
                <a class="btn btn-success" href="{{ route('danhmucs.create') }}"><i class="fa fa-plus"
                                                                                    aria-hidden="true"></i>
                    Tạo Mới Danh Mục</a>
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
            <th>Tên Danh Mục</th>
            <th>Path</th>
            <th>Tác Giả</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($danhmucs as $key => $danhmuc)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $danhmuc->display_name }}</td>
                <td>{{ $danhmuc->path }}</td>
                <td>{{ $danhmuc->users->name }}</td>
                <td>
                    @permission(('danhmuc-edit'))
                    <a class="btn btn-primary" href="{{ route('danhmucs.edit',$danhmuc->id) }}">Edit</a>
                    @endpermission
                    @permission(('danhmuc-delete'))
                    {!! Form::open(['method' => 'DELETE','route' => ['danhmucs.destroy', $danhmuc->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Xóa Danh Mục', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    @endpermission
                </td>
            </tr>
        @endforeach
    </table>
    {!! $danhmucs->render() !!}

@stop