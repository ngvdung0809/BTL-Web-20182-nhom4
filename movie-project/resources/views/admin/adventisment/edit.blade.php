@extends('admin.layout')
@section('title','Sửa thông tin của quảng cáo')
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Sửa thông tin của quảng cáo</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('admin_adventisment_list') }}" class="btn btn-block btn-info"><i class="fa fa-backward"></i>Danh sách quảng cáo</a>
            </div>
        </div>

        <div class="box-body">
            <form  method="post" action="{{ route('admin_adventisment_update', ['id' => $ads->id]) }}">
                @csrf
                <div class="box-body">
                <div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                        <label for="name">Name*</label>
                        <input id="name" type="text" class="form-control" placeholder="Vui lòng nhập vào tên quảng cáo" name="name" value="{{ $ads->name }}" required>
                        @if ($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('image') ? 'has-error' : ''}}">
                        <label for="image">Image*</label>
                        <input class="form-control" type="text" id="image" name="image" placeholder="Vui lòng nhập vào link ảnh quảng cáo" value="{{ $ads->image }}" required>
                        @if ($errors->has('image'))
                            <span class="help-block">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('link') ? 'has-error' : ''}}">
                        <label for="link">Link*</label>
                        <input id="link" type="text" class="form-control" placeholder="Vui lòng nhập vào link quảng cáo" name="link" value="{{ $ads->link }}" required>
                        @if ($errors->has('link'))
                            <span class="help-block">{{ $errors->first('link') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('active') ? 'has-error' : ''}}">
                        <label for="active">Active*</label>
                        <input id="active" type="text" class="form-control" placeholder="Vui lòng nhập vào trạng thái" name="active" value="{{ $ads->active }}" required>
                        @if ($errors->has('active'))
                            <span class="help-block">{{ $errors->first('active') }}</span>
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
