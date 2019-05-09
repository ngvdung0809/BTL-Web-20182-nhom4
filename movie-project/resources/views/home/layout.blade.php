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
	<link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />

	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="{{ asset('home/css/plugins.css') }}">
	<link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    @yield('css')

</head>
<body>
<!--preloading-->
<div id="preloader">
    <a href="#"><img class="logo" src="{{ asset('home/images/logo.png') }}" alt="" width="119" height="58"></a>
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
                    <input type="text" name="username" id="username" placeholder="Hugh Jackman" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
        	</div>
           
            <div class="row">
            	<label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder="******" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
            <div class="row">
            	<div class="remember">
					<div>
						<input type="checkbox" name="remember" value="Remember me"><span>Remember me</span>
					</div>
            		<a href="#">Forget password ?</a>
            	</div>
            </div>
           <div class="row">
           	 <button type="submit">Login</button>
           </div>
        </form>
    </div>
</div>


<div class="login-wrapper"  id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>sign up</h3>
        <form method="post" action="#">
            <div class="row">
                 <label for="username-2">
                    Username:
                    <input type="text" name="username" id="username-2" placeholder="Hugh Jackman" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
            </div>
           
            <div class="row">
                <label for="email-2">
                    your email:
                    <input type="text" name="email" id="email-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
             <div class="row">
                <label for="password-2">
                    Password:
                    <input type="password" name="password" id="password-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
            <div class="row">
                <label for="repassword-2">
                    Re-Password:
                    <input type="password" name="password" id="repassword-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
			<div class="row">
                <label for="phone">
                    Phone:
                    <input type="text" name="phone" id="phone" placeholder="" pattern="(?=^.{8,}$)" required="required" />
                </label>
            </div>
			<div class ="row">
				<label for="country">
					Country:
					<input type="text" name="quocgia" id="quocgia" required="required">
				</label>
			</div>

           <div class="row">
             <button type="submit">sign up</button>
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
				    <a href="#"><img class="logo" src="{{ asset('home/images/logo.png') }}" alt="" width="100" height="50"></a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown">
							Trang chủ <i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">
								<li><a href="#">Name</a></li>
								<li><a href="#">Name</a></li>
								<li><a href="#">Name</a></li>
							</ul>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							Thể loại<i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" >Name<i class="ion-ios-arrow-forward"></i></a>
									<ul class="dropdown-menu level2">
										<li><a href="#">Name</a></li>
										<li><a href="#">Name</a></li>
									</ul>
								</li>
								<li><a href="#">Name</a></li>
								<li><a href="#">Name</a></li>
								<li class="it-last"><a href="#">Name</a></li>
							</ul>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							Quốc gia <i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">
								<li><a href="#">Name</a></li>
								<li><a href="#">Name</a></li>
								<li><a href="#">Name</a></li>
								<li class="it-last"><a href="#">Name</a></li>
							</ul>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							Phim lẻ <i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">
								<li><a href="#">Name</a></li>
								<li><a href="#">Name</a></li>
								<li class="it-last"><a href="#">Name</a></li>
							</ul>
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							Phim bộ <i class="fa fa-angle-down" aria-hidden="true"></i>
							</a>
							<ul class="dropdown-menu level1">
								<li><a href="#">Name</a></li>
								<li><a href="#">Name</a></li>
								<li><a href="#">Name</a></li>
								<li class="it-last"><a href="#">Name</a></li>
							</ul>
						</li>
                        <li class="dropdown first">
                            <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                            Trailer <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu level1">
                                <li><a href="#">Name</a></li>
                                <li><a href="#">Name</a></li>
                                <li><a href="#">Name</a></li>
                                <li class="it-last"><a href="#">Name</a></li>
                            </ul>
                        </li>
                        <li class="dropdown first">
                            <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                            Phim mới <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu level1">
                                <li><a href="#">Name</a></li>
                                <li><a href="#">Name</a></li>
                                <li><a href="#">Name</a></li>
                                <li class="it-last"><a href="#">Name</a></li>
                            </ul>
                        </li>
					</ul>
					<ul class="nav navbar-nav flex-child-menu menu-right">
						<li class="btn loginLink"><a href="#">Đăng nhập</a></li>
						<li class="btn signupLink"><a href="#">Đăng kí</a></li>
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
					<li><a href="#">Giới thiệu</a></li>
					<li><a href="#">Facebook BF</a></li>
					<li><a href="#">Youtube Chennel</a></li>
				</ul>
			</div>
			<div class="flex-child-ft item3">
				<h4>ĐÓNG GÓP</h4>
				<ul>
					<li><a href="#">Thành viên</a></li>
					<li><a href="#">Hướng dẫn sử dụng</a></li>
					<li><a href="#">Liên hệ quảng cáo</a></li>
				</ul>
			</div>
			<div class="flex-child-ft item4">
				<h4>QUY ĐỊNH</h4>
				<ul>
					<li><a href="#">Điều khoản sử dụng</a></li>
					<li><a href="#">Chính sách riêng tư</a></li>
					<li><a href="#">Khiếu nại bản quyền</a></li>
					<li><a href="#">Thành viên vi phạm</a></li>
				</ul>
			</div>
			<div class="flex-child-ft item5">
				<h4>TRỢ GIÚP</h4>
				<ul>
                    <li><a href="#">Hỏi đáp</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="{{route('home_contact_gopy')}}">Góp ý</a></li>
                    <li><a href="#">Báo lỗi</a></li>
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

    <script src="{{ asset('home/js/jquery.js') }}"></script>
    <script src="{{ asset('home/js/plugins.js') }}"></script>
    <script src="{{ asset('home/js/plugins2.js') }}"></script>
    <script src="{{ asset('home/js/custom.js') }}"></script>
    @yield('js')
</body>

</html>
