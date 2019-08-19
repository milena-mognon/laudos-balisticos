$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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
                console.log(data.size);
                if(data){
                    $("#solicitante_id").append($('<option>', {
                        text: 'Selecione uma Cidade'
                    }));
                }
                $("#solicitante_id").append($('<option>', {
                    id: 'cadastrar_solicitante',
                    text: 'Cadastrar Opção'
                }));
            },
            error() {
                $('#solicitante_id').html("");
                $("#solicitante_id").append($('<option>', {
                    text: 'Selecione uma Cidade'
                }));
                $("#solicitante_id").append($('<option>', {
                    id: 'cadastrar_solicitante',
                    text: 'Cadastrar Opção'
                }));
            },
        });
    });
});