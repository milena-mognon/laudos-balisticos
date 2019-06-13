{!! Html::script('js/jquery.js') !!}
{!! Html::script('js/app.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}

{!! Html::script('js/jquery.maskedinput.js') !!}
{!! Html::script('jquery-ui-1.12.1.custom/jquery-ui.js') !!}
{!! Html::script('js/calendar.js') !!}
{!! Html::script('js/checkbox.js') !!}
{!! Html::script('tinytoggle/js/tiny-toggle.js') !!}


{{--{!! Html::script('js/myJS.js') !!}--}}
{{--{!! Html::script('js/espingarda.js') !!}--}}
{{--{!! Html::script('js/num-serie.js') !!}--}}
{{--{!! Html::script('js/mascara.js') !!}--}}
{{--{!! Html::script('js/municoes.js') !!}--}}
{{--{!! Html::script('js/outro.js') !!}--}}
{{--{!! Html::script('js/cropper.js') !!}--}}
{{--{!! Html::script('js/newImageCrop.js') !!}--}}
{{--{!! Html::script('js/sweetalert2.min.js') !!}--}}
{{--{!! Html::script('js/componentes.js') !!}--}}


<script type="text/javascript">

    $("#calendario").datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    });

    $("#calendario2").datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    });
</script>
