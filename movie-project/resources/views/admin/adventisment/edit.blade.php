@extends('admin.layout')
@section('title','Sửa thông tin của quảng cáo')
@section('page-header')
    <h1>
        Quảng Cáo
        <small><b>Danh sách</b></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin_index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_adventisment_list') }}">Quảng Cáo</a></li>
        <li class="active">Sửa QC</li>
    </ol>
@endsection
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
                    <div class="form-group">
                        <label for="logo">Image*</label>
                        <div class="box-body">
                            <div class="col-md-4 col-md-offset-4">
                                <img class="profile-user-img img-responsive img-circle" src="{{ asset('/storage/' . $ads->image) }}" alt="Image" id="image_default">
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

                    <div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                        <label for="name">Name*</label>
                        <input id="name" type="text" class="form-control" placeholder="Vui lòng nhập vào tên quảng cáo" name="name" value="{{ $ads->name }}" required>
                        @if ($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
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
@section('js')
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/admin/adventisment/create.js') }}"></script>
@endsection
