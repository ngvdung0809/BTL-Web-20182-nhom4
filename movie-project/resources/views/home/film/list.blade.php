@extends('home.layout')
@if ($typePage == '')
    @section('title', 'Danh sách phim')
@else
    @section('title')
        Danh sách {{ $typePage }}
    @endsection
@endif
@section('css')
@endsection
@section('search')
    <div class="top-search">
        <select id="search">
            <option id="start">Chọn trường</option>
            <option data-value="name">Tên phim</option>
            <option data-value="type">Thể loại</option>
            <option data-value="director">Đạo diễn</option>
            <option data-value="actor">Diễn viên</option>
            <option data-value="publisher">Hãng sản xuất</option>
            <option data-value="country">Quốc gia</option>
            <option data-value="released">Năm phát hành</option>
            <option data-value="rate">Đánh giá</option>
            <option data-value="status">Trạng thái</option>
        </select>
        <input type="text" placeholder="Tìm kiếm phim yêu thích theo ......" id="search-criteria">
    </div>
@endsection
@section('content')
    <div class="hero user-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1>Danh sách {{ $typePage }}</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="#">Trang chủ</a></li>
                            <li> <span class="ion-ios-arrow-right"></span>Danh sách {{ $typePage }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single" id="favorist_film">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="topbar-filter user">
                        <label id='result'>Tìm thấy <span style="color: blue">{{ count($films) }}</span> phim</label>
                        <label>Sắp xếp theo:</label>
                        <select id="sort">
                            <option id="show">Chọn trường muốn sắp xếp</option>
                            <option data-value="name">Tên phim</option>
                            <option data-value="type">Thể loại</option>
                            <option data-value="director">Đạo diễn</option>
                            <option data-value="actor">Diễn viên</option>
                            <option data-value="publisher">Hãng sản xuất</option>
                            <option data-value="country">Quốc gia</option>
                            <option data-value="released">Năm phát hành</option>
                            <option data-value="rate">Đánh giá</option>
                            <option data-value="status">Trạng thái</option>
                        </select>
                        <label>Thứ tự:</label>
                        <select id="sort_by">
                            <option data-value="asc">Tăng dần</option>
                            <option data-value="desc">Giảm dần</option>
                        </select>
                    </div>
                    <div class="flex-wrap-movielist user-fav-list">
                        @foreach ($films as $key => $film)
                            <div class="page-disactive" id="film_{{ $key }}">
                                <div class="movie-item-style-2 userrate">
                                    <img src="{{ '/storage/'.$film->image }}" alt="" style="height: 400px; width: 250px">
                                    <div class="mv-item-infor">
                                        <h6 class="name"><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }} <span class="released time sm"> ( {{ date('Y', strtotime($film->released)) }} )</span></a></h6>
                                        @if ($film->series_film == Config::get('constants.FILM.SERIES_FILM'))
                                            <p class="time sm-text" style="width: 100px"><a href="{{ route('home_search_film', ['name'=>'series_film', 'name_id'=>Config::get('constants.FILM.SERIES_FILM')]) }}">Phim bộ</a></p>
                                        @endif
                                        @if ($film->retail_film == Config::get('constants.FILM.RETAIL_FILM'))
                                            <p class="time sm-text" style="width: 100px"><a href="{{ route('home_search_film', ['name'=>'retail_film', 'name_id'=>Config::get('constants.FILM.RETAIL_FILM')]) }}">Phim lẻ</a></p>
                                        @endif
                                        @if ($film->demo_film == Config::get('constants.FILM.DEMO_FILM'))
                                            <p class="time sm-text" style="width: 150px"><a href="{{ route('home_search_film', ['name'=>'demo_film', 'name_id'=>Config::get('constants.FILM.DEMO_FILM')]) }}">Phim thuyết minh</a></p>
                                        @endif
                                        @if ($film->theaters_film == Config::get('constants.FILM.THEATERS_FILM'))
                                            <p class="time sm-text" style="width: 150px"><a href="{{ route('home_search_film', ['name'=>'theaters_film', 'name_id'=>Config::get('constants.FILM.THEATERS_FILM')]) }}">Phim chiếu rạp</a></p>
                                        @endif
                                        <p class="time sm-text">Đánh giá</p>
                                        <p class="rate"><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                        <p class="time sm-text">Nội dung</p>
                                        <p class="describe">{{ $film->content }}</p>
                                        <p class="run-time"> Thời lượng: {{ $film->time }}.<span>Ngày phát hành: {{ date('d/m/Y', strtotime($film->released)) }}</span></p>
                                        <p class="status">Trạng thái:
                                            @if ($film->status == Config::get('constants.FILM_STATUS.COMPLETED'))
                                                Hoàn tất
                                            @elseif($film->status == Config::get('constants.FILM_STATUS.TRAILER'))
                                                Chưa phát hành
                                            @else
                                                {{ $film->status }}
                                            @endif
                                        </p>
                                        <p class="type">
                                            @foreach ($film->type as $type)
                                                <a href="{{ route('home_search_film', ['name'=>'type', 'name_id'=>$type->id]) }}"> {{ $type->name }} </a>
                                            @endforeach
                                        </p>
                                        <p class="publisher">Hãng sản xuất: <a href="{{ route('home_publisher_view', ['id'=>$film->publisher_id]) }}">{{ $film->publisher->name }}</a></p>
                                        <p class="director">Đạo diễn: <a href="{{ route('home_director_view', ['id'=>$film->director_id]) }}">{{ $film->director->name }}</a></p>
                                        <p class="actor">Diễn viên:
                                            @foreach ($film->actor as $actor)
                                                <a href="{{ route('home_actor_view', ['id'=>$actor->id]) }}">{{ $actor->name }}</a>
                                            @endforeach
                                        </p>
                                        <p class="country">Quốc gia: <a href="{{ route('home_search_film', ['name'=>'country_id', 'name_id'=>$film->country_id]) }}">{{ $film->country->name }}</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="topbar-filter">
                        <label>Số phim trên mỗi trang:</label>
                        <select id="film_per_page">
                            <option data-value="5">5 phim</option>
                            <option data-value="10">10 phim</option>
                        </select>
                        <div class="pagination2" data-total_films={{ count($films) }}></div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="searh-form">
                            <h4 class="sb-title">Tìm kiếm phim</h4>
                            <form class="form-style-1" method="get" action="{{ route('home_search_like_film') }}">
                                <div class="row">
                                    <div class="col-md-12 form-it {{ $errors->has('property') ? 'is-invalid' : '' }}">
                                        <label>Trường tìm kiếm *</label>
                                        <select name="property" required>
                                            <option value="">Chọn trường</option>
                                            <option value="name">Tên phim</option>
                                            <option value="type">Thể loại</option>
                                            <option value="director">Đạo diễn</option>
                                            <option value="actor">Diễn viên</option>
                                            <option value="publisher">Hãng sản xuất</option>
                                            <option value="country">Quốc gia</option>
                                            <option value="released">Năm phát hành</option>
                                            <option value="rate">Đánh giá</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-it {{ $errors->first('keyword') ? 'has-error' : ''}}">
                                        <label>Từ khóa cần tìm kiếm *</label>
                                        <input type="text" placeholder="Từ khóa cần tìm kiếm" name="keyword" value="{{ old('keyword') }}" required>
                                    </div>
                                    <div class="col-md-12 ">
                                        <input class="submit" type="submit" value="Search">
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if(!empty($adventisment))
                            <div class="ads adsv2">
                                <a href="{{ $adventisment->link }}"><img src="{{ asset('/storage/' . $adventisment->image) }}" alt="" style="width: 300px; height: 264px"></a>
                            </div>
                        @endif
                        <div class="sb-facebook sb-it">
                            <h4 class="sb-title">Find us on Facebook</h4>
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=200&height=400&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="200" height="400" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('home/bower_components/twbs-pagination/jquery.twbsPagination.min.js') }}"></script>
    <script src="{{ asset('js/home/film/list.js') }}"></script>
@endsection
