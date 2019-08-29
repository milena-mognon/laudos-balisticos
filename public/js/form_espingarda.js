/*
* Espingardas
* */

$(function () {

    $('#disposicao_canos, #teclas_gatilho').attr('disabled', true);
    $('#tipo_carregador').attr('disabled', true);

    $('#num_canos').on('change', function () {

        if ($(this).val() === "dois") {
            $('#disposicao_canos, #teclas_gatilho').attr('disabled', false);
        } else {
            $('#disposicao_canos, #teclas_gatilho').attr('disabled', true);
        }
    });

    $('#sistema_funcionamento').on('change', function () {
        if ($(this).val() !== "unitário") {
            $('#tipo_carregador').attr('disabled', false);
        } else {
            $('#tipo_carregador').attr('disabled', true);
        }
    });

    $('#sistema_carregamento').on('change', function () {

        if ($(this).val() === "antecarga") {
            $('#chave_abertura').attr('disabled', true);
        } else {
            $('#chave_abertura').attr('disabled', false);
        }
    });
});