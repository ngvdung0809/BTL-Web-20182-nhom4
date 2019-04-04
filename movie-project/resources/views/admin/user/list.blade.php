@extends('admin.layout')
@section('title', 'Quản lý người dùng')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('page-header')
    <h1>
        Người dùng
        <small>Danh sách</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_user_list') }}">Người dùng</a></li>
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
                        <h3 class="box-title">Danh sách người dùng</h3>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                        <a href="{{ route('admin_user_create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm người dùng mới </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="user_list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên hiển thị</th>
                                    <th>Họ tên</th>
                                    <th>Giới tính</th>
                                    <th>Ngày sinh</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Quốc gia</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <a target="_blank" href="{{ route('admin_user_view',['id' => $user->id] )}}">
                                            <img class="img-circle" src="{{ asset('/storage/' . $user->image) }}" alt="Avatar" height="70" width="70">{{ $user->username }}
                                        </a>
                                    </td>
                                    <td><a target="_blank" href="{{ route('admin_user_view',['id' => $user->id] )}}">{{ $user->name }}</a></td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->birth_day }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->country->name }}</td>
                                    <td>
                                        <a href="{{ route('admin_user_edit', ['id' => $user->id] )}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_user_{{ $user->id }}"><i class="fa fa-trash"></i></button>
                                        <form method="post" action="{{ route('admin_user_delete',['id'=> $user->id ]) }}">
                                            @csrf
                                            <div class="modal fade" id="delete_user_{{ $user->id }}" role="dialog">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Delete</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 class="modal-title">Bạn có chắc chắn muốn xóa tài khoản {{ $user->name }} không?</h4>
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
    <script src="{{ asset('js/admin/user/list.js') }}"></script>
@endsection
