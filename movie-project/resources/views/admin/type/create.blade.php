@extends('admin/layout')
@section('title')
Thể loại
@endsection
@section('page-header')
<h1>
    Thể loại
     <small>Thêm</small>
   </h1>
   <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
     <li><a href="#">Thể loại</a></li>
     <li class="active">Thêm</li>
   </ol>
@endsection
@section('content')
        <div class="box box-info ">
            <div class="box-header with-border">
                <h3 class="box-title">Thêm thể loại</h3>
            </div>
            <form class="form-horizontal" action="/admin/type/create" method="POST">
                @csrf
                <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tên thể loại</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Tên thể loại" name="name">
                     </div>
                </div>
                <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Tên viết tắt</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="Tên viết tắt" name="abbrev">
                      </div>
                </div>
                </div>
                <div class="box-footer">
                <a href="/admin/type/list" type="submit" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Thêm</button>
                  </div>
                </form>
        </div>
@endsection
