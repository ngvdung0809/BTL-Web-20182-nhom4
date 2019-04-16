@extends('admin.layout')
@section('title', 'Tìm kiếm bình luận')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('page-header')
    <h1>
        Bình luận
        <small>Tìm kiếm</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_comment_list') }}">Bình luận</a></li>
        <li class="active">Tìm kiếm</li>
    </ol>
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="col-md-4">
                        <h3 class="box-title">Tìm kiếm cho <em style="color: #3178ea;">{{ $content }}</em></h3>
                    </div>
                </div>
                <div class="box-body">
                    <form action="{{ route('admin_comment_search') }}" >
                    <div class="row" style="padding-left: 10px;">
                        <button type="submit" class="btn btn-primary" style="height: 40px;"><i class="fa fa-search"></i>
                            Search</button>
                        <input name="content" id="content" type="text" placeholder="Nội dung tìm kiếm" 
                            style="width: 400px; padding: 8px 12px;  border-radius: 4px;" required>
                        <select name="type" id="typeSelect" style="width: 150px;border-radius: 4px; background-color: #d0d5e0; padding: 8px 12px;" onchange="changeText(this);">
                                    <option value="film"><b>Phim</b></option>
                                    <option value="user"><b>Người dùng</b></option>
                        </select>
                    </div>
                    </form>
                </div><hr>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="film_list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên phim</th>
                                    <th>User</th>
                                    <th>Bình luận</th>
                                    <th>Thời gian tạo</th>
                                    <th>Thời gian chỉnh sửa</th>
                                    <th> </th>
                                </tr>
                            </thead>   
                            @if(empty($comments))
                            <div class="alert alert-warning" style="text-align: center;">
                                <strong>Không tìm thấy kết quả!</strong>
                            </div>                                     
                            @else
                            <tbody>
                            @foreach($comments as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>
                                    <a target="_blank" href="{{ route('admin_film_view',['id' => $c->film_id] )}}">
                                            <img class="img-circle" src="{{ asset('/storage/' . $c->film->image) }}" alt="Film" height="70" width="70">{{ $c->film->name }}
                                    </a>
                                </td>
                                <td>
                                    <a target="_blank" href="{{ route('admin_user_view',['id' => $c->user_id] )}}">
                                            <img class="img-circle" src="{{ asset('/storage/' . $c->user->image) }}" alt="User" height="70" width="70">{{ $c->user->name }}
                                    </a>
                                </td>
                                <td><b>{{ $c->comment }}</b></td>
                                <td>{{ \Carbon\Carbon::parse($c->created_at)->format('d/m/Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($c->updated_at)->format('d/m/Y') }}</td>
                                <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_comment_{{ $c->id }}"><i class="fa fa-trash"></i> Delete</button>
                                        <form method="post" action="{{ route('admin_comment_delete',['id'=> $c->id ]) }}">
                                            @csrf
                                            <div class="modal fade" id="delete_comment_{{ $c->id }}" role="dialog">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Delete</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 class="modal-title">Xoá bình luận này?</h4>
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
                            @endif
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

