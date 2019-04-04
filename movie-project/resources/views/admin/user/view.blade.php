@extends('admin.layout')
@section('title','User Management')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('page-header')
    <h1>
        Người dùng
        <small>Thông tin người dùng {{ $user->username }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin_user_list') }}">Người dùng</a></li>
        <li class="active">{{ $user->username }}</li>
        <li class="active">Thông tin</li>
    </ol>
@endsection
@section('content')
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <div class="col-md-4">
                <h3 class="box-title">User Infomation</h3>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="{{ asset('/storage/' . $user->image) }}" alt="User profile picture">
                            <h3 class="profile-username text-center">{{ $user->username }}</h3>
                            <p class="text-muted text-center">{{ $user->name }}</p>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <h3 class="text-muted">
                                About Me
                            </h3>
                            <div class="col-md-10 col-md-offset-1">
                                <strong>
                                    <i class="fa fa-user text-info"></i>
                                     Name
                                </strong>
                                <p class="text-muted">
                                    {{ $user->name }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-genderless text-info"></i>
                                    Gender
                                </strong>
                                <p class="text-muted">
                                    {{ $user->gender }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-birthday-cake"></i>
                                    Date of birth
                                </strong>
                                <p class="text-muted">
                                    {{ $user->birth_day }}
                                </p>
                                <hr>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-body">
                            <h3 class="box-title">
                                Contact Me
                            </h3>
                            <div class="col-md-10 col-md-offset-1">
                                <strong>
                                    <i class="fa fa-fw fa-phone text-info"></i>
                                     Phone
                                </strong>
                                <p class="text-muted">
                                    {{ $user->phone }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-pencil margin-r-5 text-info"></i>
                                     Email
                                </strong>
                                <p class="text-muted">
                                    {{ $user->email }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fa fa-map-marker margin-r-5 text-info"></i>
                                     Country
                                </strong>
                                <p class="text-muted">
                                    {{ $user->country->name }}
                                </p>
                                <hr>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-body">
                            <h3 class="box-title">
                                Other
                            </h3>
                            <div class="col-md-10 col-md-offset-1">
                                <strong>
                                    <i class="fa fa-file-text-o margin-r-5 text-info"></i> Other Description
                                </strong>
                                <p class="text-muted">
                                    {{ $user->other_description }}
                                </p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Activity</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
