@extends('admin/layout')
@section('title')
Phản hồi
@endsection
@section('page-header')
<h1>
    Phản hồi
     <small>Chi tiết</small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li><a href="#">Phản hồi</a></li>
     <li class="active">Chi tiết</li>
   </ol>
@endsection
@section('content')
        <div class="box box-info ">
            <div class="box-header with-border">
                <div class="col-md-4">
                    <h3 class="box-title">Chi tiết phản hồi</h3>
                </div>
                <div class="box-tools pull-right">
                    <a href="{{ route('admin_contact_list') }}" class="btn btn-block btn-info"><i class="fa fa-backward"></i> Danh sách phản hồi</a>
                </div>
            </div>
            <div class="form-horizontal" >

                <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Người gửi:</label>
                    <div class="col-sm-10">
                            <p>{{$contact->name}}</p>
                     </div>
                </div>
                <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-10">
                            <p>{{$contact->email}}</p>
                      </div>
                </div>
                <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Ngày:</label>
                      <div class="col-sm-10">
                            <p>{{$contact->created_at}}</p>
                        </div>
                </div>
                <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Subject:</label>
                      <div class="col-sm-10">
                            <p>{{$contact->subject}}</p>
                        </div>
                  </div>
                  <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Message:</label>
                      <div class="col-sm-10">
                          <p>{{$contact->message}}</p>
                        </div>
                  </div>
                </div>
                <div class="box-footer">
                 <button type="submit" class="btn btn-danger pull-right" data-toggle="modal" data-target="#modal-danger{{$contact->id}}">Delete</button>
                  </div>
                </div>
        </div>
        <div class="modal modal-danger fade" id="modal-danger{{$contact->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Delete</h4>
                    </div>
                    <div class="modal-body">
                      <p>Bạn có chắc muốn xóa phản hồi từ {{$contact->name}}</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                      <a type="button" href="{{ route('admin_contact_delete',$contact->id )}}" class="btn btn-outline">Delete</a>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
        </div>
@endsection
