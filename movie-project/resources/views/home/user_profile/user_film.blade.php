<div class="page-single" id="favorist_film" data-user_id="{{ $user->id }}">
    <div class="container">
        <div class="row ipad-width">
            @include('home.user_profile.side_bar', ['path'=>'/storage/'.$user->image, 'active'=>$active])
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
                    <option data-value="rate">Đánh giá Trung bình</option>
                    @if($active == 'Film Rate')
                    <option data-value="point">Bạn đánh giá</option>
                    @endif
                    <option data-value="status">Trạng thái</option>
                </select>
                <label>Thứ tự:</label>
                <select id="sort_by">
                    <option data-value="asc">Tăng dần</option>
                    <option data-value="desc">Giảm dần</option>
                </select>
                <a href="{{ route('home_user_profile_view_favorist_film', ['user_id'=>$user->id]) }}" class="list"><i class="ion-ios-list-outline active"></i></a>
                <a  href="#" class="grid"><i class="ion-grid "></i></a>
            </div>
            <div class="flex-wrap-movielist user-fav-list">
                @foreach ($films as $key => $film)
                    <div class="page-disactive" id="film_{{ $key }}">
                        <div class="movie-item-style-2 userrate">
                            <img src="{{ '/storage/'.$film->image }}" alt="" style="height: 400px; width: 250px">
                            <div class="mv-item-infor">
                                <h6 class="name"><a  href="{{ route('home_view_film', ['id'=>$film->id]) }}">{{ $film->name }} <span class="released time sm"> ( {{ date('Y', strtotime($film->released)) }} )</span></a></h6>
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
                                @if($active == 'Film Rate')
                                    <p class="time sm-text">Bạn Đánh giá</p>
                                    <p class="point"><i class="ion-android-star"></i><span>{{ $film->point }}</span> /10</p>
                                @endif
                                    <p class="time sm-text">Đánh giá Trung bình</p>
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

                <div class="pagination2" data-total_films={{ count($films) }}>
                </div>
            </div>
        </div>
    </div>
</div>
