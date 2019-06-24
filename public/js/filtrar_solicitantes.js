$(function () {
    $('#cidade_id').on('click', function () {
        var cidade_id = $('#cidade_id').val();
        $.ajax('solicitantes/cidade/' + cidade_id, {
            method: "GET",
            processData: false,
            contentType: false,
            dataType: "JSON",
            success(data) {
                $('#solicitante_id').html("");
                $.each(data['data'], function(i, solicitante) {
                    $("#solicitante_id").append($('<option>', {
                        value: solicitante.id,
                        text: solicitante.nome
                    }));
                });
            },
            error() {
                $('#solicitante_id').html("");
            },
        });
    });
});