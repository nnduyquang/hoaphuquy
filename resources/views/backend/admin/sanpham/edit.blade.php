@extends('backend.admin.master')
@section('container')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Chỉnh Sửa Sản Phẩm</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sanphams.index') }}"> Back</a>
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
    {!! Form::model($sanpham,array('route' => ['sanphams.update',$sanpham->id],'method'=>'PATCH','files'=>true)) !!}
    <div class="row">
        <div class="col-md-5">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tên Sản Phẩm:</strong>
                    {!! Form::text('display_name', null, array('placeholder' => 'Tên Sản Phẩm','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    {!! Form::checkbox('lienhegia', '1', $sanpham->lienhegia==1?true:false) !!} Liên Hệ Để Biết Giá?
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Giá:</strong>
                    @if($sanpham->lienhegia==0)
                        {!! Form::text('price', null, array('placeholder' => 'Giá Sản Phẩm','class' => 'form-control')) !!}
                    @else
                        {!! Form::text('price', null, array('placeholder' => 'Giá Sản Phẩm','class' => 'form-control','disabled'=>'disabled')) !!}
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Chọn Danh Mục</strong>
                    <select class="selectpicker" id="ddAlbum" name="cbbDanhMuc">
                        @foreach ($danhmucs as $key => $danhmuc)
                            <option value="{{ $danhmuc->id }}" {{($sanpham->danhmuc_id==$danhmuc->id)?'selected':''}}>{{ $danhmuc->display_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hình Sản Phẩm</strong>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            {{ Html::image('images/sanpham/'.$sanpham->anhsanpham,'',array('id'=>'showHinhSanPham'))}}
                        </div>
                    </div>
                    {!! Form::file('anhsanpham',array('id'=>'chooseHinhSanPham','accept'=>'image/jpeg,image/jpg,image/png')) !!}
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Thông Tin Sản Phẩm:</strong>
                {!! Form::textarea('noidung',null, array('placeholder' => 'Thông Tin Sản Phẩm','id'=>'summernote','class' => 'form-control','rows'=>'5','style'=>'resize:none')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button id="btnDanhMuc" type="submit" class="btn btn-primary">Cập Nhật Sản Phẩm</button>
        </div>
    </div>
    {!! Form::close() !!}
@stop
