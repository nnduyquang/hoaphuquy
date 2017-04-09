@extends('backend.admin.master')
@section('container')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Chỉnh Sửa Trang</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('trangs.index') }}"> Back</a>
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
    {!! Form::model($trang,array('route' => ['trangs.update',$trang->id],'method'=>'PATCH')) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Tên Trang:</strong>
                {!! Form::text('display_name', null, array('placeholder' => 'Tên Trang','class' => 'form-control')) !!}
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nội Dung:</strong>
                    {!! Form::textarea('noidung',null, array('placeholder' => 'Nội Dung','id'=>'summernote-trang','class' => 'form-control','rows'=>'5','style'=>'resize:none')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button id="btnDanhMuc" type="submit" class="btn btn-primary">Cập Nhật Trang</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop
