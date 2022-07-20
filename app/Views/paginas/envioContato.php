<?php
// var_dump($dados);
// $celular = "5521982341060";
$celular = "5521969612536";

$dataEscolhida = Checa::dataBr($dados['txtDataHidden']);
$horaEscolhida = Checa::horaFormat($dados['txtHoraHidden']);

$texto = " Olá, meu nome é {$dados['txtNomeContato']}, \n Possuo o E-mail: {$dados['txtEmailContato']}, Telefone: {$dados['txtTelefoneContato']} \n \n
Acabo de solicitar um agendamento para o Imóvel: \n
Id= ##{$dados['imovel']->id_imovel} \n Data = {$dataEscolhida} \n Hora = {$horaEscolhida}h \n Endereço: {$dados['imovel']->ds_rua_imovel}, {$dados['imovel']->ds_bairro} \n Obrigado";

$textoEncoded = urlencode($texto);

?>



<div class="container py-4">

    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light rounded-3">
                <h2>Tudo certo!</h2>
                <h3 class="transparente">Clique no botão abaixo para finalizar seu contato:</h3>
                
                
                
                <div class="d-flex justify-content-center mt-5">
                    <a href="https://api.whatsapp.com/send?phone=<?=$celular . '&text=' . $textoEncoded ?>" target="_blank" class="btn text-start"><i class="fa-brands fa-whatsapp fa-5x"></i></a>
                </div>


                <p class="mt-5 transparente"> Obs: A reserva só estará garantida, após a confirmação do corretor via WhatsApp.</p>

            </div>
        </div>

        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <img src="<?= URL . '/img/ok.jpg' ?>" alt="" class="img-fluid">
            </div>
        </div>
    </div>

</div>
