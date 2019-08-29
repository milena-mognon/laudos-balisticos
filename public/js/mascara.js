
$(document).ready(function() {
    $.fn.select2.defaults.set( "theme", "bootstrap" );

    $('.js-single-cidades').select2({
        placeholder: "Selecione uma Cidade",
        language: 'pt-BR'
    });
    $('.js-single-solicitante').select2({
        placeholder: "Selecione um Órgão Solicitante",
        language: 'pt-BR'
    });
    $('.js-single-secoes, .js-single-diretores').select2({
        language: 'pt-BR'
    });
    $('.js-single-marcas').select2({
        placeholder: "Selecione uma Marca",
        language: 'pt-BR'
    });
    $('.js-single-calibres').select2({
        placeholder: "Selecione um Calibre",
        language: 'pt-BR'
    });
    $('.js-single-origens').select2({
        placeholder: "Selecione um País de Origem",
        language: 'pt-BR'
    });
    $('.js-single-select').select2({
        placeholder: "Selecione",
        language: 'pt-BR',
        minimumResultsForSearch: -1
    });
    $('.js-single').select2({
        language: 'pt-BR',
        minimumResultsForSearch: -1
    });
});

$(".tamanho").mask('9,999');
