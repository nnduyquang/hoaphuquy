@extends('backend.admin.master')
@section('container')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tạo Mới Slider</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sliders.index') }}"> Back</a>
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
    {!! Form::open(array('route' => 'sliders.store','method'=>'POST','files'=>true)) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slider</strong>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {{ Html::image('','',array('id'=>'showSlider'))}}
                    </div>
                </div>
                {!! Form::file('anhslider',array('id'=>'chooseAnhSlider','accept'=>'image/jpeg,image/jpg,image/png')) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Chú Thích:</strong>
                {!! Form::text('chuthich', null, array('placeholder' => 'Chú Thích','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>STT</strong>
                {!! Form::text('order', null, array('placeholder' => 'STT','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button id="btnDanhMuc" type="submit" class="btn btn-primary">Tạo Mới Slider</button>
        </div>
    </div>
    {!! Form::close() !!}
@stop
