$(function () {
    $('.search-button').on('click', function () {
        var input_value = $('.search-input').val();
        var route = $(this).val();
        if (!input_value) {
            Swal.fire({
                text: 'Digite o número da REP que deseja procurar!',
            });
        } else {
            $.ajax(route + "/search/" + input_value, {
                method: "GET",
                processData: false,
                contentType: false,
                dataType: "JSON",
                success(data) {
                    if (data.response) {
                        $('.table-search tr').remove();
                        mostrar_resultado_pesquisa(data.result);
                        console.log('hahahhahaha');
                    } else {
                        Swal.fire({
                            text: 'Não foi encontrado nenhum laudo com este número!',
                        });
                    }
                },
                error() {

                },
            });
        }
    })
});

function mostrar_resultado_pesquisa(laudo) {
    var newRow = $("<tr>");
    var cols = "";
    cols += coluna(laudo.rep);
    cols += coluna(laudo.oficio);
    cols += coluna(laudo.cidade);
    cols += coluna(laudo.solicitante);
    cols += '<td>';
    cols += buttons(laudo);
    cols += '</td>';
    newRow.append(cols);
    $(".table-search").append(newRow);
}

function coluna(valor) {
    return '<td>' + valor + '</td>';
}

function buttons(laudo) {
    visualizar_button(laudo);
    deletar_button(laudo);
}

function visualizar_button(laudo) {
    return '<a class="btn btn-primary mt-1" href="{{ route(\'laudos.show\', ' + laudo + ') }}"><i class="fa fa-fw fa-eye"></i> Visualizar</a>';
}

function deletar_button(laudo) {
    return '<button value="{{ route(\'laudos.destroy\', ' + laudo + ') }}" class="btn btn-danger delete mt-1"><i class="fa fa-fw fa-trash"></i>Deletar</button>';
}