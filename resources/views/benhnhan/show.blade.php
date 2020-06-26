@extends('pages.layout.layouts')

@section('content')
<div class="page-content-wrapper">
<div class="page-content">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Patient</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('benhnhan.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Họ Và Tên:</strong>
            {{ $benhnhan->hovaten }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ngày Sinh:</strong>
            {{$benhnhan->ngaysinh}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Giới Tính:</strong>
            {{$benhnhan->gioitinh}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ngày Khám:</strong>
            {{$benhnhan->ngaykham}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Số Điện Thoại:</strong>
            {{$benhnhan->sodienthoai}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tên Bệnh Viện:</strong> 
            {{$benhnhan->benhvien->tenbenhvien}}  
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tên Chuyên Khoa:</strong> 
            {{$benhnhan->chuyenkhoa->tenchuyenkhoa}}  
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tên Bác Sĩ: </strong> 
            {{$benhnhan->bacsi->tenbacsi}}  
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Khung Giờ:</strong> 
            {{$benhnhan->khunggio->khunggio}}  
        </div>
    </div>
</div>
</div>
</div>
@endsection