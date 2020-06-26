
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
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Simple Table</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                            <th>STT</th>
                                            <th>Tên Bác Sĩ</th>
                                            <th>Học Vị</th>
                                            <th>Tên Chuyên Khoa</th>
                                            <th>Tên Bệnh Viện</th>
                                            <th width="280px">Action</th>
                                                </tr>
                                                @foreach ($bacsi as $key => $value)
                                                  <tr>
                                                  <td>{{ ++$i }}</td>
                                                  <td>{{ $value->tenbacsi }}</td>
                                                  <td>{{ $value->hocvi }}</td>
                                                  <td>{{$value->benhvien->tenbenhvien}}</td>
                                                  <td>{{$value->chuyenkhoa->tenchuyenkhoa}}</td>
                                                  <td>
                                                      <a class="btn btn-info" href="{{ route('bacsi.show',$value->id) }}">Show</a>
                                                  
                                                      <a class="btn btn-primary" href="{{ route('bacsi.edit',$value->id) }}">Edit</a>
                                                    
                                                      <button class="btn btn-danger" data-userid= {{$value->id}} data-toggle="modal" data-target="#myModal{{ $i}}">Delete</button>
                                                    
                                                  </td>
                                                  </tr>
                                                  <div class="modal modal-danger fade" id="myModal{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                                          <h4 class="modal-title text-center" id="myModalLabel">Thông báo</h4>
                                                        </div>
                                                        <form action="{{route('benhvien.destroy', $value->id)}}" method="post">
                                                            {{method_field('delete')}}
                                                            {{csrf_field()}}
                                                          <div class="modal-body">
                                                          <p class="text-center">
                                                            Bạn có chắc chắn muốn xóa bệnh viện <b> {{ $value->tenbenhvien }} </b> không?
                                                          </p>
                                                              <input type="hidden" name = "id_benhvien" id="benhvien_id" value="">

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
            <!-- END CONTENT -->
           

        <!-- END CONTAINER -->
@endsection