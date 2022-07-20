<div class="container p-5">
    <div class="row">

        <!-- <pre><?php var_dump($dados['anexos']) ?></pre> -->
        <!-- <span><i class="fa-solid fa-sliders-simple"></span></i> -->

        <ul class="list-inline mt-3">
            <li class="list-inline-item transparente">
                <a href="#" class="btn btn-dark mt-1"><span> <i class="fa-solid fa-sliders"></i></span> Filtros</a>
            </li>
        </ul>


        



        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($dados['imovel'] as $imovel) {

            ?>
                <div class="col">
                    <div class="card h-100">
                        <div id="<?= 'carousel' . $imovel->id_imovel ?>" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">

                                <?php
                                $temAnexo = false;

                                foreach ($dados['anexos'] as $anexos) {

                                    if ($anexos->fk_imovel == $imovel->id_imovel) {
                                        $temAnexo = true;
                                        if ($anexos->chk_destaque == 'S') {
                                            echo "<div class='carousel-item active'><img src='" . URL . DIRECTORY_SEPARATOR . $anexos->nm_path_arquivo . DIRECTORY_SEPARATOR . $anexos->nm_arquivo . "' class='d-block w-100 tamanho-padrao-card' alt=''></div>";
                                        } else {

                                            echo "<div class='carousel-item'><img src='" . URL . DIRECTORY_SEPARATOR . $anexos->nm_path_arquivo . DIRECTORY_SEPARATOR . $anexos->nm_arquivo . "' class='d-block w-100 tamanho-padrao-card' alt=''></div>";
                                        }
                                    }
                                }
                                //Salva com imagem branca padrão caso nao haja foto                                
                                if (!$temAnexo) {
                                    echo "<div class='carousel-item active'><img src='" . URL . "\img\imovelBlank.png' class='d-block w-100' alt=''></div>";
                                }

                                ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="<?= '#carousel' . $imovel->id_imovel ?>" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="<?= '#carousel' . $imovel->id_imovel ?>" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <a href="<?= URL . '/Paginas/imovelSelecionado/' . $imovel->id_imovel ?>" class="btn text-start">
                            <div class="card-body">
                                <small><?= $imovel->ds_tipo_imovel ?></small>
                                <h5 class="card-title mt-3 mb-0"><?= ucfirst($imovel->ds_rua_imovel) ?></h5>
                                <small class="mt-0"><?= $imovel->ds_bairro ?>, Rio de Janeiro</small>
                                <ul class="list-inline mt-3">
                                    <li class="list-inline-item transparente"><span><i class="fa-solid fa-ruler-horizontal"></i></span> <?= $imovel->qtd_area . ' m²' ?></li>
                                    <li class="list-inline-item transparente"><span><i class="fa-solid fa-bed"></i></span> <?= $imovel->qtd_quarto . " dorm" ?></li>
                                </ul>

                                <?php
                                if ($imovel->fk_tipo_negociacao == 1) {

                                    $venda = (int)$imovel->mo_venda / 100;
                                    $condominio = (int)$imovel->mo_condominio / 100;
                                    $iptu = (int)$imovel->mo_iptu / 100;

                                    $totalVenda = ($venda + $condominio + $iptu);
                                    echo "<p class='card-text mb-1'>" . $imovel->ds_tipo_negociacao . " R$ " . number_format($venda, 2, ",", ".") . "</p>";
                                    echo "<small class='total'> Total R$ " . number_format($totalVenda, 2, ",", ".") . "</small>";
                                } else {

                                    $aluguel = (int)$imovel->mo_aluguel / 100;
                                    $condominio = (int)$imovel->mo_condominio / 100;
                                    $iptu = (int)$imovel->mo_iptu / 100;
                                    $incendio = (int)$imovel->mo_seguro_incendio / 100;
                                    $servico = (int)$imovel->mo_taxa_de_servico / 100;

                                    $totalAluguel = ($aluguel + $condominio + $iptu + $incendio + $servico);
                                    echo "<p class='card-text mb-1'>" . $imovel->ds_tipo_negociacao . " R$ " . number_format($aluguel, 2, ",", ".") . "</p>";
                                    echo "<small class='total'> Total R$ " . number_format($totalAluguel, 2, ",", ".") . "</small>";
                                }

                                // echo $totalAluguel;
                                // exit();

                                ?>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>