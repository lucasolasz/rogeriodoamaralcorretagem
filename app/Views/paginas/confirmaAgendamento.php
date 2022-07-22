<?php
$diaHoje = date('Y-m-d');
// var_dump($dados);

// var_dump($dados['txtDataVisita']);
// exit();

$data = date('D', strtotime($dados['txtDataVisita']));
$mes = date('M', strtotime($dados['txtDataVisita']));
$dia = date('d', strtotime($dados['txtDataVisita']));
$ano = date('Y', strtotime($dados['txtDataVisita']));

$semana = array(
    'Sun' => 'Domingo',
    'Mon' => 'Segunda-Feira',
    'Tue' => 'Terca-Feira',
    'Wed' => 'Quarta-Feira',
    'Thu' => 'Quinta-Feira',
    'Fri' => 'Sexta-Feira',
    'Sat' => 'Sábado'
);

$mes_extenso = array(
    'Jan' => 'Janeiro',
    'Feb' => 'Fevereiro',
    'Mar' => 'Marco',
    'Apr' => 'Abril',
    'May' => 'Maio',
    'Jun' => 'Junho',
    'Jul' => 'Julho',
    'Aug' => 'Agosto',
    'Nov' => 'Novembro',
    'Sep' => 'Setembro',
    'Oct' => 'Outubro',
    'Dec' => 'Dezembro'
);

$aluguel = $dados['imovel']->mo_aluguel / 100;
$venda = $dados['imovel']->mo_venda / 100;
$condominio = $dados['imovel']->mo_condominio / 100;
$iptu = $dados['imovel']->mo_iptu / 100;
$incendio = $dados['imovel']->mo_seguro_incendio / 100;
$servico = $dados['imovel']->mo_taxa_de_servico / 100;

$totalAluguel = ($aluguel + $condominio + $iptu + $incendio + $servico);

$totalVenda = ($venda + $condominio + $iptu);

$dataPorExenso = $semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"];


// echo $totalAluguel;
// echo $semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}";
// exit();
?>



<div class="container py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= URL ?>/Paginas/imovelSelecionado/<?= $dados['imovel']->id_imovel ?>">Imóvel <?= '#00' . $dados['imovel']->id_imovel ?></a></li>
            <li class="breadcrumb-item"><a href="<?= URL ?>/Paginas/agendamentoImovel/<?= $dados['imovel']->id_imovel ?>">Agendamento imóvel <?= '#00' . $dados['imovel']->id_imovel ?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Confirma agendamento imóvel <?= '#00' . $dados['imovel']->id_imovel ?> </li>
        </ol>
    </nav>
    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light rounded-3">
                <h2>Revise e confirme sua visita</h2>

                <h4 class="p-2 mt-4 transparente"><i class="fa-solid fa-calendar-days"></i>&nbsp&nbsp&nbsp&nbsp<?= $dataPorExenso . ' às ' . Checa::horaFormat($dados['txtHoraVisita']) ?></h4>

                <h4 class="p-2 mt-4 transparente"><i class="fa-solid fa-location-dot"></i>&nbsp&nbsp&nbsp&nbsp<?= ucfirst($dados['imovel']->ds_rua_imovel) . ' - ' . $dados['imovel']->ds_bairro . ', Rio de Janeiro ' ?></h4>

                <?php if ($dados['imovel']->fk_tipo_negociacao == 1) { ?>
                    <h4 class="total">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?= 'R$ ' . number_format($totalVenda, 2, ",", ".") ?></h4>
                <?php } else { ?>
                    <h4 class="total">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?= 'R$ ' . number_format($totalAluguel, 2, ",", ".") ?></h4>
                <?php } ?>


                <a href="<?= URL . '/Paginas/imovelSelecionado/' . $dados['imovel']->id_imovel ?>" class="btn text-start">
                    <div class="row p-2 mt-4 quadrado">
                        <h5><?= $dados['imovel']->ds_tipo_imovel . ' para ' . $dados['imovel']->ds_tipo_negociacao . ' com ' . $dados['imovel']->qtd_quarto . ' quartos, ' . $dados['imovel']->qtd_area . 'm²'  ?></h5>
                        <p class="transparente"><?= ucfirst($dados['imovel']->ds_rua_imovel) . ', ' . $dados['imovel']->ds_bairro . ', Rio de Janeiro ' ?></p>
                    </div>
                </a>

                <form name="confirmaAgendamento" method="POST" action="<?= URL . '/Paginas/envioContato/' . $dados['imovel']->id_imovel ?>">

                    <input type="hidden" name="txtDataHidden" value="<?= $dados['txtDataVisita']?>">
                    <input type="hidden" name="txtHoraHidden" value="<?= $dados['txtHoraVisita']?>">

                    <div class="row mt-4">
                        <label for="txtNomeContato" class="form-label">Nome para contato:</label>
                        <input type="text" class="form-control p-2" name="txtNomeContato" id="txtNomeContato" value="">
                    </div>
                    <div class="row mt-4">
                        <label for="txtEmailContato" class="form-label">E-mail para contato:</label>
                        <input type="text" class="form-control p-2" name="txtEmailContato" id="txtEmailContato" value="">
                    </div>
                    <div class="row mt-4">
                        <label for="txtTelefoneContato" class="form-label">Telefone para contato:</label>
                        <input type="text" class="form-control p-2" name="txtTelefoneContato" id="txtTelefoneContato" value="">
                    </div>

                    <div class="row mt-4">
                        <button type="submit" class="btn btn-amaral">
                            Confirmar e agendar visita
                        </button>
                    </div>
                </form>
            </div>

        </div>

        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <img src="<?= URL . '/img/checkar.jpg' ?>" alt="" class="img-fluid">
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {

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