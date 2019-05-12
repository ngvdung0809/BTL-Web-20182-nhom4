@extends('admin.layout')
@section('title','Quản lý phim')
@section('css')
    <link href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <h1>
        Phim
        <small>Thêm</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_film_list') }}">Phim</a></li>
        <li class="active">Thêm</li>
    </ol>
@endsection
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="col-md-4">
            <h3 class="box-title">Thêm phim mới</h3>
        </div>
    </div>
    <form  method="post" action="{{ route('admin_film_store') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
            <div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                <label for="name">Tên phim *</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-edit"></i>
                    </div>
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Vui lòng nhập vào tên phim" value="{{ old('name') }}" required>
                </div>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->first('tag') ? 'has-error' : ''}}">
                <label for="tag">Từ khóa *</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-tags"></i>
                    </div>
                    <input id="tag" type="text" class="form-control{{ $errors->has('tag') ? ' is-invalid' : '' }}" name="tag" placeholder="Vui lòng nhập vào tag cho phim" value="{{ old('tag') }}" required>
                </div>

                @if ($errors->has('tag'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tag') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="image">Ảnh bìa của phim *</label>
                <div class="box-body">
                    <div class="col-md-4 col-md-offset-4">
                        <img class="img-responsive" src="{{ asset('/storage/' . 'film_default/image_film_default.jpg') }}" alt="" id="image_default">
                        <div align="center">
                            <input type="file" id="image" name="image" accept="image/*" required />
                        </div>

                        @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="trailer_link">Video trailer phim *</label>
                <div class="box-body">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe id="trailer_link_default" class="embed-responsive-item" src="{{ asset('/storage/' . 'film_default/trailer_film_default.mp4') }}" frameborder="0" allowfullscreen="">
                            </iframe>
                        </div>
                        <div align="center">
                            <input type="file" id="trailer_link" name="trailer_link" accept="video/*" required />
                        </div>

                        @if ($errors->has('trailer_link'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('trailer_link') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group {{ $errors->first('type_id') ? 'has-error' : ''}}">
                <label for="type_id" >Thể loại phim *</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-tasks"></i>
                    </div>
                    <select class="form-control {{ $errors->has('type_id') ? ' is-invalid' : '' }}" id="type_id" name="type_id[]" placeholder="Vui lòng Chọn thể loại phim" multiple required>
                        <option value=""></option>
                        @if (!(empty($typies)))
                            @foreach ($typies as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                @if ($errors->has('type_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('type_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->first('publisher_id') ? 'has-error' : ''}}">
                <label for="publisher_id" >Hãng sản xuất *</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-institution"></i>
                    </div>
                    <select class="form-control {{ $errors->has('publisher_id') ? ' is-invalid' : '' }}" id="publisher_id" name="publisher_id" value="{{ old('publisher_id') }}" placeholder="Vui lòng Chọn hãng sản xuất" required>
                        <option value=""></option>
                        @if (!(empty($publishers)))
                            @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                @if ($errors->has('publisher_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('publisher_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->first('director_id') ? 'has-error' : ''}}">
                <label for="director_id" >Đạo diễn *</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <select class="form-control {{ $errors->has('  director_id') ? ' is-invalid' : '' }}" id="director_id" name="director_id" value="{{ old('director_id') }}" placeholder="Vui lòng Chọn đạo diễn" required>
                        <option value=""></option>
                        @if (!(empty($directors)))
                            @foreach ($directors as $director)
                                <option value="{{ $director->id }}">{{ $director->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                @if ($errors->has('director_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('director_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->first('actor_id') ? 'has-error' : ''}}">
                <label for="actor_id" >Diễn viên *</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    <select class="actor_id form-control {{ $errors->has('actor_id') ? ' is-invalid' : '' }}" name="actor_id[]" placeholder="Vui lòng Chọn diễn viên" multiple required>
                        <option value=""></option>
                        @if (!(empty($actors)))
                            @foreach ($actors as $actor)
                                <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                @if ($errors->has('actor_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('actor_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->first('country_id') ? 'has-error' : ''}}">
                <label for="country_id" >Quốc gia *</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-globe"></i>
                    </div>
                    <select class="form-control {{ $errors->has('country_id') ? ' is-invalid' : '' }}" id="country_id" name="country_id" value="{{ old('country_id') }}" placeholder="Vui lòng Chọn quốc gia" required>
                        <option value=""></option>
                        @if (!(empty($countries)))
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                @if ($errors->has('country_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('country_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->first('released') ? 'has-error' : ''}}">
                <label for="released">Năm sản xuất *</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input id="released" type='text' class="form-control" name="released" value="{{ old('released') }}" placeholder="Vui lòng chọn năm sản xuất" required/>
                </div>

                @if ($errors->has('released'))
                    <span class="help-block">{{ $errors->first('released') }}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->first('content') ? 'has-error' : ''}}">
                <label for="content">Mô tả nội dung của phim *</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-edit"></i>
                    </div>
                    <textarea id="content" type="text" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content"  placeholder="Mô tả nội dụng của phim" value="{{ old('content') }}" rows="5" required></textarea>
                </div>

                @if ($errors->has('content'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->first('other_description') ? 'has-error' : ''}}">
                <label for="other_description">Mô tả khác</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-file-text-o"></i>
                    </div>
                    <textarea id="other_description" type="text" class="form-control{{ $errors->has('other_description') ? ' is-invalid' : '' }}" name="other_description"  placeholder="Mô tả khác" value="{{ old('other_description') }}" rows="5"></textarea>
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
                Thêm
            </button>
        </div>
    </form>
</div>
@endsection
@section('js')
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/admin/film/create.js') }}"></script>
@endsection
