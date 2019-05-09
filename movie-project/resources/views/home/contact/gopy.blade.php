@extends('home.layout')
@section('title','Góp ý người dùng')
@section('content')
<div class="page-single">
    <div class="container">
        <div class="row ipad-width2">
	        <div class="form-style-1 user-pro">
                <form  method="get" action="{{ route('admin_user_store') }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">
                        <div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                            <label for="name">Họ tên *</label>
                            <div class="input-group">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Vui lòng nhập vào họ tên đầy đủ" value="{{ old('name') }}" required>
                            </div>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->first('email') ? 'has-error' : ''}}">
                            <label for="email">Địa chỉ email *</label>
                            <div class="input-group">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  placeholder="Vui lòng nhập vào email" value="{{ old('email') }}" required>
                            </div>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->first('role') ? 'has-error' : ''}}">
                            <label for="role">Chủ Đề</label>
                            <div class="input-group">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"   value="GÓP Ý" disabled>
                            </div>

                            @if ($errors->has('role'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group {{ $errors->first('other_description') ? 'has-error' : ''}}">
                            <label for="other_description">Nội Dung</label>
                            <div class="input-group">
                                <input id="other_description" type="text" class="form-control{{ $errors->has('other_description') ? ' is-invalid' : '' }}" name="other_description"  placeholder="Nội dung góp ý" value="{{ old('other_description') }}">
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
                            Gửi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
