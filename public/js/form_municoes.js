$(function () {
    var tipo_municao = $('#tipo_municao');
    var nao_deflagrado = $('#nao_deflagrado');
    var projetil = $("#projetil");
    var tipo_projetil = $("#tipo_projetil");
    var estojo = $("#estojo");
    var funcionamento = $("#funcionamento");
    var div_nao_deflagrado = $("#div_nao_deflagrado");

    if (tipo_municao.val() === 'estojo') {
        if_estojo();
    }
    if (tipo_municao.val() === 'cartucho') {
        if_cartucho();
    }
    if (tipo_municao.val() === 'projetil') {
        if_projetil();
    }

    tipo_municao.on('change', function () {
        if ($(this).val() === "cartucho") {
            if_cartucho();
        }
        if ($(this).val() === "estojo") {
            if_estojo();
        }
        if ($(this).val() === "projétil") {
            if_projetil();
        }
    });

    nao_deflagrado.on('change', function () {
        if ($(this).is(':checked')) {
            funcionamento.attr('disabled', true);
            $(this).val("true");
            funcionamento.val("ineficiente");
        } else {
            funcionamento.attr('disabled', false);
            $(this).val("false");
        }
    });

    function if_cartucho() {
        projetil.attr('disabled', false);
        tipo_projetil.attr('disabled', false);
        estojo.attr('disabled', false);
        funcionamento.attr('disabled', false);
        div_nao_deflagrado.show();
    }

    function if_estojo() {
        estojo.attr('disabled', false);
        projetil.attr('disabled', true);
        tipo_projetil.attr('disabled', true);
        funcionamento.attr('disabled', true);
        div_nao_deflagrado.hide();
    }

    function if_projetil() {
        projetil.attr('disabled', false);
        tipo_projetil.attr('disabled', false);
        estojo.attr('disabled', true);
        funcionamento.attr('disabled', true);
        div_nao_deflagrado.hide();
    }
});
