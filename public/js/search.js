$(function () {
    $('.search-button').on('click', function () {
        var input_value = $('.search-input').val();
        input_value = input_value.replace("/", "-");
        var route = $(this).val();
        if (!input_value) {
            Swal.fire({
                title: 'Digite algo antes de pesquisar! ',
            });
        } else {
            $.ajax(route + "/search/" + input_value, {
                method: "GET",
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (retorno) {
                    if (retorno.fail) {
                        Swal.fire({
                            text: retorno.message,
                        });
                    } else {
                        window.location = retorno.url;
                    }
                }
            });
        }
    })
});