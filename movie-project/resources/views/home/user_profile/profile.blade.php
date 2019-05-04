@extends('home.layout')
@section('title', 'User Profile')
@section('css')
    <link href="{{ asset('home/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
@endsection
@section('search')
@endsection
@section('content')
    @include('home.user_profile.header', ['pageHeader'=>$user->name, 'pageNow'=>'Profile'])
    <div class="page-single">
        <div class="container">
            <div class="row ipad-width">
                @include('home.user_profile.side_bar', ['path'=>'/storage/'.$user->image])
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="form-style-1 user-pro">
                        <form class="user" method="post" action="{{ route('home_user_profile_update_profile', ['id'=>$user->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <h4 style="text-align: center">Chi tiết hồ sơ</h4>
                            <div class="row">
                                <div class="col-md-12 form-it {{ $errors->first('username') ? 'has-error' : ''}}">
                                    <label>Ảnh đại diện *</label><br>
                                    <div class="col-md-4 col-md-offset-4">
                                        <img  src="{{ asset('/storage/' . $user->image) }}" alt="" id="image_default" style="border-radius: 50%;">
                                        <input type="file" class="form-it" id="image" name="image" accept="image/*" />

                                        @if ($errors->has('image'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-it {{ $errors->first('username') ? 'has-error' : ''}}">
                                    <label>Tên hiển thị *</label>
                                    <input id="username" type="text" class="form-it {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" placeholder="Vui lòng nhập vòng tên hiển thị" value="{{ $user->username }}" required>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-it {{ $errors->first('name') ? 'has-error' : ''}}">
                                    <label>Họ tên *</label>
                                    <input id="name" type="text" class="form-it {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Vui lòng nhập vào họ tên đầy đủ" value="{{ $user->name }}" required>

                                     @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-it {{ $errors->first('gender') ? 'has-error' : ''}}">
                                    <label>Giới tính *</label>
                                    <select id="gender" type="text" class="form-it{{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" placeholder="Vui lòng chọn giới tính" required>
                                        <option value="" {{ $user->gender == 'null' ? 'selected' : '' }}></option>
                                        <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Nam</option>
                                        <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Nữ</option>
                                        <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>Khác</option>
                                    </select>

                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-it {{ $errors->first('birth_day') ? 'has-error' : ''}}">
                                    <label>Ngày sinh *</label>
                                    <input id="birth_day" type='text' class="form-it" name="birth_day" value="{{ $user->birth_day }}" placeholder="Vui lòng chọn ngày sinh" required/>

                                     @if ($errors->has('birth_day'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('birth_day') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-it {{ $errors->first('email') ? 'has-error' : ''}}">
                                    <label>Email *</label>
                                    <input id="email" type="email" class="form-it{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  placeholder="Vui lòng nhập vào email" value="{{ $user->email }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-it {{ $errors->first('phone') ? 'has-error' : ''}}">
                                    <label>Số điện thoại *</label>
                                    <input id="phone" type="text" class="form-it{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"  placeholder="Vui lòng nhập vào số điện thoại" value="{{ $user->phone }}" required>

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-it {{ $errors->first('country_id') ? 'has-error' : ''}}">
                                    <label>Quốc gia *</label>
                                    <select class="form-it {{ $errors->has('country_id') ? ' is-invalid' : '' }}" id="country_id" name="country_id" data-value="{{ $user->country_id }}" placeholder="Vui lòng Chọn quốc gia" required>
                                        <option value=""></option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('country_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('country_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6 form-it {{ $errors->first('role') ? 'has-error' : ''}}">
                                    <label>Vai trò *</label>
                                    <select id="role" type="text" class="form-it{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" placeholder="Vui lòng chọn quyền hạn cho người dùng">
                                        <option value="0" {{ $user->role == '0' ? 'selected' : '' }}>No Role</option>
                                        <option value="1" {{ $user->role == '1' ? 'selected' : '' }}>Admin</option>
                                    </select>

                                    @if ($errors->has('role'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-it {{ $errors->first('other_description') ? 'has-error' : ''}}">
                                    <label>Mô tả khác</label>
                                    <input id="other_description" type="text" class="form-it{{ $errors->has('other_description') ? ' is-invalid' : '' }}" name="other_description"  placeholder="Mô tả khác" value="{{ $user->other_description }}">

                                    @if ($errors->has('other_description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('other_description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <input class="submit" type="submit" value="Update">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('home/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('home/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('home/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/home/user_profile/profile.js') }}"></script>
@endsection
