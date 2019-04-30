<div class="col-md-3 col-sm-12 col-xs-12">
    <div class="user-information">
        <div class="user-img">
            <a href="#"><img src="{{ $path }}" alt="" style="border-radius: 50%;"><br></a>
            <a href="#" class="redbtn">Thay đổi</a>
        </div>
        <div class="user-fav">
            <p>Chi tiết tài khoản</p>
            <ul>
                <li class="active"><a href="{{ route('home_user_profile_view_profile', ['id'=>$user->id]) }}">Hồ sơ người dùng</a></li>
                <li><a href="">Phim xem sau</a></li>
                <li><a href="">Phim đã thích</a></li>
                <li><a href="">Phim đã đánh giá</a></li>
                <li><a href="">Lịch sử xem phim</a></li>
            </ul>
        </div>
        <div class="user-fav">
            <p>Khác</p>
            <ul>
                <li><a href="#">Thay đổi mật khẩu</a></li>
                <li><a href="#">Đăng xuất</a></li>
            </ul>
        </div>
    </div>
</div>
