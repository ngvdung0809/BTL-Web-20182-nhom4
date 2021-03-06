@extends('admin.layout')
@section('title','Quản lý phim')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('page-header')
    <h1>
        Phim
        <small>Thông tin phim {{ $film->name }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_film_list') }}">Phim</a></li>
        <li class="active">{{ $film->name }}</li>
        <li class="active">Thông tin</li>
    </ol>
@endsection
@section('content')
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <div class="col-md-4">
                <h3 class="box-title">Thông tin phim {{ $film->name }}</h3>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="img-responsive" src="{{ asset('/storage/' . $film->image) }}" alt="">
                            <h3 class="profile-username text-center">{{ $film->name }}</h3>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Đánh giá phim</b>
                                    <a class="pull-right">
                                        @for ($i = 0; $i < 10; $i++)
                                            @if ($rate - $i >= 1)
                                                <i class="fa fa-star"></i>
                                            @elseif (($rate - $i > 0.5) &&  ($rate - $i < 1))
                                                <i class="fa fa-star-half-o"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                        @endfor
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Like</b> <a class="pull-right">{{ $liked }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>View</b> <a class="pull-right">{{ $view }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Share</b> <a class="pull-right">{{ $share }}</a>
                                </li>
                            </ul>
                            <div class="list-group-item">
                                <span><a target="_blank" href="{{ asset('/storage/' . $film->trailer_link) }}" class="btn btn-primary">Trailer</a></span>
                                <span class="pull-right"><a href="#" class="btn btn-danger">Xem phim</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <h3 class="text-muted">
                                Thông tin phim
                            </h3>
                            <div class="col-md-10 col-md-offset-1">
                                <strong>
                                    <i class="fa fa-edit text-info"></i>
                                    Tên phim
                                </strong>
                                <p class="text-muted">
                                    {{ $film->name }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-edit text-info"></i>
                                    Thể loại phim
                                </strong>
                                <p class="text-muted">
                                    @foreach ($film->type as $type)
                                        {{ $type->name }}
                                    @endforeach
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-calendar text-info"></i>
                                    Năm xuất bản
                                </strong>
                                <p class="text-muted">
                                    {{ \Carbon\Carbon::parse($film->released)->format('d/m/Y') }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-institution text-info"></i>
                                    Nhà xuất bản
                                </strong>
                                <p class="text-muted">
                                    @if (!empty($film->publisher))
                                        {{ $film->publisher->name }}
                                    @endif
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-globe text-info"></i>
                                   Quốc gia
                                </strong>
                                <p class="text-muted">
                                    @if (!empty($film->country))
                                        {{ $film->country->name }}
                                    @endif
                                </p>
                                <hr>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-body">
                            <h3 class="box-title">
                                Other
                            </h3>
                            <div class="col-md-10 col-md-offset-1">
                                <strong>
                                    <i class="fa fa-file-text-o margin-r-5 text-info"></i> Other Description
                                </strong>
                                <p class="text-muted">
                                    {{ $film->other_description }}
                                </p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#other" data-toggle="tab" aria-expanded="true">Thông tin thêm</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="other">
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <i class="fa fa-user text-info"></i>
                                        <h3 class="box-title"> Diễn viên </h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                @for ($i = 0; $i < count($film->actor) ; $i++)
                                                    @if ($i == 0)
                                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                                    @else
                                                        <li data-target="#carousel-example-generic" data-slide-to="{{ $i }}" class=""></li>
                                                    @endif
                                                @endfor
                                            </ol>
                                            <div class="carousel-inner">
                                                @for ($i = 0; $i < count($film->actor) ; $i++)
                                                    @if ($i == 0)
                                                        <div class="item active">
                                                            <img src="{{ asset('/storage/' . $film->actor[0]->image) }}" alt="Actor slide">
                                                            <div class="carousel-caption">
                                                                {{ $film->actor[0]->name }}
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="item">
                                                            <img src="{{ asset('/storage/' . $film->actor[$i]->image) }}" alt="Actor slide">
                                                            <div class="carousel-caption">
                                                                {{ $film->actor[$i]->name }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endfor
                                            </div>
                                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                                <span class="fa fa-angle-left"></span>
                                            </a>
                                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                                <span class="fa fa-angle-right"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <i class="fa fa-edit text-info"></i>
                                        <h3 class="box-title"> Trạng thái của phim</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        @if ($film->status == Config::get('constants.FILM_STATUS.COMPLETED'))
                                            <p class="text-muted">Hoàn thành</p>
                                        @elseif ($film->status == Config::get('constants.FILM_STATUS.TRAILER'))
                                            <p class="text-muted">Chưa phát hành</p>
                                        @else
                                            <p class="text-muted">{{ $film->status }}</p>
                                        @endif
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <i class="fa fa-clock-o text-info"></i>
                                        <h3 class="box-title"> Thời lượng phim</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <p class="text-muted">{{ $film->time }}</p>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <i class="fa fa-edit text-info"></i>
                                        <h3 class="box-title"> Loại phim</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        @if ($film->series_film == Config::get('constants.FILM.SERIES_FILM'))
                                            <p class="text-muted">Phim bộ</p>
                                        @endif
                                        @if ($film->retail_film == Config::get('constants.FILM.RETAIL_FILM'))
                                            <p class="text-muted">Phim lẻ</p>
                                        @endif
                                         @if ($film->demo_film == Config::get('constants.FILM.DEMO_FILM'))
                                            <p class="text-muted">Phim thuyết minh</p>
                                        @endif
                                        @if ($film->theaters_film == Config::get('constants.FILM.THEATERS_FILM'))
                                            <p class="text-muted">Phim chiếu rạp</p>
                                        @endif
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <i class="fa fa-edit text-info"></i>
                                        <h3 class="box-title"> Nội dung phim</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <p class="text-muted">{{ $film->content }}</p>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <i class="fa fa-tags text-info"></i>
                                        <h3 class="box-title"> Từ khóa</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <p class="text-muted">{{ $film->tag }}</p>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                        <div class="col-md-4">
                            <h3 class="box-title">Danh sách tập phim</h3>
                        </div>
                        <div class="col-md-2 col-md-offset-6">
                            <a href="{{ route('admin_film_episode_create', ['id' => $film->id] )}}" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm tập phim </a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tập</th>
                          <th>Ảnh</th>
                          <th>Nội dung</th>
                          <th>Sửa</th>
                          <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach ( $film->film_episode as $item)
                       <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->episode}}</td>
                            <td> <img src="{{ asset('/storage/' . $item->image) }}" alt="" height="70" width="70"></td>
                            <td>{{$item->content}}</td>
                            <td>
                                <a href="{{ route('admin_film_episode_edit', ['id' => $item->id] )}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            </td>
                            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{ $item->id }}"><i class="fa fa-trash"></i></button></td>
                        </tr>
                        <div class="modal modal-danger fade" id="modal-danger{{$item->id}}">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                      <p>Bạn có chắc muốn xóa tập phim {{$item->episode}}</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                      <a type="button" href="{{ route('admin_film_episode_delete', ['id' => $item->id] )}}" class="btn btn-outline">Delete</a>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                       @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tập</th>
                            <th>Ảnh</th>
                            <th>Nội dung</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.col -->
              </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
</script>
@endsection
