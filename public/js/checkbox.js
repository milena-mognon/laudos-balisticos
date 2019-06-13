$(function () {

    $('#atual').on('change', function () {
        if($('#atual').val('on')){
            console.log('wwwww');
            $('#atual').val(1);
        } else {
            $('#atual').val(0);
        }
    });
});