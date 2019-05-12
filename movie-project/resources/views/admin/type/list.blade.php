@extends('admin.layout')
@section('title')
Thể loại
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
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
@section('page-header')
<h1>
   Thể loại
    <small>Danh sách</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Thể loại</a></li>
    <li class="active">Danh sách</li>
  </ol>
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <div class="col-md-4">
                <h3 class="box-title">Danh sách thể loại</h3>
            </div>
            <div class="col-md-2 col-md-offset-6">
                <a href="{{ route('admin_type_create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm thể loại mới </a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Tên</th>
              <th>Viết tắt</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
           @foreach ($types as $item)
           <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->abbrev}}</td>
                <td><a class="btn btn-primary" href="/admin/type/edit/{{$item->id}}"><i class="fa fa-edit"> Edit</i></a> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$item->id}}">Delete</button></td>
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
                          <p>Bạn có chắc muốn xóa thể loại {{$item->name}}</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                          <a type="button" href="/admin/type/delete/{{$item->id}}" class="btn btn-outline">Delete</a>
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
                <th>Tên</th>
                <th>Viết tắt</th>
                <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
@endsection
