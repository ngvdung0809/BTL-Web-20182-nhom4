@extends('admin.layout')
@section('title','User Management')
@section('css')
    <link href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <h1>
        Người dùng
        <small>Sửa</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_user_list') }}">Người dùng</a></li>
        <li class="active">Sửa</li>
    </ol>
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="col-md-4">
            <h3 class="box-title">Sửa thông tin người dùng</h3>
        </div>
        <div class="col-md-2 col-md-offset-6">
            <a href="{{ route('admin_user_list') }}" class="btn btn-block btn-info">
                <i class="fa fa-backward"></i>Danh sách người dùng
            </a>
        </div>
    </div>
    <form  method="post" action="{{ route('admin_user_update', ['id'=>$user->id]) }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
            <div class="form-group">
                <label for="image">Ảnh đại diện</label>
                <div class="box-body">
                    <div class="col-md-4 col-md-offset-4">
                        <img class="profile-user-img img-responsive img-circle" src="{{ asset('/storage/' . $user->image) }}" alt="" id="image_default">
                        <div align="center">
                            <input type="file" id="image" name="image" accept="image/*" />
                        </div>

                        @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group {{ $errors->first('username') ? 'has-error' : ''}}">
                <label for="username">Tên hiển thị*</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" placeholder="Vui lòng nhập vòng tên hiển thị" value="{{ $user->username }}" required>
                </div>

                @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                <label for="name">Họ tên *</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-edit"></i>
                    </div>
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Vui lòng nhập vào họ tên đầy đủ" value="{{ $user->name }}" required>
                </div>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->first('gender') ? 'has-error' : ''}}">
                <label for="gender">Giới tính *</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa  fa-venus-mars"></i>
                    </div>
                    <select id="gender" type="text" class="form-control{{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" placeholder="Vui lòng chọn giới tính" required>
                        <option value="" {{ $user->gender == 'null' ? 'selected' : '' }}></option>
                        <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Nam</option>
                        <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Nữ</option>
                        <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Khác</option>
                    </select>
                </div>

                @if ($errors->has('gender'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->first('birth_day') ? 'has-error' : ''}}">
                <label for="birth_day">Ngày Sinh*</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input id="birth_day" type='text' class="form-control" name="birth_day" value="{{ $user->birth_day }}" placeholder="Vui lòng chọn ngày sinh" required/>
                </div>

                @if ($errors->has('birth_day'))
                    <span class="help-block">{{ $errors->first('birth_day') }}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->first('phone') ? 'has-error' : ''}}">
                <label for="phone">Số điện thoại *</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"  placeholder="Vui lòng nhập vào số điện thoại" value="{{ $user->phone }}" required>
                </div>

                @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->first('email') ? 'has-error' : ''}}">
                <label for="email">Địa chỉ email *</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  placeholder="Vui lòng nhập vào email" value="{{ $user->email }}" required>
                </div>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->first('country_id') ? 'has-error' : ''}}">
                <label for="country_id" >Quốc gia *</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa  fa-globe"></i>
                    </div>
                    <select class="form-control {{ $errors->has('country_id') ? ' is-invalid' : '' }}" id="country_id" name="country_id" data-value="{{ $user->country_id }}" placeholder="Vui lòng Chọn quốc gia" required>
                        <option value=""></option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>

                @if ($errors->has('country_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('country_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->first('role') ? 'has-error' : ''}}">
                <label for="role">Quyền hạn</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa  fa-expeditedssl"></i>
                    </div>
                    <select id="role" type="text" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" placeholder="Vui lòng chọn quyền hạn cho người dùng">
                        <option value="0" {{ $user->role == '0' ? 'selected' : '' }}>No Role</option>
                        <option value="1" {{ $user->role == '1' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                @if ($errors->has('role'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->first('other_description') ? 'has-error' : ''}}">
                <label for="other_description">Mô tả khác</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-file-text-o"></i>
                    </div>
                    <input id="other_description" type="text" class="form-control{{ $errors->has('other_description') ? ' is-invalid' : '' }}" name="other_description"  placeholder="Mô tả khác" value="{{ $user->other_description }}">
                </div>

                @if ($errors->has('other_description'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('other_description') }}</strong>
                    </span>
                @endif
            </div>

        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">
                Sửa
            </button>
        </div>
    </form>
</div>
@endsection
@section('js')
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/admin/user/edit.js') }}"></script>
@endsection
