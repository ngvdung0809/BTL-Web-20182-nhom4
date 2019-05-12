@extends('home.layout')
@section('title', 'Publisher')
@section('search')
<div class="top-search">
	    	<select>
				<option value="united">TV show</option>
				<option value="saab">Others</option>
			</select>
			<input type="text" placeholder="Search for a movie, TV Show or celebrity that you are looking for">
</div>
@endsection
@section('content')
<div class="hero sr-single-hero sr-single" style="height: 500px;">
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
<div class="page-single movie-single movie_single">
	<div class="container">			
		<div class="row ipad-width2">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<br><br><br><br>
				<div class="mv-ceb">
					<img src="{{ asset('/storage/' . $p->logo) }}" alt="">
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<br><br><br><br>
					<h1 class="bd-hd">{{ $p->name }} <span> Publisher</span></h1>
					<br><br><br><br><br><br>
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv tabs-series">
								<li class="active"><a href="#overview">Overview</a></li>
								<li><a href="#reviews"> Films</a></li>                       
							</ul>
						    <div class="tab-content">
						        <div id="overview" class="tab active">
						            <div class="row">
						            	<div class="col-md-7 col-xs-12 col-sm-12">
						            		<div class="sb-it">
						            			<h6>Name: </h6>
						            			<p><a href="#">{{ $p->name }}</a></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Address: </h6>
						            			<p><a href="#">{{ $p->address }}</a></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Email: </h6>
						            			<p><a href="#">{{ $p->email }}</a></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Phone: </h6>
						            			<p>{{ $p->phone }}</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Description: </h6>
						            			<p>{{ $p->other_description }}</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Tags:</h6>
						            			<p class="tags">
						            				<span class="time"><a href="#">{{ $p->name }}</a></span>
													<span class="time"><a href="#">{{ $p->id }}</a></span>
													<span class="time"><a href="#">publisher</a></span>
													<span class="time"><a href="#">{{ $p->address }}</a></span>
													<span class="time"><a href="#">final battle</a></span>
						            			</p>
						            		</div>						            		
						            	</div>
						            	<div class="col-md-5 col-sm-12 col-xs-12">            	
											<div class="sidebar" style="margin-left: 0px;">
					                            <div class="searh-form">
						                            <h4 class="sb-title">Search</h4>
						                            <form class="form-style-1 celebrity-form" action="{{ route('home_publisher_search') }}">
							                        <div class="row">
								                        <div class="col-md-12 form-it">
									                        <label>Enter: </label>
									                        <input type="text" name="input" placeholder="Whatever you want">
								                        </div>
								                        <div class="col-md-12 form-it">
									                        <label>Search for: </label>
									                        <select name="type">
									                            <option value="name">Name</option>
									                            <option value="address">Address</option>
									                        </select>
								                        </div>
														<div class="col-md-12 ">
															<input class="submit" type="submit" value="Search">
														</div>
													</div>
													</form>
												</div>
												<div class="celebrities">
													<h4 class="sb-title">Other publisher</h4>
													@foreach($publishers as $pp)
													<div class="celeb-item">
														<a href="{{ route('home_publisher_view', ['id'=>$pp->id] ) }}"><img src="{{ asset('/storage/' .$pp->logo )}}" alt="" height="80px;" width="80px;"></a>
														<div class="celeb-author">
															<h6><a href="{{ route('home_publisher_view', ['id'=>$pp->id] ) }}">{{ $pp->name }}</a></h6>
															<span>{{ $pp->address }}</span>
														</div>
													</div>
													@endforeach
												</div>
											</div>
										</div>		            	
						            </div>
						        </div>
						        <div id="reviews" class="tab" >

						           <h4 style="color: white;"><i style="color: red;">{{ $p->name }}</i> movies</h4><hr>
						           <div class="celebrity-items">
						           		@if($films->count() > 0)
						           		@foreach($films as $f)
					                    <div class="ceb-item">
						                    <a href="#"><img src="{{asset('/storage/' . $f->image )}}" alt="" height="200px;" width="300px;"></a>
						                    <div class="ceb-infor">
							                    <h2><a href="">{{ $f->name }}</a></h2>
							                <span>@if (!empty($f->country))
                                            {{ $f->country->name }}
                                        	@endif</span>
						                </div>
						                @endforeach
						                @else
						                <div style="color: #ff9933; text-align: center;"><h1>No films yet</h1></div>
						                @endif
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