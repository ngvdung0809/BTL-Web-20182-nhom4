@extends('home.layout')
@section('title','Tìm kiếm diễn viên')
@section('css')
@endsection
@section('content')
<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Tìm kiếm diễn viên</h1>
					<ul class="breadcumb">
						<li class="active"><a href="{{ route('home_index') }}">Home</a></li>
						<li class="active"><span class="ion-ios-arrow-right"></span>
							<a href="{{ route('home_actor_list') }}">Danh sách diễn viên</a></li>
						<li> <span class="ion-ios-arrow-right"></span> Tìm kiếm diễn viên</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- celebrity search section-->
<div class="page-single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="topbar-filter">
					<p class="pad-change" style="padding-right: 300px;">Có tất cả <span>{{$persons->total()}}</span> diễn viên</p>
					<label>Sắp xếp theo:</label>
					<form action="{{ route('home_actor_search')}}" style="width: 300px;">
						<input type="hidden" name="name" value="{{$dataarray[0]}}">
						<input type="hidden" name="country" value="{{$dataarray[1]}}">
					    <select name='selectsort' onchange='if(this.value != "") { this.form.submit(); }' style="padding-right: 0px; width: 300px; text-align: center;">
					         <option value="default" <?php if (($presort =='') || ($presort =='default'))
					         	echo "selected";
					         ?>>Mặc định</option>
					         <option value="tenAZ" <?php if ($presort =='tenAZ')
					         	echo "selected";
					         ?>>Tên từ A->Z</option>
					         <option value="tenZA" <?php if ($presort =='tenZA')
					         	echo "selected";
					         ?>>Tên từ Z->A</option>
					         <option value="ngaybl" <?php if ($presort =='ngaybl')
					         	echo "selected";
					         ?>>Ngày sinh từ bé đến lớn</option>
					         <option value="ngaylb" <?php if ($presort =='ngaylb')
					         	echo "selected";
					         ?>>Ngày sinh từ lớn đến bé</option>
					         <option value="viewASC" <?php if ($presort =='viewASC')
					         	echo "selected";
					         ?>>Độ nổi tiếng từ thấp đến cao</option>
					         <option value="viewDESC" <?php if ($presort =='viewDESC')
					         	echo "selected";
					         ?>>Độ nổi tiếng từ cao xuống thấp</option>
					    </select>
					</form>							
				</div>
				
				<div class="row">	
					<?php if ($persons->total() == 0) 
						echo "<h6 align=\"center\">Không tìm thấy kết quả</h6>";
						else {
							foreach ($countries as $country) {
								if ($country->id == $dataarray[1]) {
									$countryname = $country->name;
								}
							}
							
							echo "<h6 style=\"color: white; padding-left:30%; \" align\"center\">Tìm kiếm diễn viên $dataarray[0] tới từ $countryname </h6>";
						}
						echo "<br>";
					?>
										
					@foreach($persons as $person)
					<div class="col-md-12">
						<div class="ceb-item-style-2" style="height:140px; ">
							<div style="height: 140px; width: 104px;">
								<img class="actor-img img-responsive" src="{{ asset('/storage/' . $person->image)}}" alt="1" style="height: 140px; width: 104px; ">
							</div>
							<div class="ceb-infor">
								<h2><a href="{{ route('home_actor_view',$person->id )}}">{{$person->name}}</a></h2>
								<span>{{$person->country_id}}</span>
								<div class="des">{{$person->story}}</div>
							</div>
						</div>
					</div>
					@endforeach
					
				</div>
				
				<div class="topbar-filter">		
					<table style="border: none;">
						<tr>
							<td colspan="3" style="border: none; padding-left: 10px; color: white">Page {{$persons->currentPage()}} of {{$persons->lastPage()}}: </td>
							<td colspan="15" style="border: none; align-content: left"> 
								{{ $persons->appends(Request::query())->render() }}
							</td>
						</tr>
					</table>
				</div>				 
			</div>
			<div class="col-md-3 col-xs-12 col-sm-12">
				<div class="sidebar">
						<div class="searh-form">
						<h4 class="sb-title">Tìm diễn viên</h4>
						<form class="form-style-1 celebrity-form" action="{{ route('home_actor_search')}}">
							<div class="row">
								<div class="col-md-12 form-it">
									<label>Tên diễn viên</label>
									<input type="text" placeholder="Enter keywords" name="name">
								</div>
								<div class="col-md-12 form-it">
									<label>Quốc gia</label>									
									<select name="country">
										@foreach($countries as $country)
									  <option value="{{$country->id}}">{{$country->name}}</option>
									  @endforeach
									</select>
								</div>	
								<div class="col-md-12 ">
									<input class="submit" type="submit" value="Tìm">
								</div>
							</div>
						</form>
					</div>
					<div class="ads">
						<img src="images/uploads/ads1.png" alt="">
					</div>
					<div class="celebrities">
						<h4 class="sb-title">Diễn viên nổi tiếng</h4>
						@foreach($recommends as $recommend)
						<div class="celeb-item">
							<a href="{{ route('home_actor_view',$recommend->id )}}"><img class="actor-img img-responsive" src="{{ asset('/storage/' . $recommend->image)}}" alt="1" height="70" width="70">
							</a>
							<div class="celeb-author">
								<h6><a href="{{ route('home_actor_view',$recommend->id )}}">{{$recommend->name}}</a></h6>								
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection