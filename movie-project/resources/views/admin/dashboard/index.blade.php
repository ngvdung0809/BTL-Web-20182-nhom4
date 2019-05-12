@extends('admin.layout')
@section('page-header')
<h1>
    Dashboard
    <small>Admin</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
@endsection
@section('content')
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>{{$numberFilm}}</h3>

                <p>Phim</p>
              </div>
              <div class="icon">
                <i class="fa fa-film"></i>
              </div>
              <a href="{{ route('admin_film_list') }}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
      <!-- /.col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$numberComment}}</h3>

            <p>Bình luận</p>
          </div>
          <div class="icon">
            <i class="fa fa-comment"></i>
          </div>
          <a href="{{ route('admin_comment_list') }}" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{$numberContact}}</h3>

            <p>Phản hồi</p>
          </div>
          <div class="icon">
            <i class="fa fa-paper-plane"></i>
          </div>
          <a href="{{ route('admin_contact_list') }}" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{$numberUser}}</h3>

            <p>Người dùng</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="{{ route('admin_user_list') }}" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->



    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <div class="col-md-8">
        <!-- MAP & BOX PANE -->

        <!-- /.box -->
        <div class="row">
          <div class="col-md-6">
            <!-- DIRECT CHAT -->
            <div class="box box-warning direct-chat direct-chat-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Bình luận mới</h3>

                <div class="box-tools pull-right">
                  <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow"></span>
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                          data-widget="chat-pane-toggle">
                    <i class="fa fa-comments"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                    @foreach ($newComment as $key=> $item)
                       @if($key%2==0)
                       <div class="direct-chat-msg">
                            <div class="direct-chat-info clearfix">
                              <span class="direct-chat-name pull-left">{{$item->user->username}}</span>
                              <span class="direct-chat-timestamp pull-right">{{$item->film->name}}</span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="{{ asset('/storage/' . $item->user->image) }}" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                              {{$item->comment}}
                            </div>
                            <!-- /.direct-chat-text -->
                          </div>
                       @else
                       <div class="direct-chat-msg right">
                            <div class="direct-chat-info clearfix">
                              <span class="direct-chat-name pull-right">{{$item->user->username}}</span>
                              <span class="direct-chat-timestamp pull-left">{{$item->film->name}}</span>
                            </div>
                            <!-- /.direct-chat-info -->
                            <img class="direct-chat-img" src="{{ asset('/storage/' . $item->user->image) }}" alt="message user image">
                            <!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                {{$item->comment}}
                            </div>
                            <!-- /.direct-chat-text -->
                          </div>
                       @endif
                    @endforeach
                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts">
                  <ul class="contacts-list">
                      @foreach ($oldComment as $item)
                      <li>
                            <a href="#">
                              <img class="contacts-list-img" src="{{ asset('/storage/' . $item->user->image) }}" alt="User Image">
                              {{$item->user->username}}
                              <div class="contacts-list-info">
                                    <span class="contacts-list-name">
                                      <small class="contacts-list-date pull-right">{{$item->film->name}}</small>
                                    </span>
                                    <br>
                                <span class="contacts-list-msg"> {{$item->comment}}</span>
                              </div>
                              <!-- /.contacts-list-info -->
                            </a>
                          </li>
                      @endforeach

                    <!-- End Contact Item -->

                  </ul>
                  <!-- /.contatcts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.box-body -->

              <!-- /.box-footer-->
            </div>
            <!--/.direct-chat -->
          </div>
          <!-- /.col -->

          <div class="col-md-6">
            <!-- USERS LIST -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Thành viên mới</h3>

                <div class="box-tools pull-right">
                  <span class="label label-danger"></span>
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <ul class="users-list clearfix">
                    @foreach ($newUser as $item)
                    <li>
                        <img src="{{ asset('/storage/' . $item->image) }}" alt="User Image" style="border-radius:50%;" >
                        <a class="users-list-name" href="#">{{$item->username}}</a>
                        </li>
                    @endforeach

                </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <a href="{{ route('admin_user_list') }}" class="uppercase">View All Users</a>
              </div>
              <!-- /.box-footer -->
            </div>
            <!--/.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Phim mới</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table no-margin">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Created at</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($newFilm as $item)
                    <tr>
                        <td><a href="{{ route('admin_film_view',['id'=>$item->id]) }}">{{$item->id}}</a></td>
                        <td>{{$item->name}}</td>
                        <td><img src="{{ asset('/storage/' . $item->image) }}" alt="User Image" style="border-radius:50%;width:50px;height:50px;" ></td>
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</div>
                        </td>
                          </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix">

            <a href="{{route('admin_film_list')}}" class="btn btn-sm btn-info btn-flat pull-right">View All</a>
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->

      <div class="col-md-4">
        <!-- Info Boxes Style 2 -->
        <div class="info-box bg-yellow">
          <span class="info-box-icon"><i class="fas fa-user-edit"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Đạo diễn</span>
            <span class="info-box-number">{{$numberDirector}}</span>

            <div class="progress">
              <div class="progress-bar" style="width: 90%"></div>
            </div>
            <span class="progress-description">

                </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box bg-green">
          <span class="info-box-icon"><i class="fa fa-user"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Diễn viên</span>
            <span class="info-box-number">{{$numberActor}}</span>

            <div class="progress">
              <div class="progress-bar" style="width: 90%"></div>
            </div>
            <span class="progress-description">

                </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box bg-red">
          <span class="info-box-icon"><i class="fas fa-sign"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Thể loại</span>
            <span class="info-box-number">{{$numberType}}</span>

            <div class="progress">
              <div class="progress-bar" style="width: 90%"></div>
            </div>
            <span class="progress-description">

                </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box bg-aqua">
          <span class="info-box-icon"><i class="fas fa-user-secret"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Nhà sản xuất</span>
            <span class="info-box-number">{{$numberPublisher}}</span>

            <div class="progress">
              <div class="progress-bar" style="width: 90%"></div>
            </div>
            <span class="progress-description">

                </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Phản hồi mới</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div class="chart-responsive">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-md-4 control-label">Người gửi:</label>
                                <div class="col-md-8">
                                    <p>{{$contact->name}}</p>
                                </div>
                                </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-md-4 control-label">Email:</label>
                                <div class="col-md-8">
                                    <p>{{$contact->email}}</p>
                                </div>
                                </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Ngày: </label>
                                    <div class="col-sm-10">
                                        <p>{{$contact->created_at}}</p>
                                    </div>
                                </div>

                            <div class="form-group">
                                    <label for="inputPassword3" class="col-md-4 control-label">Subject: </label>
                                    <div class="col-md-8">
                                        <p>  {{$contact->subject}}</p>
                                    </div>
                                  </div>
                            <div class="form-group">
                                    <label for="inputPassword3" class="col-md-4 control-label">Message:</label>
                                    <div class="col-md-8">
                                          <p> {{$contact->message}}</p>
                                    </div>
                                  </div>
                </div>
                <!-- ./chart-responsive -->
              </div>
              <!-- /.col -->

              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer no-padding">

          </div>
          <!-- /.footer -->
        </div>
        <!-- /.box -->

        <!-- PRODUCT LIST -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Link phim mới</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <ul class="products-list product-list-in-box">
                @foreach ($newServer as $item)
                <li class="item">
                        <div class="product-img">
                          <img src="{{ asset('/storage/' . $item->episode->image) }}" alt="Product Image">
                        </div>
                        <div class="product-info">
                          <a href="#" class="product-title">Tập {{$item->film_episode->episode}}

                          <span class="product-description">
                                {{$item->film_episode->film->name}}
                              </span>
                        </div>
                      </li>
                @endforeach

            </ul>
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-center">
            <a href="" class="uppercase">View All</a>
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('admin/bower_components/jvectormap/jquery-jvectormap.css')}}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
@endsection
