<?php
$celular = "5521982341060";
?>
<div class="row d-flex justify-content-center">
    <div class="col">
        <div class="card border-0 mt-5">
            <div class="card-body text-center">
                <div class="feature">
                    <i class="fa-solid fa-building fa-3x"></i>
                </div>
                <div class="mt-5">
                    <h6><b>Não encontramos imóveis com as suas preferências</b></h6>
                </div>
                <div class="mt-3">
                    <p>
                        Quer ajuda para encontrar imóveis? Fale com o corretor ou explore
                        outros filtros na página <a href="<?= URL?>">home</a> e confira imóveis que podem te atender no momento.
                    </p>
                </div>

                <p class="mt-3">Para falar com o corretor, entre em contato via Whatsapp. Clique no ícone abaixo</p>

                <div class="mt-3">
                    <a href="https://web.whatsapp.com/send?phone=<?= $celular ?>" target="_blank" class="btn text-start"><img src="<?= URL . '/img/whatsapp.png' ?>" alt="" class="whats"></a>
                </div>
            </div>
        </div>
    </div>

</div>