@extends('admin/layout')
@section('title')
Tập phim
@endsection
@section('page-header')
<h1>
    Tập phim
     <small>Thêm</small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
     <li><a href="{{ route('admin_film_view', ['id' => $film_id] )}}"></i>{{$filmName}}</a></li>
     <li><a href="#">Tập phim</a></li>
     <li class="active">Thêm</li>
   </ol>
@endsection
@section('content')
        <div class="box box-info ">
            <div class="box-header with-border">
                <h3 class="box-title">Thêm tập phim</h3>
            </div>
            <form class="form-horizontal" action="/admin/episode/{{$film_id}}/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Số tập phim*</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="episode" id="episode" required min="1">
                     </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Ảnh tập phim*</label>
                    <div class="col-sm-10">
                        <div class="col-md-6 col-md-offset-3">
                            <img class="img-responsive" src="{{ asset('/storage/' . 'film_default/image_film_default.jpg') }}" alt="" id="image_default" style="max-height: 400px; max-width: 400px;">
                            <input type="file" id="image" name="image" accept="image/*" required />
                        </div>
                      </div>
                </div>
                <div class="form-group">
                    <label for="trailer_link" class="col-sm-2 control-label">Video tập phim *</label>
                    <div class="col-sm-10">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe id="trailer_link_default" class="embed-responsive-item" src="{{ asset('/storage/' . 'film_default/trailer_film_default.mp4') }}" frameborder="0" allowfullscreen>
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
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Mô tả tập phim*</label>
                  <div class="col-sm-10">
                      <textarea cols="20" class="form-control" name="content" required></textarea>
                    </div>
              </div>
                </div>
                <div class="box-footer">
                <a href="{{route('admin_film_view',['id' => $film_id])}}" type="submit" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Thêm</button>
                  </div>
                </form>
        </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/film/create.js') }}"></script>
@endsection
