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


{!! Form::model($bacsi, ['method' => 'PATCH','route' => ['bacsi.update', $bacsi->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong> Hospital Name:</strong>
            {!! Form::text('tenbacsi', null, array('placeholder' => 'Doctor Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Học vị:</strong>
            <br/>
            {!! Form::text('hocvi', null, array('placeholder' => 'Học vị','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong> Hospital Name:</strong>
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
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


@endsection