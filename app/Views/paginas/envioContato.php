<?php

$celular = "5521960146947";

$dataEscolhida = strval(Checa::dataBr($dados['txtDataHidden']));
$horaEscolhida = strval(Checa::horaFormat($dados['txtHoraHidden']));

$id_imovel = strval($dados['imovel']->id_imovel);
$ds_rua_imovel = strval($dados['imovel']->ds_rua_imovel);
$bairro = strval($dados['imovel']->ds_bairro);

$texto = "Olá, meu nome é " . $dados['txtNomeContato'] . ", Possuo o E-mail: " . $dados['txtEmailContato'] . ", Telefone: " . $dados['txtTelefoneContato'] . ". Acabo de solicitar um agendamento para o Imóvel: " . " Id:" . $id_imovel . ", Data: " . $dataEscolhida . ", Hora: " . $horaEscolhida . ", Endereço: " . $ds_rua_imovel . ", " . $bairro . ". Este horário está disponível?";

$textoEncoded = urlencode($texto);

?>

<div class="container py-4">

    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light rounded-3">
                <h2>Tudo certo!</h2>
                <h3 class="transparente">Clique no botão abaixo para finalizar seu contato:</h3>

                <div class="d-flex justify-content-center mt-5 quadrado-whats">
                    <a href="https://www.wppredirect.tk/go/?p=<?= $celular . '&m=' . $textoEncoded ?>" target="_blank" class="btn text-start"><img src="<?= URL . '/img/whatsapp.png' ?>" alt="" class="whats"></a>
                </div>

                <p class="mt-5">Caso o link acima nao funcione, <a href="https://www.wppredirect.tk/go/?p=<?= $celular . '&m=' . $textoEncoded ?>">clique aqui</a> ou adicione o número para contato com o corretor: (21) 96014-6947</p>

                <p class="mt-5 transparente"> Obs: A reserva só estará garantida, após a confirmação via WhatsApp.</p>



            </div>
        </div>

        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <img src="<?= URL . '/img/ok.png' ?>" alt="" class="img-fluid">
            </div>
        </div>
    </div>

</div>