@extends('layouts.adminLayout.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Cài đặt</a> </div>
            <h1>admin cài đặt</h1>
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                                <h5>Cập nhật mật </h5>
                            </div>
                            @if(\Illuminate\Support\Facades\Session::has('flash_message_error'))
                                <div class="alert alert-danger" role="alert">
                                    {!! Session('flash_message_error') !!}
                                </div>
                            @endif
                            @if(\Illuminate\Support\Facades\Session::has('flash_message_success'))
                                <div class="alert alert-success" role="alert">
                                    {!! Session('flash_message_success') !!}
                                </div>
                            @endif
                            <div class="widget-content nopadding">
                                <form class="form-horizontal" method="post" action="{{route('admin.postUpdatePassword')}}" name="password_validate" id="password_validate" novalidate="novalidate">
                                    @csrf
                                    <div class="control-group">
                                        <label class="control-label">Mật khẩu hiện tại</label>
                                        <div class="controls">
                                            <input type="password" name="current_pwd" id="current_pwd" />
                                            <span id="chkPwd"></span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Mật khẩu mới</label>
                                        <div class="controls">
                                            <input type="password" name="new_pwd" id="new_pwd" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Nhập lại mật khẩu mới</label>
                                        <div class="controls">
                                            <input type="password" name="confirm_pwd" id="confirm_pwd" />
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" value="update password" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection