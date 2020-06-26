@extends('pages.layout.layouts')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show SMS</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('benhvien.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Số Điện Thoại:</strong>
            {{ $sms->bennhnhan->sodienthoai }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nội Dung</strong>
            {{$sms->noidung}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Số Điện Thoại:</strong>
            {{ $sms->bennhnhan->tenbenhnhan}}
        </div>
    </div>
</div>
@endsection