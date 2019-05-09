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
                    <option data-value="director">Đạo diễn</option>
                    <option data-value="actor">Diễn viên</option>
                    <option data-value="publisher">Hãng sản xuất</option>
                    <option data-value="country">Quốc gia</option>
                    <option data-value="released">Năm phát hành</option>
                    <option data-value="rate">Đánh giá</option>
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

                <div class="pagination2" data-total_films={{ count($films) }}>
                </div>
            </div>
        </div>
    </div>
</div>
