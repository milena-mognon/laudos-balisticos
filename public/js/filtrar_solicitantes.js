$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () {
    $('.js-single-cidades').on('change', function () {
        var cidade_id = $('#cidade_id').val();
        var solicitante = $("#solicitante_id");
        $.ajax('solicitantes/cidade/' + cidade_id, {
            method: "GET",
            processData: false,
            contentType: false,
            dataType: "JSON",
            success(data) {
                solicitante.html("");
                $.each(data['data'], function(i, solicitante) {
                    $("#solicitante_id").append($('<option>', {
                        value: solicitante.id,
                        text: solicitante.nome
                    }));
                });
                solicitante.append($('<option>'));
                solicitante.append($('<option>', {
                    id: 'cadastrar_solicitante',
                    text: 'Cadastrar Opção',
                }));
            },
            error() {
                solicitante.html("");
                solicitante.append($('<option>'));
                solicitante.append($('<option>', {
                    id: 'cadastrar_solicitante',
                    text: 'Cadastrar Opção',
                }));
            },
        });
    });
});


