@extends('backend.admin.master')
@section('container')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tạo Mới Sản Phẩm</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sanphams.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Úi!</strong> Hình Như Có Gì Đó Sai Sai.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(array('route' => 'sanphams.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tên Danh Mục:</strong>
                {!! Form::text('display_name', null, array('placeholder' => 'Tên Sản Phẩm','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::checkbox('lienhegia', 'Liên Hệ Để Biết Giá?', false) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Giá:</strong>
                {!! Form::text('price', null, array('placeholder' => 'Giá Sản Phẩm','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Thông Tin Sản Phẩm:</strong>
                {!! Form::textarea('noidung',null, array('placeholder' => 'Thông Tin Sản Phẩm','id'=>'summernote','class' => 'form-control','rows'=>'5','style'=>'resize:none')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Chọn Danh Mục</strong>
                <select class="selectpicker" id="ddAlbum">
                    <option>Mustard</option>
                    <option>Ketchup</option>
                    <option>Relish</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hình Sản Phẩm</strong>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {{ Html::image('','',array('id'=>'showHinhSanPham'))}}
                    </div>
                </div>
                {!! Form::file('url',array('id'=>'chooseHinhSanPham','accept'=>'image/jpeg,image/jpg,image/png')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button id="btnDanhMuc" type="submit" class="btn btn-primary">Tạo Mới Danh Mục</button>
        </div>
    </div>
    {!! Form::close() !!}
@stop
