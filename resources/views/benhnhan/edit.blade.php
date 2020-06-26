@extends('pages.layout.layouts')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Doctor</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('bacsi.index') }}"> Back</a>
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


{!! Form::model($benhnhan, ['method' => 'PATCH','route' => ['benhnhan.update', $benhnhan->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong> Patient Name:</strong>
            {!! Form::text('hovaten', null, array('placeholder' => 'Pstient Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ngày Sinh:</strong>
            <br/>
            {!! Form::date('ngaysinh', null, array('placeholder' => 'Ngày Sinh','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Giới Tính:</strong>
            <br/>
            {!! Form::text('gioitinh', null, array('placeholder' => 'Giới Tính','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Số Điện Thoại:</strong>
            <br/>
            {!! Form::text('sodienthoai', null, array('placeholder' => 'Số Điện Thoại','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ngày khám:</strong>
            <br/>
            {!! Form::date('ngaykham', null, array('placeholder' => 'Ngày Khám','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong> Tên Bệnh Viện:</strong>
            <select name="id_benhvien" class="browser-default custom-select">
                @foreach($benhvien as $value)
                <option value="{{$value->id}}" >{{$value->tenbenhvien}}</option>  
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong> Tên chuyên khoa:</strong>
            <select name="id_chuyenkhoa" class="browser-default custom-select">
                @foreach($chuyenkhoa as $ck)
                <option value="{{$ck->id}}" >{{$ck->tenchuyenkhoa}}</option>  
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong> Tên Bác Sĩ:</strong>
            <select name="id_bacsi" class="browser-default custom-select">
                @foreach($bacsi as $bs)
                <option value="{{$bs->id}}" >{{$bs->tenbacsi}}</option>  
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong> Khung Giờ Khám:</strong>
            <select name="id_khunggio" class="browser-default custom-select">
                @foreach($khunggio as $kg)
                <option value="{{$kg->id}}" >{{$kg->khunggio}}</option>  
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


@endsection