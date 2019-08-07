$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

$(".delete").on('click', function () {

    var $tr = $(this).closest("tr");

    url_with_id = $(this).val();
    console.log(url_with_id);

    Swal.fire({
        title: 'Tem certeza que deseja deletar?',
        text: "Esta ação não poderá ser revertida!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#108238',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Deletar!',
        cancelButtonText: 'Cancelar',

    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url_with_id,
                method: "DELETE",
                processData: false,
                contentType: false,
                dataType: "JSON",
                success() {
                    Toast.fire({
                        type: 'success',
                        title: 'Deletado com sucesso!'
                    })
                    $tr.fadeOut();
                },
                error() {
                    Toast.fire({
                        type: 'error',
                        title: 'Não foi possível deletar!'
                    })
                },
            });
        }
    })
});