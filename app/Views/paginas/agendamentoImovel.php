<?php
$diaHoje = date('Y-m-d');

// var_dump($dados);
?>


<div class="container py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= URL ?>/Paginas/imovelSelecionado/<?= $dados['imovel']->id_imovel ?>">Imóvel <?= '#00' . $dados['imovel']->id_imovel?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Agendamento imóvel <?= '#00' . $dados['imovel']->id_imovel ?> </li>
        </ol>
    </nav>
    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light rounded-3">
                <h2>Agendamento de visita</h2>
                <form name="agendamento" method="POST" action="<?= URL . '/Paginas/confirmaAgendamento/' . $dados['imovel']->id_imovel ?>">
                    <p class="mt-3"><b>Rogério do Amaral</b> irá lhe acompanhar nesta visita.</p>

                    <h4 class="mt-4">Escolha um dia</h4>

                    <div class="mt-4">
                        <input type="date" class="form-control" id="txtDataVisita" name="txtDataVisita" value="" min="<?= $diaHoje ?>">
                    </div>

                    <h4 class="mt-4">Escolha um horário</h4>

                    <div class="mt-4">
                        <input type="time" class="timepicker confirma" name="txtHoraVisita" id="txtHoraVisita">
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-amaral">
                            Continuar
                        </button>
                    </div>
                </form>
            </div>

        </div>

        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <img src="<?= URL . '/img/calendar.png' ?>" alt="" class="img-fluid">
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {

        // $("#txtDataVisita").change(function() {
        //     valor = $("#txtDataVisita").val();
        //     let data_americana = valor;
        //     let data_brasileira = data_americana.split('-').reverse().join('/');
        //     console.log(data_brasileira);
        //     $("#recebeValor").val(data_brasileira);
        // });


        $('.timepicker').qcTimepicker();

    });




    $('.timepicker').qcTimepicker({

        // additional CSS classes
        classes: 'form-control',

        // time format
        format: 'H:mm',

        // min/max time
        minTime: '09:00:00',
        maxTime: '18:00:00',

        // step size in ms
        step: 900,

        // custom placeholder
        placeholder: '--:--',

    });
</script>