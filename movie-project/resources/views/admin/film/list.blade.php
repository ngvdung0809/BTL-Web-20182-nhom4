@extends('admin.layout')
@section('title', 'Quản lý phim')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('page-header')
    <h1>
        Phim
        <small>Danh sách</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_film_list') }}">Phim</a></li>
        <li class="active">Danh sách</li>
    </ol>
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="col-md-4">
                        <h3 class="box-title">Danh sách Phim</h3>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                        <a href="{{ route('admin_film_create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm Phim mới </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="film_list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên phim</th>
                                    <th>Từ khóa</th>
                                    <th>Hãng sản xuất</th>
                                    <th>Đạo diễn</th>
                                    <th>Diễn viên</th>
                                    <th>Quốc gia</th>
                                    <th>Năm phát hành</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($films as $film)
                                <tr>
                                    <td>{{ $film->id }}</td>
                                    <td>
                                        <a target="_blank" href="{{ route('admin_film_view',['id' => $film->id] )}}">
                                            <img class="img-circle" src="{{ asset('/storage/' . $film->image) }}" alt="" height="70" width="70">{{ $film->name }}
                                        </a>
                                    </td>
                                    <td>{{ $film->tag }}</td>
                                    <td>{{ $film->publisher->name }}</td>
                                    <td>
                                        @if (!empty($film->director))
                                            {{ $film->director->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($film->actor as $actor)
                                            @if ($actor->job == 'actor')
                                                <span class="label label-primary">{{ $actor->name }}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $film->country->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($film->released)->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin_film_edit', ['id' => $film->id] )}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_film_{{ $film->id }}"><i class="fa fa-trash"></i></button>
                                        <form method="post" action="{{ route('admin_film_delete',['id'=> $film->id ]) }}">
                                            @csrf
                                            <div class="modal fade" id="delete_film_{{ $film->id }}" role="dialog">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Delete</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 class="modal-title">Bạn có chắc chắn muốn xóa phim {{ $film->name }} không?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset('js/admin/film/list.js') }}"></script>
@endsection
