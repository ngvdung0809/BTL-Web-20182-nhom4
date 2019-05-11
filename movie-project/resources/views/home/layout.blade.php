<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">


<head>
	<!-- Basic need -->
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="profile" href="#">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
    <link rel="stylesheet" href="{{ asset('admin\bower_components\Ionicons\css\ionicons.css') }}">


	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="{{ asset('home/css/plugins.css') }}">
	<link rel="stylesheet" href="{{ asset('home/css/style.css') }}">

    <!-- The toast component is like an alert box that is only shown for a couple of seconds when something happens -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/toastr/toastr.min.css') }}">
    @yield('css')

</head>
<body>
<!--preloading-->
<div id="preloader">
    <a href="#"><img class="logo" src="{{ asset('home/images/logo.png') }}" alt="" style="width: 400px; height: 200px"></a>
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>

<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Login</h3>
        <form method="post" action="#">
        	<div class="row">
        		 <label for="username">
                    Username:
                    <input type="text" name="username" id="username" placeholder="username" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
        	</div>
           
            <div class="row">
            	<label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
            <div class="row">
            	<div class="remember">
					<div>
						<input type="checkbox" name="remember" value="Remember me"><span>Remember me</span>
					</div>
            		<a href="#">Quên mật khẩu ?</a>
            	</div>
            </div>
           <div class="row">
           	 <button type="submit">Đăng nhập</button>
           </div>
        </form>
    </div>
</div>

<!--end of preloading-->

<!-- BEGIN | Header -->
<header class="ht-header">
	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
				    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
					    <div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
				    </div>
				    <a href="#"><img class="logo" src="{{ asset('home/images/logo.png') }}" alt="" style="width: 100px; height: 50"></a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1">Trang chủ</a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							Thể loại<i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">
                            @foreach ($typeHome as $key=>$type)
                                @if ($key % 5 == 0)
                                    <li>
                                        <ul class="nav navbar-nav">
                                @endif
                                            <li><a href="#">{{ $type->name }}</a></li>
                                @if ($key % 5 == 4)
                                        </ul>
                                    </li>
                                @endif
                            @endforeach

                                @if (count($typeHome) % 5 != 0)
                                        </ul>
                                    </li>
                                @endif
							</ul>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							Quốc gia <i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">
                            @foreach ($countryHome as $key=>$country)
                                @if ($key % 5 == 0)
                                    <li>
                                        <ul class="nav navbar-nav">
                                @endif
                                            <li><a href="#">{{ $country->name }}</a></li>
                                @if ($key % 5 == 4)
                                        </ul>
                                    </li>
                                @endif
                            @endforeach

                                @if (count($countryHome) % 5 != 0)
                                        </ul>
                                    </li>
                                @endif
							</ul>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1">Phim lẻ</a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1">Phim bộ</a>
						</li>
                        <li class="dropdown first">
                            <a class="btn btn-default dropdown-toggle lv1">Phim thuyết minh</a>
                        </li>
                        <li class="dropdown first">
                            <a class="btn btn-default dropdown-toggle lv1">Phim chiếu rạp</a>
                        </li>
					</ul>
					<ul class="nav navbar-nav flex-child-menu menu-right">
						<li class="btn loginLink"><a href="#">Đăng nhập</a></li>
						<li class="btn signin"><a href="{{route('home_user_signin')}}">Đăng kí</a></li>
					</ul>
				</div>
			<!-- /.navbar-collapse -->
	    </nav>
        <!-- top search form -->
        @yield('search')
	</div>
</header>
<!-- END | Header -->

<!-- BEGIN | Content -->
@yield('content')
<!-- END | Content -->

<!-- footer section-->
<footer class="ht-footer">
	<div class="container">
		<div class="flex-parent-ft">
			<div class="flex-child-ft item1">
				<a href="#"><img class="logo" src="{{ asset('home/images/logo.png') }}" alt=""></a>
			</div>
			<div class="flex-child-ft item2">
				<h4>BESTFILM</h4>
				<ul>
					<li><a href="{{ route('home_about') }}">Giới thiệu</a></li>
					<li><a href="https://www.facebook.com/">Facebook BF</a></li>
					<li><a href="https://www.youtube.com/">Youtube Channel</a></li>
				</ul>
			</div>
			<div class="flex-child-ft item3">
				<h4>ĐÓNG GÓP</h4>
				<ul>
					<li><a data-toggle="modal" href="#ContributorModal" >Thành viên</a>
						<div class="modal" id="ContributorModal">
						    <div class="modal-dialog">
						      <div class="modal-content">
						      
						        <!-- Modal Header -->
						        <div class="modal-header">
						          <h1 class="modal-title" style="color: red; text-align: center;">NHÓM 4</h1>
						          <button type="button" class="close" data-dismiss="modal">×</button>
						        </div>
						        
						        <!-- Modal body -->
						        <div class="modal-body">
						          <h3>Đoàn Văn Phú</h3>
						          <p><i class="icon ion-person"></i> MSSV: </p>
						          <p><i class="icon ion-android-create"></i> Công việc:</p>
						          <br>
						          <h3>Nguyễn Văn Huy</h3>
						          <p><i class="icon ion-person"></i> MSSV: </p>
						          <p><i class="icon ion-android-create"></i> Công việc:</p>
						          <br>
						          <h3>Nguyễn Việt Dũng</h3>
						          <p><i class="icon ion-person"></i> MSSV: </p>
						          <p><i class="icon ion-android-create"></i> Công việc:</p>
						          <br>
						          <h3>Lê Khắc Toàn</h3>
						          <p><i class="icon ion-person"></i> MSSV: </p>
						          <p><i class="icon ion-android-create"></i> Công việc:</p>
						          <br>
						          <h3>Lý Bảo Long</h3>
						          <p><i class="icon ion-person"></i> MSSV: 20166381</p>
						          <p><i class="icon ion-android-create"></i> Công việc:</p>
						          <ul>
						          	<li><i class="icon ion-ios-arrow-right"></i> Trang admin: Actor, Director, Server.</li>
						          	<li><i class="icon ion-ios-arrow-right"></i> Trang home: Actor, Director, xử lí một phần footer.</li>
						          </ul>
						        </div>
						        
						        <!-- Modal footer -->
						        <div class="modal-footer">
						          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						        </div>
						        
						      </div>
						    </div>
						  </div>
					</li>
						
					<li><a href="{{ route('home_faq') }}">Hướng dẫn sử dụng</a></li>
					<li><a data-toggle="modal" href="#ContactADsModal" >Liên hệ quảng cáo</a>
						<div class="modal" id="ContactADsModal">
						    <div class="modal-dialog">
						      <div class="modal-content">
						      
						        <!-- Modal Header -->
						        <div class="modal-header">
						          <h1 class="modal-title" style="color: #6242f4; text-align: center;">Liên hệ quảng cáo</h1>
						          <button type="button" class="close" data-dismiss="modal">×</button>
						        </div>
						        
						        <!-- Modal body -->
						        <div class="modal-body">						          
						          <p><i class="icon ion-android-call"></i> Tổng đài hỗ trợ hợp tác: 1900000000 - nhánh 4 (hỗ trợ 8AM - 6PM) </p>						          
						          <br>						          
						          <p><i class="icon ion-android-mail"></i> Gửi yêu cầu quảng cáo: quangcao@bestfilm.local (hỗ trợ 24/24h) </p>						          
						          <br>						          
						          <p><i class="icon ion-android-pin"></i> Địa chỉ: Tầng 2, tòa nhà TC, số 104 Lê Thanh Nghị, Bách Khoa, Hai Bà Trưng, Hà Nội. </p>
						          
						        </div>
						        
						        <!-- Modal footer -->
						        <div class="modal-footer">
						          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						        </div>
						        
						      </div>
						    </div>
						 </div>
					</li>
				</ul>
			</div>
			<div class="flex-child-ft item4">
				<h4>QUY ĐỊNH</h4>
				<ul>
					<li><a href="{{ route('home_dieukhoan') }}">Điều khoản sử dụng</a></li>

					</li>
					<li><a href="{{ route('home_privacy') }}">Chính sách riêng tư</a></li>
					<li><a href="#">Khiếu nại bản quyền</a>
					</li>
				</ul>
			</div>
			<div class="flex-child-ft item5">
				<h4>TRỢ GIÚP</h4>
				<ul>
                    <li><a href="#">Hỏi đáp</a></li>
                    <li><a data-toggle="modal" href="#ContactModal">Liên hệ</a>
						<div class="modal" id="ContactModal">
						    <div class="modal-dialog">
						      <div class="modal-content">
						      
						        <!-- Modal Header -->
						        <div class="modal-header">
						          <h1 class="modal-title" style="color: #6242f4; text-align: center;">Thông tin liên hệ</h1>
						          <button type="button" class="close" data-dismiss="modal">×</button>
						        </div>
						        
						        <!-- Modal body -->
						        <div class="modal-body">						          
						          <p><i class="icon ion-android-call"></i> Tổng đài hỗ trợ: 1900000000 - nhánh 0 (hỗ trợ 8AM - 6PM) </p>						          
						          <br>						          
						          <p><i class="icon ion-android-mail"></i> Gửi yêu cầu quảng cáo: contact@bestfilm.local (hỗ trợ 24/24h) </p>						          
						          <br>						          
						          <p><i class="icon ion-android-pin"></i> Địa chỉ: Tầng 2, tòa nhà TC, số 104 Lê Thanh Nghị, Bách Khoa, Hai Bà Trưng, Hà Nội. </p>
						          
						        </div>
						        
						        <!-- Modal footer -->
						        <div class="modal-footer">
						          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						        </div>
						        
						      </div>
						    </div>
						  </div>
                    </li>
                    <li><a href="{{route('home_contact_gopy')}}">Góp ý</a></li>
                    <li><a href="{{route('home_contact_phanhoi')}}">Báo lỗi</a></li>
                </ul>
			</div>
		</div>
	</div>
	<div class="ft-copyright">
        <div class="ft-left">
            <p><a href="#">MXH: số 572/GP-BTTTT do Bộ TTTT cấp ngày 25/04/2019</a></p>
        </div>
		<div class="backtotop">
			<p><a href="#" id="back-to-top">Back to top  <i class="ion-ios-arrow-thin-up"></i></a></p>
		</div>
	</div>
</footer>
<!-- end of footer section-->
    <!-- JS files -->
    <script src="{{ asset('home/js/jquery.js') }}"></script>
    <script src="{{ asset('home/js/plugins.js') }}"></script>
    <script src="{{ asset('home/js/plugins2.js') }}"></script>
    <script src="{{ asset('home/js/custom.js') }}"></script>
<<<<<<< HEAD
	<script src="{{ asset('admin/bower_components/toastr/toastr.min.js') }}"></script>
	<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
	<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
	<script>
=======

    <!-- The toast component is like an alert box that is only shown for a couple of seconds when something happens -->
    <script src="{{ asset('admin/bower_components/toastr/toastr.min.js') }}"></script>
    <script>
>>>>>>> b8fd56cf8b9ce06278dcbd3bb996cd54c8b5d324
        @if(Session::has('success'))
            toastr.success('{{ Session::get("success") }}');
            // <?php  //session()->forget('success'); ?>
        @endif
        @if(Session::has('error'))
            toastr.error('{{ Session::get("error") }}');
        @endif
        @if($errors -> any())
            @foreach($errors -> all() as $error)
                toastr.error('{{ $error }}');
            @endforeach
        @endif
    </script>
    @yield('js')
</body>

</html>
