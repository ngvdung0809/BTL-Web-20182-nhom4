@extends('home.layout')
@section('title','Đăng ký tài khoản')
@section('content')
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro">
					<form method="post" action="{{route('home_user_dangkytk')}}"  enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group {{ $errors->first('username') ? 'has-error' : ''}}">
                			<label for="username">Username*</label>
                			<div class="input-group">
                    			<div class="input-group-addon">
                        			<i class="fa fa-user"></i>
                   		 		</div>
                    			<input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" placeholder="Vui lòng nhập vòng tên hiển thị" value="{{ old('username') }}" required>
                			</div>
               			 	@if ($errors->has('username'))
                    		<span class="invalid-feedback" role="alert">
                        		<strong>{{ $errors->first('username') }}</strong>
                    		</span>
                			@endif
            			</div>

            			<div class="form-group {{ $errors->first('name') ? 'has-error' : ''}}">
                			<label for="name">Họ tên *</label>
                			<div class="input-group">
                    			<div class="input-group-addon">
                        			<i class="fa fa-edit"></i>
                    			</div>
                    			<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Vui lòng nhập vào họ tên đầy đủ" value="{{ old('name') }}" required>
                			</div>
                			@if ($errors->has('name'))
                    		<span class="invalid-feedback" role="alert">
                        		<strong>{{ $errors->first('name') }}</strong>
                    		</span>
                			@endif
            			</div>

						<div class="form-group {{ $errors->first('gender') ? 'has-error' : ''}}">
							<label for="gender">Giới tính *</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa  fa-venus-mars"></i>
								</div>
								<select id="gender" type="text" class="form-control{{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" placeholder="Vui lòng chọn giới tính" required>
									<option value=""></option>
									<option value="male">Nam</option>
									<option value="female">Nữ</option>
									<option value="other">Khác</option>
								</select>
							</div>
							@if ($errors->has('gender'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('gender') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group {{ $errors->first('country_id') ? 'has-error' : ''}}">
							<label for="country_id" >Quốc gia *</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa  fa-globe"></i>
								</div>
								<select class="form-control {{ $errors->has('country_id') ? ' is-invalid' : '' }}" id="country_id" name="country_id" value="{{ old('country_id') }}" placeholder="Vui lòng Chọn quốc gia" required>
									<option value=""></option>
									@foreach ($countries as $country)
										<option value="{{ $country->id }}">{{ $country->name }}</option>
									@endforeach
								</select>
							</div>

							@if ($errors->has('country_id'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('country_id') }}</strong>
								</span>
							@endif
            			</div>

						<div class="form-group {{ $errors->first('birth_day') ? 'has-error' : ''}}">
							<label for="birth_day">Ngày Sinh*</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input id="birth_day" type='text' class="form-control" name="birth_day" value="{{ old('birth_day') }}" placeholder="Vui lòng chọn ngày sinh" required/>
							</div>

							@if ($errors->has('birth_day'))
								<span class="help-block">{{ $errors->first('birth_day') }}</span>
							@endif
						</div>

						<div class="form-group {{ $errors->first('phone') ? 'has-error' : ''}}">
							<label for="phone">Số điện thoại *</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-phone"></i>
								</div>
								<input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"  placeholder="Vui lòng nhập vào số điện thoại" value="{{ old('phone') }}" required>
							</div>

							@if ($errors->has('phone'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('phone') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group {{ $errors->first('email') ? 'has-error' : ''}}">
							<label for="email">Địa chỉ email *</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-pencil"></i>
								</div>
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  placeholder="Vui lòng nhập vào email" value="{{ old('email') }}" required>
							</div>

							@if ($errors->has('email'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						</div>


						<div class="form-group {{ $errors->first('password') ? 'has-error' : ''}}">
							<label for="password">Mật khẩu*</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-lock"></i>
								</div>
								<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Vui lòng nhập mật khẩu" value="{{ old('password') }}" required>
							</div>

							@if ($errors->has('password'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group">
							<label for="password-confirm">Nhập lại mật khẩu*</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-lock"></i>
								</div>
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Vui lòng nhập lại mật khẩu"required>
							</div>
						</div>

						<div class="box-footer">
           	 				<button type="submit">Đăng ký</button>
                    	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset('js/admin/adventisment/list.js') }}" ></script>
@endsection