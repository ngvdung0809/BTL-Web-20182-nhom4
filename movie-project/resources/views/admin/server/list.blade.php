@extends('admin.layout')
@section('title','Quản lý link')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('page-header')
    <h1>
        Link phim
        <small>Danh sách</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_server_list') }}">Link phim</a></li>
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
                        <h3 class="box-title">Danh sách link</h3>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                        <a href="{{ route('admin_server_create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm link mới </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="server_list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Server name</th>
                                    <th>Episode-id</th>
                                    <th>Link</th>                                         
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($servers as $server)
                                <tr>
                                    <td>{{ $server->id }}</td>
                                    <td>{{ $server->name }}</td>
                                    <td>{{ $server->episode_id }}</td>
                                    <td>{{ $server->link }}</td>
                                    
                                    <td>
                                        <a href="{{ route('admin_server_edit',$server->id )}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('admin_server_delete',['id'=> $server->id ]) }}">
                                            @csrf
                                            <div class="modal fade" id="delete_server_{{ $server->id }}" role="dialog">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Bạn có muốn xóa link {{ $server->link }} không?</h4>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_server_{{ $server->id }}"><i class="fa fa-trash"></i></button>
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
    <script src="{{ asset('js/admin/server/list.js') }}" ></script>
@endsection
