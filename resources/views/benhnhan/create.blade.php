@extends('pages.layout.layouts')

@section('content')
<!-- BEGIN PAGE BASE CONTENT -->
<div class="page-content-wrapper">
<!-- BEGIN CONTENT BODY -->
<div class="page-content">
<div class="row">
        <div class="col-md-12">
            <div class="tabbable-line boxless tabbable-reversed">
                <ul class="nav nav-tabs">
                  <li>
                      <a href="#tab_1" data-toggle="tab"> 2 Columns </a>
                  </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_0">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Form Actions On Bottom </div>
                            </div>
                            <div class="portlet-body form">
                               <!-- BEGIN FORM-->
                               @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                </div>
                               @endif
                               @if($mess=Session::get('error'))
                                <div class="alert alert-danger">
                                <li>{{ $mess }}</li>
                                </div>
                                @endif
                               <form action="#" class="horizontal-form">
                                    <div class="form-body">
                                        <h3 class="form-section">Person Info</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Họ và tên</label>
                                                    <input  name = "hovaten" type="text" id="hovaten" class="form-control" placeholder="Nhập Họ và tên bệnh nhân...">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  class="control-label">Số điện thoại</label>
                                                    <input name="sodienthoai" type="text" id="sodienthoai" class="form-control" placeholder="Nhập Số điện thoại">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label  class="control-label">Email</label>
                                                    <input name="email" type="text" id="lastName" class="form-control" placeholder="Nhập Email">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Giới tính</label>
                                                    <select name = "gioitinh" class="form-control">
                                                        <option value="1">Male</option>
                                                        <option value="0">Female</option>
                                                    </select>
                                                    <span class="help-block"> Select your gender </span>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Ngày tháng năm sinh</label>
                                                    <input name = "ng" type="text" class="form-control" placeholder="dd/mm/yyyy"> </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                            <h3 class="form-section">Địa chỉ thường trú</h3>
                                                        <div class="row">
                                                            <div class="col-md-12 ">
                                                                <div class="form-group">
                                                                    <label>Địa chỉ </label>
                                                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ thường trú..."> </div>
                                                            </div>
                                                        </div>
                                                       
                                    <h3 class="form-section">Thông tin đặt lịch</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label class="control-label">Bệnh viện</label>
                                                    <select name = "gioitinh" class="form-control">
                                                        <option value="1">Male</option>
                                                        <option value="0">Female</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label class="control-label">Khung giờ</label>
                                                    <select name = "gioitinh" class="form-control">
                                                        <option value="1">Male</option>
                                                        <option value="0">Female</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label class="control-label">Bác sĩ</label>
                                                    <select name = "gioitinh" class="form-control">
                                                        <option value="1">Male</option>
                                                        <option value="0">Female</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label class="control-label">Chuyên khoa</label>
                                                    <select name = "gioitinh" class="form-control">
                                                        <option value="1">Male</option>
                                                        <option value="0">Female</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                        <button type="button" class="btn default">Cancel</button>
                                        <button type="submit" class="btn blue">
                                            <i class="fa fa-check"></i> Save</button>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->
</div>
</div>
   
@endsection
