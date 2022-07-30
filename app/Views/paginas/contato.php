<?php
// var_dump($dados);
$celular = "5521960146947";

?>

<div class="container py-4">    
    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light rounded-3">
                <h2>Contato</h2>
                
                <p class="mt-3">Entre em contato via Whatsapp. Clique no ícone abaixo</p>

                <div class="d-flex justify-content-center mt-3 quadrado-whats">
                    <a href="https://web.whatsapp.com/send?phone=<?=$celular?>" target="_blank" class="btn text-start"><img src="<?= URL . '/img/whatsapp.png' ?>" alt="" class="whats"></a>
                </div>
                
            </div>

        </div>

        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <img src="<?= URL . '/img/contato.jpg' ?>" alt="" class="img-fluid">
            </div>
        </div>
    </div>

</div>
