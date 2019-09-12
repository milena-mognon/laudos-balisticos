$(function () {
    $('#tipo_municao').on('change', function () {
        let idSelecionado = $(this).val();
        if (idSelecionado === "cartucho") {
            $("#projetil").attr('disabled', false);
            $("#tipo_projetil").attr('disabled', false);
            $("#estojo").attr('disabled', false);
            $("#funcionamento").attr('disabled', false);
        }
        if (idSelecionado === "estojo") {
            $("#estojo").attr('disabled', false);
            $("#projetil").attr('disabled', true);
            $("#tipo_projetil").attr('disabled', true);
            $("#funcionamento").attr('disabled', true);
        }
        if (idSelecionado === "projétil") {
            $("#projetil").attr('disabled', false);
            $("#tipo_projetil").attr('disabled', false);
            $("#estojo").attr('disabled', true);
            $("#funcionamento").attr('disabled', true);
        }
    });
});
