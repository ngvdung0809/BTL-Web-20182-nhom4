$(document).ready(function () {
    $("#image").change(function(){
        readURL(this);
    });

    $('#gender').select2();

    $('#role').select2();

    $('#country_id').select2();

    $('#birth_day').datetimepicker({
        'format': 'YYYY/MM/DD',
        maxDate: new Date(),
        useCurrent: false,
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image_default').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
