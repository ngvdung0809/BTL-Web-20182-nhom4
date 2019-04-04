@extends('admin.layout')
@section('title','Tạo nhà sản xuất mới')
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tạo NSX mới</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('admin_publisher_list') }}" class="btn btn-block btn-info"><i class="fa fa-backward"></i> Danh sách NSX</a>
            </div>
        </div>

        <div class="box-body">
            <form  method="post" action="{{ route('admin_publisher_store') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control" placeholder="Nhập tên nhà sản xuất" name="name" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('address') ? 'has-error' : ''}}">
                        <label for="address">Address</label>
                        <input class="form-control" type="text" id="address" name="address" placeholder="Nhập địa chỉ nhà sản xuất" value="{{ old('address') }}" required>
                        @if ($errors->has('address'))
                            <span class="help-block">{{ $errors->first('address') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('email') ? 'has-error' : ''}}">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Nhập địa chỉ email của nhà sản xuất" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('phone') ? 'has-error' : ''}}">
                        <label for="phone">Phone</label>
                        <input class="form-control" type="text" id="phone" name="phone" placeholder="Nhập số ĐT nhà sản xuất" value="{{ old('phone') }}" required>
                        @if ($errors->has('phone'))
                            <span class="help-block">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('logo') ? 'has-error' : ''}}">
                        <label for="logo">Logo</label>
                        <input class="form-control" type="text" id="logo" name="logo" placeholder="Logo nhà sản xuất" value="{{ old('logo') }}" required>
                        @if ($errors->has('logo'))
                            <span class="help-block">{{ $errors->first('logo') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('other_description') ? 'has-error' : ''}}">
                        <label for="other_description">Other Description</label>
                        <input class="form-control" type="text" id="other_description" name="other_description" placeholder="Mô tả khác" value="{{ old('other_description') }}">
                        @if ($errors->has('other_description'))
                            <span class="help-block">{{ $errors->first('other_description') }}</span>
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
