$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.social-btn').on('click', '#user_watch_later', function(){
        let userId = $(this).data('user_id');
        if(userId == -1){
            toastr.error('Bạn hãy đăng nhập để lưu phim vào danh sách xem sau');
        }else{
            let filmId = $(this).data('film_id');
            let value = $(this).data('value');
            let formData = {
                value: value,
            };
            $.ajax({
                type: "POST",
                url: '/home/user/' + userId + '/watch_later/film/' + filmId,
                dataType: 'json',
                data: formData,
                success: function(data) {
                    if(data.watch_later == 1){
                        $('#user_watch_later').empty();
                        $('#user_watch_later').append('<i class="ion-ios-pricetag"></i> Đã thêm vào Xem sau');
                        $('#user_watch_later').attr('data-value', 1);
                        toastr.success('Bạn đã thêm phim vào danh sách xem sau');
                    }else{
                        $('#user_watch_later').empty();
                        $('#user_watch_later').append('<i class="ion-ios-pricetag-outline"></i> Xem sau');
                        $('#user_watch_later').attr('data-value',0);
                        toastr.success('Bạn đã loại phim ra khỏi danh sách xem sau');
                    }
                },
                error: function (data) {
                    toastr.error('Lỗi khi thực hiện chức năng này');
                }
            });
        }
    });

    $('.social-btn').on('click', '#user_like', function(){
        let userId = $(this).data('user_id');
        if(userId == -1){
            toastr.error('Bạn hãy đăng nhập để để thực hiện chức năng thích');
        }else{
            let filmId = $(this).data('film_id');
            let value = $(this).data('value');
            let formData = {
                value: value,
            };
            $.ajax({
                url: '/home/user/' + userId + '/like/film/' + filmId,
                type: "POST",
                dataType: 'json',
                data: formData,
                success: function(data) {
                    console.log(data);
                    if(data.liked == 1){
                        $('#user_like').empty();
                        $('#user_like').append('<i class="ion-ios-heart"></i> Đã Thích');
                        $('#user_like').attr('data-value', 1);
                        toastr.success('Bạn đã thích phim');
                    }else{
                        $('#user_like').empty();
                        $('#user_like').append('<i class="ion-ios-heart-outline"></i> Thích');
                        $('#user_like').attr('data-value', 0);
                        toastr.success('Bạn đã bỏ thích với phim này');
                    }
                },
                error: function (data) {
                    toastr.error('Lỗi khi thực hiện chức năng này');
                }
            });
        }
    });

    $('.social-btn').on('click', '.user_share', function(){
        let user_id = $(this).data('user_id');
        if(user_id == -1){
            toastr.error('Bạn hãy đăng nhập để thực hiện chức năng chia sẻ phim');
        }else{
            let film_id = $(this).data('film_id');
            let value = $(this).data('value');
            toastr.error('Chức năng này tạm thời chưa hoạt động');
        }
    });
});

