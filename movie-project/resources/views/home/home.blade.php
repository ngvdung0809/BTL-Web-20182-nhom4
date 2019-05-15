@extends('home.layout')
@section('title', 'Trang chủ')
@section('css')
@endsection
@section('search')
<form method="get" action="{{ route('home_search_like_film') }}">
    <div class="top-search">
        <select id="search" name="property" required>
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
        <input type="text" placeholder="Tìm kiếm phim yêu thích theo ......" id="search-criteria" name="keyword" value="{{ old('keyword') }}" required>
        <button type="submit" class="redbtn">Search</button>
    </div>
</form>
@endsection
@section('content')
<div class="slider movie-items">
    <div class="container">
        <div class="row">
            <div class="social-link">
                <p>Follow us: </p>
                <a href="#"><i class="ion-social-facebook"></i></a>
                <a href="#"><i class="ion-social-twitter"></i></a>
                <a href="#"><i class="ion-social-googleplus"></i></a>
                <a href="#"><i class="ion-social-youtube"></i></a>
            </div>
            <div  class="slick-multiItemSlider">
                @foreach ($filmSlide as $film)
                    <div class="movie-item">
                        <div class="mv-img">
                            <a href="{{ route('home_view_film', ['id'=>$film->id]) }}"><img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 274px; height: 420px"></a>
                        </div>
                        <div class="title-in">
                            <div class="cate">
                                @foreach ($film->type as $type)
                                    <span class="blue"><a href="{{ route('home_search_film', ['name'=>'type', 'name_id'=>$type->id]) }}">{{ $type->name }}</a></span>
                                @endforeach
                            </div>
                            <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                            <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="movie-items">
    <div class="container">
        <div class="row ipad-width">
            <div class="col-md-12">
                <div class="title-hd">
                    <h2>Phim xem nhiều </h2>
                    <a href="#" class="viewall">Xem tất cả<i class="ion-ios-arrow-right"></i></a>
                </div>
                <div class="tabs">
                    <ul class="tab-links">
                        <li class="active"><a href="#tab1-h2">Ngày</a></li>
                        <li><a href="#tab2-h2">Tuần</a></li>
                        <li><a href="#tab3-h2">Tháng</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab1-h2" class="tab active">
                            <div class="row">
                                <div class="slick-multiItem2">
                                    @foreach ($filmHotDay as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->film->id]) }}">{{ $film->film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="tab2-h2" class="tab">
                           <div class="row">
                                <div class="slick-multiItem2">
                                    @foreach ($filmHotWeek as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a href="{{ route('home_view_film', ['id'=>$film->film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><ahref="{{ route('home_view_film', ['id'=>$film->film->id]) }}">{{ $film->film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="tab3-h2" class="tab">
                           <div class="row">
                                <div class="slick-multiItem2">
                                    @foreach ($filmHotMonth as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->film->id]) }}">{{ $film->film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="movie-items">
    <div class="container">
        <div class="row ipad-width">
            <div class="col-md-8">
                <div class="title-hd">
                    <h2>Phim lẻ</h2>
                    <a href="{{ route('home_search_film', ['name'=>'retail_film', 'name_id'=>Config::get('constants.FILM.RETAIL_FILM')]) }}" class="viewall">Xem tất cả <i class="ion-ios-arrow-right"></i></a>
                </div>
                <div class="tabs">
                    <ul class="tab-links">
                        <li class="active"><a href="#tab11">Mới cập nhật</a></li>
                        <li><a href="#tab12">Sắp chiếu</a></li>
                        <li><a href="#tab13">Đánh giá cao</a></li>
                        <li><a href="#tab14">Xem nhiều</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab11" class="tab active">
                            <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($retailFilmNew as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="tab12" class="tab">
                           <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($retailFilmComingSoon as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="tab13" class="tab">
                            <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($retailFilmRate as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="tab14" class="tab">
                            <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($retailFilmView as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="title-hd">
                    <h2>Phim bộ</h2>
                    <a href="{{ route('home_search_film', ['name'=>'series_film', 'name_id'=>Config::get('constants.FILM.SERIES_FILM')]) }}" class="viewall">Xem tất cả<i class="ion-ios-arrow-right"></i></a>
                </div>
                <div class="tabs">
                    <ul class="tab-links-2">
                        <li class="active"><a href="#tab21">Mới cập nhật</a></li>
                        <li><a href="#tab22">Sắp chiếu</a></li>
                        <li><a href="#tab23">Đánh giá cao</a></li>
                        <li><a href="#tab24">Xem nhiều </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab21" class="tab active">
                            <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($seriesFilmNew as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="tab22" class="tab">
                           <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($seriesFilmComingSoon as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="tab23" class="tab">
                            <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($seriesFilmRate as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="tab24" class="tab">
                            <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($seriesFilmView as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="title-hd">
                    <h2>Phim thuyết minh</h2>
                    <a href="{{ route('home_search_film', ['name'=>'demo_film', 'name_id'=>Config::get('constants.FILM.DEMO_FILM')]) }}" class="viewall">Xem tất cả<i class="ion-ios-arrow-right"></i></a>
                </div>
                <div class="tabs">
                    <ul class="tab-links">
                        <li class="active"><a href="#tab31">Mới cập nhật</a></li>
                        <li><a href="#tab32">Sắp chiếu</a></li>
                        <li><a href="#tab33">Đánh giá cao</a></li>
                        <li><a href="#tab34">Xem nhiều </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab31" class="tab active">
                            <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($demoFilmNew as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="tab32" class="tab">
                           <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($demoFilmComingSoon as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="tab33" class="tab">
                            <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($demoFilmRate as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="tab34" class="tab">
                            <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($demoFilmView as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="title-hd">
                    <h2>Phim chiếu rạp</h2>
                    <a href="{{ route('home_search_film', ['name'=>'theaters_film', 'name_id'=>Config::get('constants.FILM.THEATERS_FILM')]) }}" class="viewall">Xem tất cả<i class="ion-ios-arrow-right"></i></a>
                </div>
                <div class="tabs">
                    <ul class="tab-links-2">
                        <li class="active"><a href="#tab41">Mới cập nhật</a></li>
                        <li><a href="#tab42">Sắp chiếu</a></li>
                        <li><a href="#tab43">Đánh giá cao</a></li>
                        <li><a href="#tab44">Xem nhiều </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab41" class="tab active">
                            <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($theatersFilmNew as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="tab42" class="tab">
                           <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($theatersFilmComingSoon as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="tab43" class="tab">
                            <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($theatersFilmRate as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="tab44" class="tab">
                            <div class="row">
                                <div class="slick-multiItem">
                                    @foreach ($theatersFilmView as $film)
                                        <div class="slide-it">
                                            <div class="movie-item">
                                                <div class="mv-img">
                                                    <img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 162px; height: 248px">
                                                </div>
                                                <div class="hvr-inner">
                                                    <a  href="{{ route('home_view_film', ['id'=>$film->id]) }}"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                                                </div>
                                                <div class="title-in">
                                                    <h6><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }}</a></h6>
                                                    <p><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="celebrities">
                        <h4 class="sb-title">Được quan tâm nhiều</h4>
                        @foreach ($person as $person)
                            <div class="celeb-item">
                                @if($person->job ==  Config::get('constants.PERSON.DIRECTOR'))
                                    <a href="{{ route('home_director_view', ['id'=>$person->id]) }}"><img src="{{ asset('/storage/' . $person->image) }}" alt="" style="width: 70px; height: 70px"></a>
                                    <div class="celeb-author">
                                        <h6><a href="{{ route('home_director_view', ['id'=>$person->id]) }}">{{ $person->name }}</a></h6>
                                        <span>{{ $person->job }}</span>
                                    </div>
                                @else
                                    <a href="{{ route('home_actor_view', ['id'=>$person->id]) }}"><img src="{{ asset('/storage/' . $person->image) }}" alt="" style="width: 70px; height: 70px"></a>
                                    <div class="celeb-author">
                                        <h6><a href="{{ route('home_actor_view', ['id'=>$person->id]) }}">{{ $person->name }}</a></h6>
                                        <span>{{ $person->job }}</span>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="sb-tags sb-it">
                        <h4 class="sb-title">Thẻ nổi bật</h4>
                        <ul class="tag-items">
                            @foreach ($tagFilm as $film)
                                <li><a href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->tag }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="latestnew">
    <div class="container">
        <div class="row ipad-width">
            <div class="col-md-9">
                @if(!empty($adventisment))
                    <div class="ads adsv2">
                        <a href="{{ $adventisment->link }}"><img src="{{ asset('/storage/' . $adventisment->image) }}" alt="" style="width: 510px; height: 75px"></a>
                    </div>
                @endif
                <div class="title-hd">
                    <h2>Trailer phim sắp chiếu</h2>
                    <a href="{{ route('home_search_film', ['name'=>'status', 'name_id'=>Config::get('constants.FILM_STATUS.TRAILER')]) }}" class="viewall">Xem tất cả<i class="ion-ios-arrow-right"></i></a>
                </div>
                <div class="latestnewv2">
                    @foreach ($filmCommingSoon as $film)
                        <div class="blog-item-style-2">
                            <a href="#"><img src="{{ asset('/storage/' . $film->image) }}" alt="" style="width: 182px; height: 102px"></a>
                            <div class="hvr-inner">
                                <a  href="#"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                            </div>
                            <div class="blog-it-infor">
                                <h3><a href="">{{ $film->name }}</a></h3>
                                <span class="time">{{ date('d/m/Y', strtotime($film->released)) }}</span>
                                <p>{{ $film->other_description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <div class="sidebar">
                    <div class="sb-facebook sb-it">
                        <h4 class="sb-title">Find us on Facebook</h4>
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=250&height=400&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="250" height="400" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection
