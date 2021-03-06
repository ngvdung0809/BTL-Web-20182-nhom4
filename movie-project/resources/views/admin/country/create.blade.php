@extends('admin.layout')
@section('title','Tạo quốc gia mới')
@section('page-header')
    <h1>
        Quốc Gia
        <small>Thêm</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_country_list') }}">Quốc Gia</a></li>
        <li class="active">Thêm</li>
    </ol>
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tạo quốc gia mới</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('admin_country_list') }}" class="btn btn-block btn-info"><i class="fa fa-backward"></i> Danh sách quốc gia</a>
            </div>
        </div>

        <div class="box-body">
            <form  method="post" action="{{ route('admin_country_store') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                        <label for="name">Name*</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            <input id="name" type="text" class="form-control" placeholder="Vui lòng nhập vào tên quốc gia" name="name" value="{{ old('name') }}" required>
                        </div>
                        @if ($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('abbrev') ? 'has-error' : ''}}">
                        <label for="abbrev">Abbrev*</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-compress"></i>
                            </div>
                            <input class="form-control" type="text" id="abbrev" name="abbrev" placeholder="Vui lòng nhập vào tên viết tắt của quốc gia" value="{{ old('abbrev') }}" required>
                        </div>
                        @if ($errors->has('abbrev'))
                            <span class="help-block">{{ $errors->first('abbrev') }}</span>
                        @endif
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Tạo</button>
                </div>
            </form>
        </div>
    </div>
@endsection
