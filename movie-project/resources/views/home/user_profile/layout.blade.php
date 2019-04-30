@extends('home.layout')
@section('title', 'User Profile')
@section('css')
    @yield('css')
@endsection
@section('search')
    @yield('search')
@endsection
@section('content')
    <div class="hero user-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1>@yield('content_header')</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="#">Home</a></li>
                            <li> <span class="ion-ios-arrow-right"></span>@yield('content_now')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single">
    <div class="container">
        <div class="row ipad-width">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="user-information">
                    <div class="user-img">
                        @yield('avatar')
                        <a href="#" class="redbtn">Thay đổi</a>
                    </div>
                    <div class="user-fav">
                        <p>Chi tiết tài khoản</p>
                        <ul>
                            <li class="active"><a href="">Hồ sơ người dùng</a></li>
                            <li><a href="">Phim xem sau</a></li>
                            <li><a href="">Phim đã thích</a></li>
                            <li><a href="">Phim đã đánh giá</a></li>
                            <li><a href="">Lịch sử xem phim</a></li>
                        </ul>
                    </div>
                    <div class="user-fav">
                        <p>Khác</p>
                        <ul>
                            <li><a href="#">Thay đổi mật khẩu</a></li>
                            <li><a href="#">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <!-- BEGIN | Content -->
                @yield('content')
                <!-- END | Content -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    @yield('js')
@endsection
