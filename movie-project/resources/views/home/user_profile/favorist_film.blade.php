@extends('home.layout')
@section('title', 'Hồ sơ người dùng')
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
    @include('home.user_profile.header', ['pageHeader'=>$user->name, 'pageNow'=>'Phim yêu thích'])
    @include('home.user_profile.user_film', ['user'=>$user, 'films'=>$films])
@endsection
@section('js')
    <script src="{{ asset('js/home/user_profile/change_avatar.js') }}"></script>
    <script src="{{ asset('home/bower_components/twbs-pagination/jquery.twbsPagination.min.js') }}"></script>
    <script src="{{ asset('js/home/user_profile/favorist_film.js') }}"></script>
@endsection
