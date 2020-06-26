@extends('pages.layout.layouts')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Time</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('khunggio.index') }}"> Back</a>
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


{!! Form::model($khunggio, ['method' => 'PATCH','route' => ['khunggio.update', $khunggio->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong> Tên chuyên khoa</strong>
            {!! Form::text('khunggio', null, array('placeholder' => 'Khung giờ','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Address:</strong>
            <br/>
            <select name="id_benhvien" class="browser-default custom-select">
                @foreach($benhvien as $value)
                <option value="{{$value->id}}" >{{$value->tenbenhvien}}</option>  
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