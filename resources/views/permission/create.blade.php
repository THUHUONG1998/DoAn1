@extends('pages.layout.layouts')
@section('content')
<div class="page-content-wrapper">
 <div class="page-content">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Permission Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('users.index')}}">Permission</a> </li>
              <li class="breadcrumb-item active">Create Permission Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
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
              <form role="form" action="{{route('permission.store')}}" method="post">
                @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleName">Tên Permissions</label>
                    <input type="text" class="form-control" id="name" placeholder="Permissions" name="name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="exampleName">Guard_name</label>
                    <input type="text" class="form-control" id="guard_name" placeholder="guard_name" name="guard_name" value="web" readonly>
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
</div>
</div>
@endsection
