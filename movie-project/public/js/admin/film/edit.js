$(document).ready(function () {
    $("#image").change(function(){
        readURLImage(this);
    });

    $("#trailer_link").change(function(){
        var $source = $('#trailer_link_default');
        $source[0].src = URL.createObjectURL(this.files[0]);
        $source.parent()[0].load;
    });

    $('#type_id').select2();

    $('#publisher_id').select2();

    $('#director_id').select2();

    $('.actor_id').select2();

    $('#country_id').select2();

    $('#released').datetimepicker({
        'format': 'YYYY/MM/DD',
        maxDate: new Date(),
        useCurrent: false,
    });
});

function readURLImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image_default').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
