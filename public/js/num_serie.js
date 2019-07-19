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
                $("#num_serie").prop('disabled', true);
                break;
        }
    });
    $('#tipo_serie').trigger("change");
});
