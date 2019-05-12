@extends('admin/layout')
@section('title')
Tập phim
@endsection
@section('page-header')
<h1>
    Tập phim
     <small>Sửa</small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
     <li><a href="{{ route('admin_film_view', ['id' => $filmEpisode->film->id] )}}"></i>{{$filmEpisode->film->name}}</a></li>
     <li><a href="#">Tập phim</a></li>
     <li class="active">Sửa</li>
   </ol>
@endsection
@section('content')
        <div class="box box-info ">
            <div class="box-header with-border">
                <h3 class="box-title">Sửa tập phim</h3>
            </div>
            <form class="form-horizontal" action="/admin/episode/update/{{$filmEpisode->id}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Số tập phim*</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="episode" id="episode" required value="{{$filmEpisode->episode}}">
                     </div>
                </div>
                <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Ảnh tập phim*</label>
                    <div class="col-sm-10">
                        <img class="img-responsive" src="{{ asset('/storage/' . $filmEpisode->image) }}" alt="">
                        <input type="file" id="image" name="image" accept="image/*"  />
                      </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Mô tả tập phim*</label>
                  <div class="col-sm-10">
                      <textarea cols="20" class="form-control" name="content" required >{{$filmEpisode->content}}</textarea>
                    </div>
              </div>
                </div>
                <div class="box-footer">
                <a href="{{route('admin_film_view',['id' => $filmEpisode->film->id])}}" type="submit" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Sửa</button>
                  </div>
                </form>
        </div>
@endsection
@section('js')
    <script src="{{ asset('js/admin/film/create.js') }}"></script>
@endsection
