$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () {
    if ($('#cidade_id').val() !== '') {
        var cidade_id = $('#cidade_id').val();
        var solicitante = $("#solicitante_id");
        filtrar_solicitantes(cidade_id, solicitante);
    }

    $('.js-single-cidades').on('change', function () {
        var cidade_id = $('#cidade_id').val();
        var solicitante = $("#solicitante_id");
        filtrar_solicitantes(cidade_id, solicitante);
    });

    function filtrar_solicitantes(cidade_id, solicitante) {
        $.ajax('solicitantes/cidade/' + cidade_id, {
            method: "GET",
            processData: false,
            contentType: false,
            dataType: "JSON",
            success(data) {
                solicitante.html("");
                $.each(data['data'], function (i, solicitante) {
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
    }
});


