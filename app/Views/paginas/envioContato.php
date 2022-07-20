<?php

$celular = "5521982341060";

$dataEscolhida = Checa::dataBr($dados['txtDataHidden']);
$horaEscolhida = Checa::horaFormat($dados['txtHoraHidden']);

$texto = " Olá, meu nome é {$dados['txtNomeContato']}, \nPossuo o E-mail: {$dados['txtEmailContato']}, Telefone: {$dados['txtTelefoneContato']} \n\n
Acabo de solicitar um agendamento para o Imóvel: \n
Id= ##{$dados['imovel']->id_imovel} \nData = {$dataEscolhida} \nHora = {$horaEscolhida}h \nEndereço: {$dados['imovel']->ds_rua_imovel}, {$dados['imovel']->ds_bairro} \n\nObrigado!";

$textoEncoded = urlencode($texto);

?>



<div class="container py-4">

    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light rounded-3">
                <h2>Tudo certo!</h2>
                <h3 class="transparente">Clique no botão abaixo para finalizar seu contato:</h3>
                
                
                
                <div class="d-flex justify-content-center mt-5 quadrado-whats">
                    <a href="https://web.whatsapp.com/send?phone=<?=$celular . '&text=' . $textoEncoded ?>" target="_blank" class="btn text-start"><img src="<?= URL . '/img/whatsapp.png' ?>" alt="" class="whats"></a>
                </div>


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
