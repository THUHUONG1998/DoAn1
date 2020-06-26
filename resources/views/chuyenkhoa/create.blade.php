@extends('pages.layout.layouts')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create User Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('users.index')}}">User</a> </li>
              <li class="breadcrumb-item active">Create User Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif
<!-- goi session bao loi -->
@if($mess=Session::get('error'))
<div class="alert alert-danger">
<li>{{ $mess }}</li>
</div>
@endif

    <section class="content">
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('chuyenkhoa.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                 <div class="form-group">
                    <label for="exampleName">Chuyên khoa</label>
                    <input type="text" class="form-control" id="tenchuyenkhoa" placeholder="Tên chuyên khoa" name="tenchuyenkhoa" value="{{old('tenchuyenkhoa')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Bệnh viện</label>
                    <select name="id_benhvien" class="browser-default custom-select">
                      @foreach($benhvien as $value)
                        <option value="{{$value->id}}" >{{$value->tenbenhvien}}</option>  
                      @endforeach
                    </select>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
         
        </div>
      </div>
    </section>

@endsection
