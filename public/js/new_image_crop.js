$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


/*-------------- abre o modal para escolher/adicionar imagem ------------*/
$('#addImagem').on('click', function () {
    $("#imagem-modal").modal();
});

/*-------------- abre o modal para visualizar a imagem (nos formulario de create, não edit)*/
$('#visualizarImagem').on('click', function () {
    $("#ver-imagem-modal").modal();
});

/*-------------- abre o modal para visualizar imagem nos formularios edit*/
$('#visualizarImagemEdit').on('click', function () {
    $("#ver-imagem-modal").modal();
    $('#div-ver-imagem').empty();
    console.log($('#ref_imagem').val());
    if ($('#ref_imagem').val() != "" && $('#ref_imagem').val() != null) {
        $('#div-ver-imagem').append($('<img>', {
            style: "max-width:750px;",
            src: "/upload/" + $('#ref_imagem').val()
        }));
    } else {
        $('#div-ver-imagem').append($('<h3>', {
            text: "Nenhuma imagem salva para exibir!"
        }));
    }

});

/*------------ upload da imagem ---------*/
$("#fileUpload").on('change', function () {

    if (typeof (FileReader) != "undefined") {

        image_holder = $("#image-holder");
        image_holder.empty();

        reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "id": "image",
                "style": "max-width: 750px"
            }).appendTo(image_holder);
            $("#image").cropper();
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else {
        alert("Este navegador nao suporta FileReader.");
    }
});

/*-------------- Girar Imagem -------------------*/
$('#girarDireita').on('click', function () {
    $('#image').cropper('rotate', 90);
});
$('#girarEsquerda').on('click', function () {
    $('#image').cropper('rotate', -90);
});

/*-------------- crop da imagem e post com ajax */
$("#uploadCroppedImage").on('click', function () {

    $('#image').cropper('getCroppedCanvas', {
        imageSmoothingQuality: 'high',
    }).toBlob(function (blob) {
        const formData = new FormData();

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        id = $('#arma_id').val();
        console.log("id" + id);

        formData.append('croppedImage', blob);
        formData.append('arma_id', id);

        $.ajax({
            url: '/imagem',
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success(data) {
                $('#imagem-modal').modal('hide');
                Toast.fire({
                    type: 'success',
                    title: 'Imagem salva com sucesso!'
                })

                $('#div-ver-imagem').empty();
                $('#ref_imagem').val(data['nome'])
                $('#div-ver-imagem').append($('<img>', {
                    style: "max-width:750px;",
                    src: "/upload/" + $('#ref_imagem').val()
                }));
            },
            error() {
                Toast.fire({
                    type: 'error',
                    title: 'Não foi possível salvar esta imagem!'
                })
            },
        });
    });
});


/*---------------deletar imagem------------------------*/
$("#bt-delete-imagem").on('click', function () {

    id = $("#arma_id").val();

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    Swal.fire({
        title: 'Tem certeza que deseja deletar esta imagem?',
        text: "Esta ação não poderá ser revertida!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#108238',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Deletar!',
        cancelButtonText: 'Cancelar',

    }).then((result) => {
        console.log(result.value);
        if (result.value) {
            $.ajax({
                url: "/arma/imagem/" + id,
                method: "DELETE",
                processData: false,
                contentType: false,
                dataType: "JSON",
                success() {
                    Toast.fire({
                        type: 'success',
                        title: 'Deletado com sucesso!'
                    })
                    $('#div-ver-imagem').empty();
                    $('#ref_imagem').val("");
                    $('#bt-delete-imagem').val("");
                    $('#ver-imagem-modal').modal('hide');
                },
                error() {
                    Toast.fire({
                        type: 'error',
                        title: 'Não foi possível deletar este material!'
                    })
                },
            });
        }
    })
});
