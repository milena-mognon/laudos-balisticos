var arma_id;

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
    dictFileTooBig: 'Image is larger than 16MB',
    timeout: 10000,
    autoProcessQueue: false,
    parallelUploads: 1,

    init: function () {
        var _this = this;
        _this.hiddenFileInput.removeAttribute('multiple');
        this.on("thumbnail", function (file) {
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
        });

        this.on("removedfile", function (file) {
            imageId = file.previewElement.childNodes[3].id;

            if(imageId!=='image-id'){
                $.ajax({
                    url: '/destroy_armas_images',
                    data: {id: imageId},
                    method: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        alert('Imagem removida com sucesso!');
                    },
                    error: function () {
                        alert('Não foi possivel remover a imagem!');
                    }
                });
            }
        });

        this.on("addedfiles", function (files) {
            if (files.length > 1) {
                alert('arrate apenas 1 arquivo por vez');
                files.destroy(); // funcionamento não está correto
            }
        });
    },
};