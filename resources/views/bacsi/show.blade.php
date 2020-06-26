@extends('pages.layout.layouts')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Doctor</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('bacsi.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Họ Và Tên:</strong>
            {{ $bacsi->tenbacsi }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Học Vị: </strong>
            {{$bacsi->hocvi}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tên Bệnh Viện</strong> 
            {{$bacsi->benhvien->tenbenhvien}}  
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tên Chuyên Khoa</strong> 
            {{$bacsi->chuyenkhoa->tenchuyenkhoa}}  
        </div>
    </div>
</div>
@endsection