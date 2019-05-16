@extends('admin.layout')
@section('title','Sửa thông tin của đạo diễn')
@section('css')
    <link href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <h1>
        Đạo diễn
        <small>Sửa</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_director_list') }}">Đạo diễn</a></li>
        <li class="active">Sửa</li>
    </ol>
@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Sửa thông tin của đạo diễn</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('admin_director_list') }}" class="btn btn-block btn-info"><i class="fa fa-backward"></i>Danh sách đạo diễn</a>
            </div>
        </div>
    <form method="post" action="{{ route('admin_director_update', ['id' => $person->id]) }}" enctype="multipart/form-data">
        <div class="box-body">
            <form  method="post" action="{{ route('admin_director_update', ['id' => $person->id]) }}">
                @csrf
                <div class="box-body">
                    <div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                        <label for="name">Name*</label>
                        <input id="name" type="text" class="form-control" placeholder="Vui lòng nhập vào tên đạo diễn" name="name" value="{{ $person->name }}" required>
                        @if ($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('gender') ? 'has-error' : ''}}">
                        <label for="gender">Gender</label>
                        <input class="form-control" type="text" id="gender" name="gender" placeholder="Vui lòng nhập vào giới tính" value="{{ $person->gender }}" >
                        @if ($errors->has('gender'))
                            <span class="help-block">{{ $errors->first('gender') }}</span>
                        @endif
                    </div>

                   <div class="form-group {{ $errors->first('birth_day') ? 'has-error' : ''}}">
                        <label for="birth_day">Birth day</label>
                        @if ( is_null($person->birth_day))
                             <input class="form-control" type="date" id="birth_day" name="birth_day" placeholder="Vui lòng nhập vào ngày sinh" value="" min="1990-01-01" max="2020-12-31" >
                            @if ($errors->has('birth_day'))
                                <span class="help-block">{{ $errors->first('birth_day') }}</span>
                            @endif
                        @else
                           <input class="form-control" type="date" id="birth_day" name="birth_day" placeholder="Vui lòng nhập vào ngày sinh" value="{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $person->birth_day)->format('Y-m-d') }}" min="1990-01-01" max="2020-12-31" >
                            @if ($errors->has('birth_day'))
                                <span class="help-block">{{ $errors->first('birth_day') }}</span>
                            @endif
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('email') ? 'has-error' : ''}}">
                        <label for="email">Email*</label>
                        <input class="form-control" type="text" id="email" name="email" placeholder="Vui lòng nhập vào email" value="{{ $person->email }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('country_id') ? 'has-error' : ''}}">
                        <label for="country_id">Country-id*</label>
                        <br>
                        <select class="form-control" id="country_id" name ="country_id" required>
                            @foreach($getcountries as $getcountry)
                            <option value="{{$getcountry->id}}">{{$getcountry->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('country_id'))
                            <span class="help-block">{{ $errors->first('country_id') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="image">Image*</label>
                        <div class="box-body">
                            <div class="col-md-4 col-md-offset-4">
                                <div align="center">
                                    <img class="director-img img-responsive" src="{{ asset('/storage/' . $person->image)}}" alt="1" height="50" width="50" id="image_default">
                                </div>
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

                    <div class="form-group {{ $errors->first('hobby') ? 'has-error' : ''}}">
                        <label for="hobby">Hobby</label>
                        <input class="form-control" type="text" id="hobby" name="hobby" placeholder="Vui lòng nhập vào sở thích" value="{{ $person->hobby }}" >
                        @if ($errors->has('hobby'))
                            <span class="help-block">{{ $errors->first('hobby') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('forte') ? 'has-error' : ''}}">
                        <label for="forte">Forte</label>
                        <input class="form-control" type="text" id="forte" name="forte" placeholder="Vui lòng nhập vào sở trường" value="{{ $person->forte }}" >
                        @if ($errors->has('forte'))
                            <span class="help-block">{{ $errors->first('forte') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('story') ? 'has-error' : ''}}">
                        <label for="story">Story</label>
                        <input class="form-control" type="text" id="story" name="story" placeholder="Vui lòng nhập vào tiểu sử" value="{{ $person->story }}" >
                        @if ($errors->has('story'))
                            <span class="help-block">{{ $errors->first('story') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->first('description') ? 'has-error' : ''}}">
                        <label for="description">Description</label>
                        <input class="form-control" type="text" id="description" name="description" placeholder="Vui lòng nhập vào mô tả" value="{{ $person->description }}" >
                        @if ($errors->has('description'))
                            <span class="help-block">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>

        </div>
    </form>
    </div>
@endsection
