@extends('home.layout')
@section('title','Chi tiết đạo diễn')
@section('css')
   
@endsection
@section('content')
<div class="hero hero3">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- <h1> movie listing - list</h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Home</a></li>
					<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
				</ul> -->
			</div>
		</div>
	</div>
</div>
<!-- celebrity single section-->

<div class="page-single movie-single cebleb-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="mv-ceb">
					<img src="{{asset(('/storage/' . $director->image))}}" alt="" height="476px" width="330px">
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct">
					<h1 class="bd-hd">{{$director->name}}</h1>
					<p class="ceb-single">Đạo diễn  |  Số lượt xem: {{$director->view}}</p>
					<br><br><br><br><br>
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv">
								<li class="<?php if($filmactivestate == 0) {echo "active";} ?>"><a href="#overviewceb">Tổng quan</a></li>								
								<li class="<?php if($filmactivestate == 1) {echo "active";} ?>"><a href="#filmography">Phim</a></li>                        
							</ul>
						    <div class="tab-content">
						        <div id="overviewceb" class="tab <?php if($filmactivestate == 0) {echo "active";} ?>">
						            <div class="row">
						            	<div class="col-md-8 col-sm-12 col-xs-12">		
						            		<div class="viewtable">
						            			<table>
						            			<tr>
						            				<td>	   			
									            		<div class="boldviewtext">Tên đầy đủ: <p>{{$director->name}}</p> 
									            		</div>	
						            				</td>
						            				<td>	   			
									            		<div class="boldviewtext">Giới tính: <p>{{$director->gender}}</p> 
									            		</div>	
						            				</td>					            				
						            			</tr>
						            			<tr>
						            				<td>	   			
									            		<div class="boldviewtext">Ngày sinh: <p>{{$director->birth_day}}</p> 
									            		</div>	
						            				</td>
						            				<td>	   			
									            		<div class="boldviewtext">Quốc gia: <p>{{$director->country_id}}</p> 
									            		</div>	
						            				</td>
						            			</tr>
						            			<tr>
						            				<td>	   			
									            		<div class="boldviewtext">Email: <p>{{$director->email}}</p> 
									            		</div>	
						            				</td>
						            			</tr>
						            			<tr>
						            				<td>	   			
									            		<div class="boldviewtext">Sở trường: <p>{{$director->forte}}</p> 
									            		</div>	
						            				</td>						            				
						            			</tr>
						            			<tr>
						            				<td>	   			
									            		<div class="boldviewtext">Sở thích: <p>{{$director->hobby}}</p> 
									            		</div>	
						            				</td>						            				
						            			</tr>
						            			<tr>
						            				<td>	   			
									            		<div class="boldviewtext">Mô tả khác: <p>{{$director->description}}</p> 
									            		</div>	
						            				</td>						            				
						            			</tr>
						            			<tr>
						            				<td colspan="2">
						            					<div class="boldviewtext">Tiểu sử:  
									            		</div>	
									            		<p>{{$director->story}}</p>
						            				</td>
						            			</tr>
						            		</table>
						            		</div>
						            	</div>
						            	<div class="col-md-4 col-xs-12 col-sm-12">
						            		<div class="sidebar">
							            		<div class="searh-form">
													<h4 class="sb-title">Tìm đạo diễn</h4>
													<form class="form-style-1 celebrity-form" action="{{ route('home_director_search')}}">
														<div class="row">
															<div class="col-md-12 form-it">
																<label>Tên đạo diễn</label>
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
						            		</div>
						            	</div>
						            </div>
						        </div>						       
						       
					       	 	<div id="filmography" class="tab <?php if($filmactivestate == 1) {echo "active";} ?>">
						        	<div class="row">
						            	<div class="rv-hd">
						            		<div>
						            			<h3>Danh sách phim của</h3>
						       	 				<h2>{{$director->name}}</h2>
						            		</div>
										
						            	</div>
						            	<div class="topbar-filter">
											<p class="pad-change" style="padding-right: 180px;">Có tất cả <span>{{$getallfilms->total()}}</span> phim</p>
											<label>Sắp xếp theo:</label>
											<form action="{{ route('home_director_view',$director->id )}}" style="width: 300px;">
											    <select name='selectsort' onchange='if(this.value != "") { this.form.submit(); <?php $filmactivestate = 1;  ?> }' style="padding-right: 0px; width: 300px; text-align: center;">
											         <option value="default" 
											         <?php											         
											          if (($presort =='') || ($presort =='default'))
											         	echo "selected";
											         ?>>Mặc định</option>
											         <option value="tenAZ" <?php if ($presort =='tenAZ')
											         	echo "selected";
											         ?>>Tên từ A->Z</option>
											         <option value="tenZA" <?php if ($presort =='tenZA')
											         	echo "selected";
											         ?>>Tên từ Z->A</option>
											         <option value="ngayASC" <?php if ($presort =='ngayASC')
											         	echo "selected";
											         ?>>Ngày ra mắt cũ nhất</option>
											         <option value="ngayDESC" <?php if ($presort =='ngayDESC')
											         	echo "selected";
											         ?>>Ngày ra mắt mới nhất</option>
											         <option value="NSXASC" <?php if ($presort =='NSXASC')
											         	echo "selected";
											         ?>>Nhà sản xuất từ A->Z</option>
											         <option value="NSXDESC" <?php if ($presort =='NSXDESC')
											         	echo "selected";
											         ?>>Nhà sản xuất từ Z->A</option>
											         <option value="QGASC" <?php if ($presort =='QGASC')
											         	echo "selected";
											         ?>>Quốc gia từ A->Z</option>
											         <option value="QGDESC" <?php if ($presort =='QGDESC')
											         	echo "selected";
											         ?>>Quốc gia từ Z->A</option>
											    </select>
											     <input type="hidden" name="filmactivestate" value="{{$filmactivestate}}">
											</form>							
										</div>

										<div class="film-items">
											@foreach($getallfilms as $getallfilm)
											<div class="film-item">
												<a href="#">
													<div class="film-img">
														<img class="film-img img-responsive" src="{{ asset('/storage/' . $getallfilm->image)}}" alt="1" >
													</div>
												</a>
												<div class="film-infor">
													<h2 align="center" style="margin-bottom: 2px;"><a href="#">{{$getallfilm->name}}</a></h2>
													<div class="span-film-infor">
														<span>{{$getallfilm->country_id}}</span>
													</div>
												</div>
											</div>
											@endforeach						
										</div>
										<?php 

											$req = Request::query();										
											$tmparray = array("filmactivestate" => 1);
											$req = array_merge($req, $tmparray);
										?>
										<div class="topbar-filter">		
											<table style="border: none;">
												<tr>
													<td colspan="3" style="border: none; color: white">Page {{$getallfilms->currentPage()}} of {{$getallfilms->lastPage()}}: </td>
													<td colspan="15" style="border: none; align-content: left"> 
														<div>{{ $getallfilms->appends($req)->render()  }}</div>
													
													</td>
												</tr>
											</table>
										</div>
						            </div>
					       	 	</div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
@endsection