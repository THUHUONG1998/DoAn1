
@extends('pages.layout.layouts')


@section('content')

<section class="content-header">
      <div class="container-fluid">


            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Users Datatables
                                <small>users datatable samples</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                       
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <a href="#">Tables</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Users Tables</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Simple Table</span>
                                    </div>
                                    <div class="col-sm-10">
                                    <div class="pull-right">
                                        <a class="btn btn-success" href="{{ route('permission.create') }}"> Create New Permission</a>
                                    </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Avatar</th>
                                                <th width="280px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($permission as $key => $value)
                                            <tr>
                                              <td>{{ ++$i }}</td>
                                              <td>{{ $value->name }}</td>
                                              <td>{{ $value->guard_name }}</td>
                                              <td>
                                                  <a class="btn btn-primary" href="{{ route('permission.edit',$value->id) }}">Edit</a>
                                                  
                                                  <button class="btn btn-danger" data-permissionid = {{$value->id}} data-toggle="modal" data-target="#deletePermission">Delete</button>
                                              </td>
                                            </tr>
                                                <div class="modal modal-danger fade" id="myModal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                                      <h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
                                                    </div>
                                                    <form action="{{route('permission.destroy', $value->id)}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                      <div class="modal-body">
                                                      <p class="text-center">
                                                        Bạn có chắc chắn muốn xóa tài khoản <b> {{ $value->username }} </b> không?
                                                      </p>
                                                          <input type="hidden" id="permission_id" value="">

                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger" data-target="myModal{{ $i }}" >Xóa ngay</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                                @endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
               

{!! $permission->links() !!}


@endsection