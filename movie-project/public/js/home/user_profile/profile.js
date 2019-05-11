$(document).ready(function () {
    $('#gender').select2();

    $('#role').select2();

    $('#country_id').select2();
    var countrySelected = $('#country_id').data('value');
    $('#country_id').val(countrySelected).trigger('change');

    $('#birth_day').datetimepicker({
        'format': 'YYYY/MM/DD',
        maxDate: new Date(),
        useCurrent: false,
    });
});
