@extends('pages.layout.layouts')
@section('content')
<!-- BEGIN CONTAINER -->

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
                    <div class="col-sm-3">
                    <div class="pull-right">
                    <form class="search-form" action="page_general_search_2.html" method="GET">
                            <div class="input-group">
                            <input type="text" class="form-control input-sm" placeholder="Search..." name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                            </div>
                    </form>
                    </div>
                    </div>
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
                                        <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
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
                                                <th>Email</th>
                                                <th>Roles</th>
                                                <th width="280px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($data as $key => $user)
                                                <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td><img src="{{$user->avatar}}" width="50px" class="img-circle"></td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                  @if(!empty($user->getRoleNames()))
                                                    @foreach($user->getRoleNames() as $v)
                                                      <label class="badge badge-success">{{ $v }}</label>
                                                    @endforeach
                                                  @endif
                                                </td>
                                                <td>
                                                    <!-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a> -->
                                                
                                                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                                  
                                                    <button class="btn btn-danger" data-userid= {{$user->id}} data-toggle="modal" data-target="#myModal{{ $i}}">Delete</button>
                                                  
                                                  
                                                    <!-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!} -->
                                                </td>
                                                </tr>
                                                <div class="modal modal-danger fade" id="myModal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                                      <h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
                                                    </div>
                                                    <form action="{{route('users.destroy', $user->id)}}" method="post">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                      <div class="modal-body">
                                                      <p class="text-center">
                                                        Bạn có chắc chắn muốn xóa tài khoản <b> {{ $user->username }} </b> không?
                                                      </p>
                                                          <input type="hidden" id="user_id" value="">

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
                        </div>
                    </div>
                  
                        
                            <!-- END SAMPLE TABLE PORTLET-->
                        </div>
                        
                    
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
           
           

       
        {!! $data->links() !!}
@endsection