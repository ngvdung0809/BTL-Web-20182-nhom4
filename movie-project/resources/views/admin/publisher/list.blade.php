@extends('admin.layout')
@section('title','Quản lý nhà xuất bản')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('page-header')
    <h1>
        Nhà sản xuất
        <small><b>Danh sách</b></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin_index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_publisher_list') }}">NSX</a></li>
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
                        <h3 class="box-title">Danh sách nhà sản xuất</h3>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                        <a href="{{ route('admin_publisher_create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="publisher" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>                                   
                                    <th>Other</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($publishers as $p)
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>
                                        <img class="img-circle" src="{{ asset('/storage/' . $p->logo) }}" 
                                        alt="{{ $p->name . ' logo' }}" height="70" width="70">
                                    </td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->address }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->phone }}</td>                                   
                                    <td>{{ $p->other_description }}</td>
                                    <td>
                                        <a href="{{ route('admin_publisher_edit', $p->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('admin_publisher_delete',['id'=> $p->id ]) }}">
                                            @csrf
                                            <div class="modal fade" id="delete_publisher_{{ $p->id }}" role="dialog">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Bạn có muốn xóa nhà xuất bản {{ $p->name }} không?</h4>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_publisher_{{ $p->id }}"><i class="fa fa-trash"></i></button>
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
    <script src="{{ asset('js/admin/publisher/list.js') }}" ></script>
@endsection
