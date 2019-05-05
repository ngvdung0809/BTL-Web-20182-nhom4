$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#change_avatar').on('submit', function(e) {
        e.preventDefault();
        var userId = $('#image_directly').data('user_id');
        var formData = new FormData(this);
        $.ajax({
            url: '/home/user/change_avatar/' + userId,
            type: "POST",
            dataType: 'json',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data) {
                $('#image_main').attr('src', '/storage/' + data.image);
                $('#image_show_profile').attr('src', '/storage/' + data.image);
                toastr.success('Thay đổi ảnh đại diện thành công');
            },
            error: function (data) {
                toastr.error('Lỗi thay đổi ảnh đại diện');
            }
        });
    });

    $("#image_directly").change(function(){
        readURLDirectly(this);
    });
    $("#image_profile").change(function(){
        readURLProfile(this);
    });
});

function readURLDirectly(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image_show_directly').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function readURLProfile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image_show_profile').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
