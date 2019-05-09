<div class="col-md-3 col-sm-12 col-xs-12">
    <div class="user-information">
        <div class="user-img">
            <a href="#"><img src="{{ $path }}" alt="" style="border-radius: 50%;" id="image_main"><br></a>
            <button class="redbtn changeAvatarLink">Thay đổi</button>
        </div>
        <div class="user-fav">
            <p>Chi tiết tài khoản</p>
            <ul>
                <li class="{{ $active == 'Profile' ? 'active' : '' }}"><a href="{{ route('home_user_profile_view_profile', ['user_id'=>$user->id]) }}">Hồ sơ người dùng</a></li>
                <li class="{{ $active == 'Film Watch Later' ? 'active' : '' }}"><a href="{{ route('home_user_profile_view_film_watch_later', ['user_id'=>$user->id]) }}">Phim xem sau</a></li>
                <li class="{{ $active == 'Favorist Film' ? 'active' : '' }}"><a href="{{ route('home_user_profile_view_favorist_film', ['user_id'=>$user->id]) }}">Phim yêu thích</a></li>
                <li class="{{ $active == 'Film Rate' ? 'active' : '' }}"><a href="{{ route('home_user_profile_view_film_review', ['user_id'=>$user->id]) }}">Phim đã đánh giá</a></li>
                <li class="{{ $active == 'Film Watch History' ? 'active' : '' }}"><a href="{{ route('home_user_profile_view_film_watch_history', ['user_id'=>$user->id]) }}">Lịch sử xem phim</a></li>
            </ul>
        </div>
        <div class="user-fav">
            <p>Khác</p>
            <ul>
                <li class="{{ $active == 'Change PassWord' ? 'active' : '' }}"><a href="{{ route('home_user_profile_view_change_password', ['user_id'=>$user->id]) }}">Thay đổi mật khẩu</a></li>
                <li><a href="#">Đăng xuất</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="login-wrapper" id="changeAvatar-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h4 style="text-align: center">Thay đổi ảnh đại diện</h4><br>
        <form id="change_avatar" action="javascript:void(0)" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <a href="#"><img src="{{ $path }}" alt="" style="border-radius: 50%;" id="image_show_directly"><br></a>
                    <div class="col-md-8 col-md-offset-2">
                        <label for="image_directly" class="redbtn" style="text-align: center">Chọn ảnh</label>
                    </div>
                </div>
                <input type="file" id="image_directly" name="image_directly" accept="image/*" class="redbtn" style="width: 100%; display: none;" data-user_id="{{ $user->id }}" required>
            </div>
            <div class="row">
                <button type="submit">Thay đổi</button>
            </div>
        </form>
    </div>
</div>
