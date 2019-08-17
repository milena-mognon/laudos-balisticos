$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
/*-------------- crop da imagem e post com ajax */
$("#uploadCroppedImage").on('click', function () {

    var arma_id = $('#arma_id').val();
    $('#image').cropper('getCroppedCanvas', {
        imageSmoothingQuality: 'high',
    }).toBlob(function (blob) {
        const formData = new FormData();
        formData.append('croppedImage', blob);
        // formData.append('arma_id', arma_id);

        $.ajax({
            url: 'armas/' + arma_id + '/images',
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success(data) {
                id = data['image']['id'];
                filename = data['image']['filename'];
                $('#crop-modal').modal('hide');
                $('#image-id').prop('id', id);
                $('#filenamechange').remove();
                filename = "<div class=dz-filename><span data-dz-name>" + filename + " </span></div>";
                $('#' + id).append(filename);
            },
            error() {
                alert('Erro ao salvar!');
            },
        });
    });
});