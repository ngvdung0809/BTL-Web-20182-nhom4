@extends('admin.layout')
@section('title','Quản lý diễn viên')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('page-header')
    <h1>
        Diễn viên
        <small>Danh sách</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_actor_list') }}">Diễn viên</a></li>
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
                        <h3 class="box-title">Danh sách diễn viên</h3>
                    </div>
                    <div class="col-md-2 col-md-offset-6">
                        <a href="{{ route('admin_actor_create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm diễn viên mới </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="actor_list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Birth-day</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Image</th>
                                    <th>Hobby</th>
                                    <th>Forte</th>
                                    <th>Job</th>
                                    <th>Story</th>
                                    <th>View</th>
                                    <th>Description</th>     
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($persons as $person)
                                <tr>
                                    <td>{{ $person->id }}</td>
                                    <td>{{ $person->name }}</td>
                                    <td>{{ $person->gender }}</td>
                                    <td>{{ $person->birth_day }}</td>
                                    <td>{{ $person->email }}</td>
                                    <td>{{ $person->country_id }}</td>                                    
                                    <td><img class="actor-img img-responsive" src="{{ asset('/storage/' . $person->image)}}" alt="1" height="50" width="50"></td>
                                    <td>{{ $person->hobby }}</td>
                                    <td>{{ $person->forte }}</td>
                                    <td>{{ $person->job }}</td>
                                    <td>{{ $person->story }}</td>
                                    <td>{{ $person->view }}</td>
                                    <td>{{ $person->description }}</td>
                                    <td>
                                        <a href="{{ route('admin_actor_edit',$person->id )}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('admin_actor_delete',['id'=> $person->id ]) }}">
                                            @csrf
                                            <div class="modal fade" id="delete_person_{{ $person->id }}" role="dialog">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Bạn có muốn xóa diễn viên {{ $person->name }} không?</h4>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_person_{{ $person->id }}"><i class="fa fa-trash"></i></button>
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
    <script src="{{ asset('js/admin/actor/list.js') }}" ></script>
@endsection
