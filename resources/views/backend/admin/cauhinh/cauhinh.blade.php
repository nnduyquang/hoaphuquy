@extends('backend.admin.master')
@section('container')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cấu Hình</h2>
            </div>
            {{--<div class="pull-right">--}}
            {{--<a class="btn btn-primary" href="{{ route('sanphams.index') }}"> Back</a>--}}
            {{--</div>--}}
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
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
    {!! Form::open(array('route' => 'cauhinhs.store','method'=>'POST','files'=>true)) !!}
    <div class="row">
        @foreach($cauhinhs as $key=>$cauhinh)
            @if($cauhinh->order==1)
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <strong>{{$cauhinh->name}}:</strong>
                            <div class="form-group">
                                {{ Html::image('images/logo/'.$cauhinh->hinh,'',array('id'=>'showLogo','class'=>'show-logo'))}}
                            </div>
                            {!! Form::file('hinhLogo',array('id'=>'chooseHinhLogo','accept'=>'image/jpeg,image/jpg,image/png')) !!}
                        </div>

                    </div>
                </div>
            @endif
            @if($cauhinh->order==2)
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <strong>{{$cauhinh->name}}:</strong>
                            <div class="form-group">
                                {{ Html::image('images/temp/'.$cauhinh->hinh,'',array('id'=>'showHinhMainTrai','class'=>'show-main-trai'))}}
                            </div>
                            {!! Form::file('hinhMainTrai',array('id'=>'chooseHinhMainTrai','accept'=>'image/jpeg,image/jpg,image/png')) !!}
                        </div>

                    </div>
                </div>
            @endif
            @if($cauhinh->order==3)
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{$cauhinh->name}}:</strong>
                        {!! Form::textarea('noidungLienHe',$cauhinh->noidung, array('placeholder' => 'Thông Tin Liên Hệ','id'=>'summernoteCauHinhLienHe','class' => 'form-control','rows'=>'5','style'=>'resize:none')) !!}
                    </div>
                </div>
            @endif
        @endforeach
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button id="btnDanhMuc" type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </div>
    {!! Form::close() !!}
@stop
