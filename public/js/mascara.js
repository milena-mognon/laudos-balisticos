
$(document).ready(function() {
    $.fn.select2.defaults.set( "theme", "bootstrap" );

    $('.js-single-cidades').select2({
        placeholder: "Selecione uma Cidade"
    });
    $('.js-single-solicitante').select2({
        placeholder: "Selecione um Órgão Solicitante"
    });
});

$(".tamanho").mask('9,999');
