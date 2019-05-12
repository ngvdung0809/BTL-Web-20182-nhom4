@extends('admin.layout')
@section('title','Sửa thông tin nhà sản xuất')
@section('css')
    <link href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <h1>
        Nhà sản xuất
        <small>Sửa</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin_index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_publisher_list') }}">NSX</a></li>
        <li class="active">Sửa</li>
    </ol>
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Sửa thông tin NSX</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('admin_publisher_list') }}" class="btn btn-block btn-info"><i class="fa fa-backward"></i>Danh sách NSX</a>
            </div>
        </div>

        <div class="box-body">
            <form  method="post" action="{{ route('admin_publisher_update', ['id' => $p->id]) }}" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="logo">Logo</label>
                <div class="box-body">
                    <div class="col-md-4 col-md-offset-4">
                        <img class="profile-user-img img-responsive img-circle" src="{{ asset('/storage/' . $p->logo) }}" alt="Logo" id="logo_default">
                        <div align="center">
                            <input type="file" id="logo" name="logo" accept="image/*" />
                        </div>

                        @if ($errors->has('logo'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('logo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
                <div class="box-body">
                    <div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                        <label for="name">Name</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </div>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Nhập tên nhà sản xuất" value="{{ $p->name }}" required>
                        </div>

                        @if ($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('address') ? 'has-error' : ''}}">
                        <label for="address">Address</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-address-book"></i>
                            </div>
                            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Nhập địa chỉ nhà sản xuất" value="{{ $p->address }}" required>
                        </div>
                       
                        @if ($errors->has('address'))
                            <span class="help-block">{{ $errors->first('address') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('email') ? 'has-error' : ''}}">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Nhập email nhà sản xuất" value="{{ $p->email }}" required>
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('phone') ? 'has-error' : ''}}">
                        <label for="phone">Phone</label>
                       <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Nhập số điện thoại nhà sản xuất" value="{{ $p->phone }}" required>
                        </div>
                        @if ($errors->has('phone'))
                            <span class="help-block">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('other_description') ? 'has-error' : ''}}">
                        <label for="other_description">Other Description</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-coffee"></i>
                            </div>
                            <input id="other_description" type="text" class="form-control{{ $errors->has('other_description') ? ' is-invalid' : '' }}" name="other_description" placeholder="Mô tả khác" value="{{ $p->other_description }}" required>
                        </div>
                        @if ($errors->has('other_description'))
                            <span class="help-block">{{ $errors->first('other_description') }}</span>
                        @endif
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/admin/publisher/create.js') }}"></script>
@endsection
