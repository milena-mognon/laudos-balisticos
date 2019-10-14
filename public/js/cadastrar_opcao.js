$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () {
    $('#solicitante_id').on('change', function () {
        if ($('#solicitante_id').val() === 'Cadastrar Opção') {
            $("#solicitante_modal").modal();
        }
    });

    $('#cadastro_solicitante').on('click', function () {
        let nome2 = $('#nome_solicitante').val();
        let cidade_id2 = $("#cidade2").val();

        if (nome2.length < 8) {
            swal.fire({
                type: 'error',
                title: 'Erro!',
                text: 'O nome do órgão solicitante deve ter ao menos 8 caracteres!'
            });
        } else {
            $.ajax({
                url: "/solicitantes/",
                type: "POST",
                data: {
                    "nome": nome2,
                    "cidade_id": cidade_id2,
                },
                success: function (data) {
                    $('#solicitante_modal').modal('hide');
                    $('#solicitante_id').append($('<option>', {
                        value: data['id'],
                        text: data['nome']
                    }));
                    $("#solicitante_id").val(data['id']);
                },
                error: function () {
                    swal.fire('Existem erros no formulário!')
                }
            });
        }
    });
    // /*---------------------------------------------------------*/
    let marca_id = $('#marca_id');
    marca_id.on('change', function () {
        if ($(this).val() === "cadastrar_marca") {
            $("#marca-modal").modal();
        }
    });
    marca_id.trigger("change");

    $('#cadastroMarca').on('click', function () {
        let nome_marca = $('#nome').val();
        let categoria = $("#categoria").val();

        $.ajax({
            url: "/marcas",
            type: "POST",
            data: {'nome': nome_marca, 'categoria': categoria },
            success: function (data) {
                console.log(data['id']);
                $('#marca-modal').modal('hide');
                marca_id.append($('<option>', {
                    value: data['id'],
                    text: data['nome']
                }));
                marca_id.val(data['id']);
            }
        });
    });
    //
    // /*-------------------------------------------------------*/
    // $('#calibre').on('change', function () {
    //     let idSelecionado = $(this).val();
    //     if (idSelecionado == "outroCalibre") {
    //         $("#calibre-modal").modal();
    //     }
    // });
    // $('#calibre').trigger("change");
    // $('#cadastroCalibre').on('click', function () {
    //     let calibre = $('#nome_calibre').val();
    //     let tipo = $("#tipo_calibre").val();
    //     $.ajax({
    //         url: "/calibre/",
    //         type: "POST",
    //         data: {
    //             "calibre": calibre,
    //             "cal_extenso": null,
    //             "tipo": tipo,
    //         },
    //         success: function (data) {
    //             $('#calibre-modal').modal('hide');
    //             $('#calibre').append($('<option>', {
    //                 value: data['id'],
    //                 text: data['calibre']
    //             }));
    //             $("#calibre").val(data['id']);
    //         }
    //     });
    // });
    // /*------------------------------------------------------------*/
    //
    // $('#pais').on('change', function () {
    //     let idSelecionado = $(this).val();
    //     if (idSelecionado == "outroPais") {
    //         $("#pais-modal").modal();
    //     }
    // });
    // $('#pais').trigger("change");
    // $('#cadastroPais').on('click', function () {
    //     let pais = $('#nome_pais').val();
    //     let fabricacao = $("#fabricacao").val();
    //     $.ajax({
    //         url: "/origem/",
    //         type: "POST",
    //         data: {
    //             "nome": pais,
    //             "fabricacao": fabricacao,
    //         },
    //         success: function (data) {
    //             $('#pais-modal').modal('hide');
    //             $('#pais').append($('<option>', {
    //                 value: data['id'],
    //                 text: data['nome']
    //             }));
    //             $("#pais").val(data['id']);
    //         }
    //     });
    // });
});
