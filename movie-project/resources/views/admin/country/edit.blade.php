@extends('admin.layout')
@section('title','Sửa thông tin của quốc gia')
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Sửa thông tin của quốc gia</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('admin_country_list') }}" class="btn btn-block btn-info"><i class="fa fa-backward"></i>Danh sách quốc gia</a>
            </div>
        </div>

        <div class="box-body">
            <form  method="post" action="{{ route('admin_country_update', ['id' => $country->id]) }}">
                @csrf
                <div class="box-body">
                    <div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                        <label for="name">Name*</label>
                        <input id="name" type="text" class="form-control" placeholder="Vui lòng nhập vào tên quốc gia" name="name" value="{{ $country->name }}" required>
                        @if ($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('abbrev') ? 'has-error' : ''}}">
                        <label for="abbrev">Abbrev*</label>
                        <input class="form-control" type="text" id="abbrev" name="abbrev" placeholder="Vui lòng nhập vào tên viết tắt của quốc gia" value="{{ $country->abbrev }}" required>
                        @if ($errors->has('abbrev'))
                            <span class="help-block">{{ $errors->first('abbrev') }}</span>
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
