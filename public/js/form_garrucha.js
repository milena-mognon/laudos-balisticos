/*
* Garruchas
* */

$(function () {

    if ($('#num_canos').val() !== "dois") {
        $('#disposicao_canos, #teclas_gatilho').attr('disabled', true);
    }

    $('#num_canos').on('change', function () {

        if ($(this).val() === "dois") {
            $('#disposicao_canos, #teclas_gatilho').attr('disabled', false);
        } else {
            $('#disposicao_canos, #teclas_gatilho').val('');
            $('#disposicao_canos, #teclas_gatilho').attr('disabled', true);
        }
    });
});