@extends('admin.layout')
@section('title', 'Quản lý người dùng')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('page-header')
    <h1>
        Đánh giá
        <small>Danh sách</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_user_film_list') }}">Đánh giá</a></li>
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
                        <h3 class="box-title">Danh sách Đánh giá</h3>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="rate_list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Id người dùng</th>
                                    <th>Họ tên người dùng</th>
                                    <th>Id film</th>
                                    <th>Tên phim</th>
                                    <th>Điểm đánh giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($films as $film)
                                    @foreach($film->user as $user)
                                    <tr>
                                        <td>{{ $user->pivot->id }}</td>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $film->id }}</td>
                                        <td>{{ $film->name }}</td>
                                        <td>{{ $user->pivot->point }}</td>
                                    </tr>
                                    @endforeach
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
    <script src="{{ asset('js/admin/user_film/list.js') }}"></script>
@endsection
