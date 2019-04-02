@extends('admin.layout')
@section('title','Quản lý quốc gia')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('page-header')
    <h1>
        Quốc Gia
        <small>Danh sách</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_country_list') }}">Quốc Gia</a></li>
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
                        <h3 class="box-title">Danh sách quốc gia</h3>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                        <a href="{{ route('admin_country_create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm quốc gia mới </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="country" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Abbrev</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($countries as $country)
                                <tr>
                                    <td>{{ $country->id }}</td>
                                    <td>{{ $country->name }}</td>
                                    <td>{{ $country->abbrev }}</td>
                                    <td>
                                        <a href="{{ route('admin_country_edit',$country->id )}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('admin_country_delete',['id'=> $country->id ]) }}">
                                            @csrf
                                            <div class="modal modal-danger fade" id="delete_country_{{ $country->id }}" role="dialog">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h class="modal-title">Delete</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 class="modal-title">Bạn có muốn xóa quốc gia {{ $country->name }} không?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                                                        <button type="submit" class="btn btn-default">Xóa</button>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_country_{{ $country->id }}"><i class="fa fa-trash"></i></button>
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
    <script src="{{ asset('js/admin/country/list.js') }}" ></script>
@endsection
