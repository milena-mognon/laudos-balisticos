var arma_id;
var cancelar = false;
var interromper = false;

$('.addImagem').on('click', function () {
    $("#imagem-modal").modal();
    arma_id = $(this).val();
});

Dropzone.options.myDropzone = {
    maxFilesize: 16,
    acceptedFiles: "image/*",
    previewTemplate: document.querySelector('#preview').innerHTML,
    addRemoveLinks: true,
    dictRemoveFile: "Remover Imagem",
    dictFileTooBig: 'A imagem é maior que 16MB. Limite de tamanho excedido!',
    dictDefaultMessage: 'Arraste uma imagem ou clique para selecionar',
    dictMaxFilesExceeded: 'Quantidade máxima de arquivos atingida. Imagem não foi salva!',
    timeout: 10000,
    autoProcessQueue: false,
    parallelUploads: 1,
    maxFiles: 3,

    init: function () {
        myDropzone = this;
        var _this = this;
        _this.hiddenFileInput.removeAttribute('multiple');
        this.on("thumbnail", function (file) {
            if(!cancelar && !interromper){
                $('#crop-modal').modal();
                var image_holder = $('#image-holder');
                image_holder.empty();
                $('<img />', {
                    'src': file.dataURL,
                    'id': 'image',
                    'style': 'max-width: 750px',
                }).appendTo(image_holder);
                $('<input>', {
                    'id': 'arma_id',
                    'type': 'hidden',
                    'value': arma_id,
                }).appendTo(image_holder);
                $("#image").cropper({
                    minContainerWidth: 750,
                    minContainerHeight: 400,
                    zoomable: false
                });
                image_holder.show();
                $('.dz-progress').hide();
                _this.hiddenFileInput.removeAttribute('multiple');
            }

        });

        // this.on("removedfile", function (file) {
        //     imageId = file.previewElement.childNodes[3].id;
        //
        //     if(imageId!=='image-id'){
        //         $.ajax({
        //             url: '/destroy_armas_images',
        //             data: {id: imageId},
        //             method: 'POST',
        //             dataType: 'json',
        //             success: function (data) {
        //                 Swal.fire('Imagem removida com sucesso!');
        //             },
        //             error: function () {
        //                 Swal.fire('Não foi possivel remover a imagem!');
        //             }
        //         });
        //     }
        // });

        this.on("addedfiles", function (files) {
            if (files.length > 1) {
                Swal.fire('Arraste apenas 1 (um) arquivo por vez!');
                interromper = true;
                files.destroy();
            } else {
                interromper = false;
            }
        });

        this.on("maxfilesexceeded", function () {
            Swal.fire("Limite Atingido!");
            cancelar = true;
        });
    },
};

$('.concluir-upload').on('click', function () {
    Dropzone.forElement("#my-dropzone").removeAllFiles(true);
    cancelar = false;
    interromper = false;
});