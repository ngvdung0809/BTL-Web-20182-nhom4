@extends('home.layout')
@section('title','Góp ý người dùng')
@section('content')
<div class="page-single">
    <div class="container">
        <div class="row ipad-width2">
	        <div class="form-style-1 user-pro">
                <form  method="post" action="{{ route('home_baoloi_store') }}" enctype="multipart/form-data">
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

                        <div class="form-group {{ $errors->first('subject') ? 'has-error' : ''}}">
                            <label for="subject">Chủ Đề</label>
                            <div class="input-group">
                                <input id="subject" type="text" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" placeholder="Nhập chủ đề" value="{{ old('subject') }}">
                            </div>

                            @if ($errors->has('subject'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="form-group {{ $errors->first('message') ? 'has-error' : ''}}">
                            <label for="message">Nội Dung</label>
                            <div class="input-group">
                                <input id="message" type="text" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message"  placeholder="Nhập nội dung góp ý" value="{{ old('message') }}">
                            </div>

                            @if ($errors->has('message'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('message') }}</strong>
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
