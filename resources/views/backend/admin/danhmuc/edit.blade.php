@extends('backend.admin.master')
@section('container')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Chỉnh Sửa Danh Mục</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('danhmucs.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($danhmuc,array('route' => ['danhmucs.update',$danhmuc->id],'method'=>'PATCH')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tên Danh Mục:</strong>
                {!! Form::text('display_name', null, array('placeholder' => 'Tên Danh Mục','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button id="btnDanhMuc" type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
        </div>
    </div>
    {!! Form::close() !!}
@stop
