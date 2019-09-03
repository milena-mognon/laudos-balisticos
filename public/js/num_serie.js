$(function () {
    $('#tipo_serie').on('change', function () {
        let selected = $(this).val(); //construir o id
        switch (selected) {
            case 'legível':
            case 'revelado':
            case 'regravado':
                $("#num_serie").prop('disabled', false); //mostrar o elemento
                break;
            case 'ilegível':
            case 'suprimido intencionalmente':
            case 'não aparente':
            case 'adulterado':
                $('#num_serie').val("");
                $("#num_serie").prop('disabled', true);
                break;
        }
    });
    $('#tipo_serie').trigger("change");

    $('.submit_arma_form').on('click', function (e) {
        switch ($('#tipo_serie').val()) {
            case 'legível':
            case 'revelado':
            case 'regravado':
                if ($('#num_serie').val() === '') {
                    e.preventDefault();
                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: "É obrigatório preencher o número de série!",
                    });
                }
                break;
        }
    })
});
