@extends('home.layout')
@section('title', 'Chi tiết phim')
@section('css')
@endsection
@section('search')
    <div class="top-search">
        <select id="search">
            <option id="start">Chọn trường</option>
            <option data-value="name">Tên phim</option>
            <option data-value="director">Đạo diễn</option>
            <option data-value="actor">Diễn viên</option>
            <option data-value="publisher">Hãng sản xuất</option>
            <option data-value="country">Quốc gia</option>
            <option data-value="released">Năm phát hành</option>
            <option data-value="rate">Đánh giá</option>
        </select>
        <input type="text" placeholder="Tìm kiếm phim yêu thích theo ......" id="search-criteria">
    </div>
@endsection
@section('content')
<div class="hero mv-single-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>
</div>
<div class="page-single movie-single movie_single">
    <div class="container">
        <div class="row ipad-width2">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="movie-img sticky-sb">
                    <img src="{{ '/storage/'.$film->image }}" alt="" style="width: 330px; height: 505px">
                    <div class="movie-btn">
                        <div class="btn-transform transform-vertical red">
                            <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Watch Trailer</a></div>
                            <div><a href="{{ '/storage/'.$film->trailer_link }}" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="movie-single-ct main-content">
                    <h1 class="bd-hd">{{ $film->name }} <span> {{ date('Y', strtotime($film->released)) }}</span></h1>
                    <div class="social-btn">
                        <a href="#" class="parent-btn"><i class="ion-heart"></i> Add to Favorite</a>
                        <div class="hover-bnt">
                            <a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>share</a>
                            <div class="hvr-item">
                                <a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
                                <a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
                                <a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
                                <a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="movie-rate">
                        <div class="rate">
                            <i class="ion-android-star"></i>
                            <p><span>{{ $film->rate }}</span> /10<br>
                                <span class="rv">{{ count($film->user) }} đánh giá và {{ count($film->comments) }} bình luận</span>
                            </p>
                        </div>
                        <div class="rate-star">
                            <p>Rate This Movie:  </p>
                            @for ($i = 0; $i < 10; $i++)
                                @if ($film->rate - $i > 0)
                                    <i class="ion-ios-star"></i>
                                @else
                                    <i class="ion-ios-star-outline"></i>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <div class="movie-tabs">
                        <div class="tabs">
                            <ul class="tab-links tabs-mv tabs-series">
                                <li class="active"><a href="#overview">Tổng quan</a></li>
                                <li><a href="#reviews"> Đánh giá và Bình luận</a></li>
                                <li><a href="#cast">  Diễn viên </a></li>
                                <li><a href="#season"> Tập phim</a></li>
                                <li ><a href="#moviesrelated"> Phim liên quan</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="overview" class="tab active">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <p>{{ $film->content }}</p>
                                            <div class="title-hd-sm">
                                                <h4>Tập mới nhất hiện tại</h4>
                                                <a href="#" class="time">Xem tất cả các tập<i class="ion-ios-arrow-right"></i></a>
                                            </div>
                                            <div class="mvcast-item">
                                                <div class="cast-it">
                                                    <div class="cast-left series-it">
                                                        <img src="/home/images/uploads/season.jpg" alt="">
                                                        <div>
                                                            <a href="#">Season 10</a>
                                                            <p>21 Episodes</p>
                                                            <p>Season 10 of The Big Bang Theory premiered on
                                                            September 19, 2016.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="title-hd-sm">
                                                <h4>Diễn viên</h4>
                                                <a href="#" class="time">Xem tất cả diễn viên<i class="ion-ios-arrow-right"></i></a>
                                            </div>
                                            <div class="mvcast-item">
                                                @foreach ($film->actor as $value => $actor)
                                                    @if($value < 8)
                                                        <div class="cast-it">
                                                            <div class="cast-left">
                                                                <img src="{{ asset('/storage/' . $actor->image) }}" alt="" style="width: 40px; height: 40px">
                                                                <a href="#">{{ $actor->name }}</a>
                                                            </div>
                                                            <p>{{ $actor->job }}</p>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="title-hd-sm">
                                                <h4>Đánh giá và bình luận của người xem</h4>
                                                <a href="#" class="time">Xem tất cả {{ count($film->comments) }} bình luận <i class="ion-ios-arrow-right"></i></a>
                                            </div>
                                            <div class="mv-user-review-item">
                                                <h3>Đáng giá quan điểm</h3>
                                                <div class="no-star">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star last"></i>
                                                </div>
                                                <p class="time">
                                                    17 December 2016 by <a href="#"> hawaiipierson</a>
                                                </p>
                                                <p>This is by far one of my favorite movies from the MCU. The introduction of new Characters both good and bad also makes the movie more exciting. giving the characters more of a back story can also help audiences relate more to different characters better, and it connects a bond between the audience and actors or characters. Having seen the movie three times does not bother me here as it is as thrilling and exciting every time I am watching it. In other words, the movie is by far better than previous movies (and I do love everything Marvel), the plotting is splendid (they really do out do themselves in each film, there are no problems watching it more than once.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-12">
                                            <div class="sb-it">
                                                <h6>Đạo diễn: </h6>
                                                <p><a href="#">{{ $film->director->name }}</a></p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Thể loại</h6>
                                                <p>
                                                    @foreach ($film->type as $type)
                                                        <a href="#">{{ $type->name }} </a>
                                                    @endforeach
                                                </p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Ngày phát hành</h6>
                                                <p>{{  date('d-m-Y', strtotime($film->released)) }}</p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Thời lượng</h6>
                                                <p>22 min</p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>MMPA đánh giá:</h6>
                                                <p>TV-14</p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Từ khóa</h6>
                                                <p class="tags">
                                                    <span class="time"><a href="#">{{ $film->tag }}</a></span>
                                                    @foreach ($film->type as $type)
                                                        <span class="time"><a href="#">{{ $type->name }}</a></span>
                                                    @endforeach
                                                </p>
                                            </div>
                                            <div class="ads">
                                                <a href="{{ $adventisment->link }}"><img src="{{ asset('/storage/' . $adventisment->image) }}" alt="" style="width: 195px; height: 171px"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="reviews" class="tab review">
                                   <div class="row">
                                        <div class="rv-hd">
                                            <div class="div">
                                                <h3>Bình luận phim</h3>
                                                <h2>{{ $film->name }}</h2>
                                            </div>
                                            <a href="#" class="redbtn">Bình luận</a>
                                        </div>
                                        <div class="topbar-filter">
                                            <p style="width: 500px">{{ count($film->user) }} đánh giá và {{ count($film->comments) }} bình luận</p>
                                            <label style="width: 170px">Sắp xếp theo:</label>
                                            <select id="sort_comment">
                                                <option id="show_comment">Chọn trường</option>
                                                <option data-value="user_comment">Người dùng</option>
                                                <option data-value="time_comment">Thời gian</option>
                                                <option data-value="review_comment">Đánh giá</option>
                                            </select>
                                            <label style="width: 100px">Thứ tự:</label>
                                            <select id="sort_comment_by">
                                                <option data-value="asc">Tăng dần</option>
                                                <option data-value="desc">Giảm dần</option>
                                            </select>
                                        </div>
                                        <div id="sort-review">
                                            @foreach ($film->user as $key => $user)
                                            <div class="comment-disactive" id="comment_{{ $key }}">
                                                <div class="mv-user-review-item">
                                                    <div class="user-infor">
                                                        <img src="{{ asset('/storage/' . $user->image) }}" alt="" style="width: 42px; height: 42px">
                                                        <div>
                                                            <h3 class="user_comment">{{ $user->name }}</h3>
                                                            <div class="no-star">
                                                                @for ($i = 0; $i < 10; $i++)
                                                                    @if ($user->pivot->point - $i > 0)
                                                                        <i class="ion-android-star"></i>
                                                                    @else
                                                                        <i class="ion-android-star last"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            @foreach ($user->comment as $comment)
                                                                <p class="time time_comment">
                                                                    {{ $comment->pivot->updated_at }}
                                                                </p>
                                                                <p>{{ $comment->pivot->comment }}</p>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="topbar-filter">
                                            <label>Số bình luận trên 1 trang:</label>
                                            <select id="comment_per_page">
                                                <option data-value="5">5 bình luận</option>
                                                <option data-value="10">10 bình luận</option>
                                            </select>
                                            <div class="pagination" data-total_comment="{{ count($film->user) }}"></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="cast" class="tab">
                                    <div class="row">
                                        <h3>Đạo diễn và diễn viên của phim</h3>
                                        <h2>{{ $film->name }}</h2>
                                        <div class="title-hd-sm">
                                            <h4>Đạo diễn</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            <div class="cast-it">
                                                <div class="cast-left">
                                                    <img src="{{ asset('/storage/' . $film->director->image) }}" alt="" style="width: 40px; height: 40px">
                                                    <a href="#">{{ $film->director->name }}</a>
                                                </div>
                                                <p>{{ $film->director->job }}</p>
                                            </div>
                                        </div>
                                        <div class="title-hd-sm">
                                            <h4>Diễn viên</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            @foreach ($film->actor as $value => $actor)
                                                @if($value < 8)
                                                    <div class="cast-it">
                                                        <div class="cast-left">
                                                            <img src="{{ asset('/storage/' . $actor->image) }}" alt="" style="width: 40px; height: 40px">
                                                            <a href="#">{{ $actor->name }}</a>
                                                        </div>
                                                        <p>{{ $actor->job }}</p>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div id="season" class="tab">
                                    <div class="row">
                                        @foreach ($film->film_episode as $film)
                                            <div class="mvcast-item">
                                                <div class="cast-it">
                                                    <div class="cast-left series-it">
                                                        <img src="{{ asset('storage/' . $film->image) }}" alt="">
                                                        <div>
                                                            <a href="#">{{ $film->episode }}</a>
                                                            <p>{{ $film->content }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div id="moviesrelated" class="tab">
                                    <div class="row">
                                        <h3>Các phim liên quan đến phim</h3>
                                        <h2>{{ $film->name }}</h2>
                                        <div class="topbar-filter">
                                            <p style="width: 300px">Có <span>{{ count($filmRalated) }}</span> phim</p>
                                            <label style="width: 170px">Sắp xếp theo:</label>
                                            <select id="sort">
                                                <option id="show">Chọn trường</option>
                                                <option data-value="name">Tên phim</option>
                                                <option data-value="director">Đạo diễn</option>
                                                <option data-value="actor">Diễn viên</option>
                                                <option data-value="publisher">Hãng sản xuất</option>
                                                <option data-value="country">Quốc gia</option>
                                                <option data-value="released">Năm phát hành</option>
                                                <option data-value="rate">Đánh giá</option>
                                            </select>
                                            <label style="width: 100px">Thứ tự:</label>
                                            <select id="sort_by">
                                                <option data-value="asc">Tăng dần</option>
                                                <option data-value="desc">Giảm dần</option>
                                            </select>
                                        </div>
                                        <div class="flex-wrap-movielist user-fav-list">
                                            @foreach ($filmRalated as $key => $film)
                                            <div class="page-disactive" id="film_{{ $key }}">
                                                <div class="movie-item-style-2">
                                                    <img src="{{ '/storage/'.$film->image }}" alt="" style="height: 400px; width: 250px">
                                                    <div class="mv-item-infor">
                                                        <h6 class="name"><a href="#">{{ $film->name }} <span class="released time sm"> ( {{ date('Y', strtotime($film->released)) }} )</span></a></h6>
                                                        <p class="time sm-text">Đánh giá</p>
                                                        <p class="rate"><i class="ion-android-star"></i><span>{{ $film->rate }}</span> /10</p>
                                                        <p class="time sm-text">Nội dung</p>
                                                        <p class="describe">{{ $film->content }}</p>
                                                        <p class="run-time"> Thời lượng: 2h21’.<span>MMPA: PG-13.</span><span>Ngày phát hành: {{ date('d/m/Y', strtotime($film->released)) }}</span></p>
                                                        <p class="publisher">Hãng sản xuất: <a href="#">{{ $film->publisher->name }}</a></p>
                                                        <p class="director">Đạo diễn: <a href="#">{{ $film->director->name }}</a></p>
                                                        <p class="actor">Diễn viên:
                                                            @foreach ($film->actor as $actor)
                                                                <a href="#">{{ $actor->name }}</a>
                                                            @endforeach
                                                        </p>
                                                        <p class="country">Quốc gia: <a href="#">{{ $film->country->name }}</a></p>
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
                                            <div class="pagination2" data-total_films={{ count($filmRalated) }}></div>
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
@section('js')
    <script src="{{ asset('home/bower_components/twbs-pagination/jquery.twbsPagination.min.js') }}"></script>
    <script src="{{ asset('js/home/film/view.js') }}"></script>
    <script src="{{ asset('js/home/film/list.js') }}"></script>
@endsection
