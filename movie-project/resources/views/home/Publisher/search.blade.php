@extends('home.layout')
@section('title', 'Publisher search')
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
<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>celebrity listing - grid</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span> celebrity listing</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- celebrity grid v1 section-->
<div class="page-single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="topbar-filter">
					<p>Found <span><b>{{ $publishers->count() }}</b> Publishers</span> in total</p>					
				</div>
				<div class="celebrity-items">
					@foreach($publishers as $p)
					<div class="ceb-item">
						<a href="{{ route('home_publisher_view', ['id'=>$p->id] ) }}"><img src="{{ asset('/storage/' .$p->logo )}}" alt="{{ $p->name }}" height="300px;" width="300px;"></a>
						<div class="ceb-infor">
							<h2><a href="{{ route('home_publisher_view', ['id'=>$p->id] ) }}">{{ $p->name }}</a></h2>
							<span>{{ $p->address }}</span>
						</div>
					</div>
					@endforeach
				</div>
				<div class="topbar-filter">
					<label>Reviews per page:</label>
					<select>
						<option value="range">9 Reviews</option>
						<option value="saab">10 Reviews</option>
					</select>
					
					<div class="pagination2">
						<span>Page 1 of 6:</span>
						<a class="active" href="#">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#">4</a>
						<a href="#">5</a>
						<a href="#">6</a>
						<a href="#"><i class="ion-arrow-right-b"></i></a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-12 col-sm-12">
				<div class="sidebar" style="margin-left: 0px;">
					<div class="searh-form">
						<h4 class="sb-title">Search</h4>
						<form class="form-style-1 celebrity-form" action="{{route('home_publisher_search')}}">
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
				</div>
			</div>
		</div>
	</div>
</div>
@endsection