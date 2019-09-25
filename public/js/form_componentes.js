/*
* Componentes
* */

$(function () {

    if ($('#componente').val() !== "Pólvora") {
        $('#tamanho').show();
    } else {
        $('#tamanho').hide();
    }
});