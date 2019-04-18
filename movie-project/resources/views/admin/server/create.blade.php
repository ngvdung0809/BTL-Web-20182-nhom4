@extends('admin.layout')
@section('title','Tạo link mới')
@section('css')
    <link href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <h1>
        Link phim
        <small>Thêm</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_server_list') }}">Link</a></li>
        <li class="active">Thêm</li>
    </ol>
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tạo link mới</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('admin_server_list') }}" class="btn btn-block btn-info"><i class="fa fa-backward"></i> Danh sách link</a>
            </div>
        </div>
    <form  method="post" action="{{ route('admin_server_store') }}" enctype="multipart/form-data">
        <div class="box-body">
            
                @csrf
                <div class="box-body">                    
                    <div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                        <label for="name">Server name*</label>
                        <input id="name" type="text" class="form-control" placeholder="Vui lòng nhập vào tên server" name="name" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                     <div class="form-group {{ $errors->first('episode_id') ? 'has-error' : ''}}">
                        <label for="episode_id">Episode-id*</label>
                        <br>
                        <select class="form-control" id="episode_id" name ="episode_id" required>
                            @foreach($getfilm_episodes as $getfilm_episode)
                            <option value="{{$getfilm_episode->id}}">{{$getfilm_episode->film_id}} - {{$getfilm_episode->episode}}</option>
                            @endforeach
                        </select>                        
                        @if ($errors->has('episode_id'))
                            <span class="help-block">{{ $errors->first('episode_id') }}</span>
                        @endif
                    </div>
                    

                    <div class="form-group {{ $errors->first('link') ? 'has-error' : ''}}">
                        <label for="link">Link*</label>
                        <input class="form-control" type="text" id="link" name="link" placeholder="Vui lòng nhập vào link" value="{{ old('link') }}" required>
                        @if ($errors->has('link'))
                            <span class="help-block">{{ $errors->first('link') }}</span>
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
