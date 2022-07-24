<!-- <pre><?php var_dump($dados); ?></pre> -->

<main class="container">
    <div class="p-4 p-md-5 mb-4 rounded bg-white g-5 d-flex justify-content-center">
        <div class="col-md-6 px-0">
            <div id="<?= 'carousel' . $dados['imovel']->id_imovel ?>" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach ($dados['anexos'] as $anexos) {

                        if ($anexos->chk_destaque == 'S') {
                            echo "<div class='carousel-item active'><img src='" . URL . DIRECTORY_SEPARATOR . $anexos->nm_path_arquivo . DIRECTORY_SEPARATOR . $anexos->nm_arquivo . "' class='d-block w-100 tamanho-padrao'alt=''></div>";
                        } else {

                            echo "<div class='carousel-item'><img src='" . URL . DIRECTORY_SEPARATOR . $anexos->nm_path_arquivo . DIRECTORY_SEPARATOR . $anexos->nm_arquivo . "' class='d-block w-100 tamanho-padrao' alt=''></div>";
                        }
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="<?= '#carousel' . $dados['imovel']->id_imovel ?>" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="<?= '#carousel' . $dados['imovel']->id_imovel ?>" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="row g-5">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= URL ?>/Paginas">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Imóvel <?= '#00' . $dados['imovel']->id_imovel ?> </li>
                </ol>
            </nav>
            <ul class="list-inline">
                <li class="list-inline-item transparente">
                    <a href="#" class="btn btn-amaral mt-1"><span> <i class="fa-solid fa-image"></i></span> Fotos</a>
                </li>
                <li class="list-inline-item transparente">
                    <a href="#" class="btn btn-amaral mt-1"><span> <i class="fa-solid fa-video"></i></span> Video</a>
                </li>
            </ul>


            <article class="blog-post mt-5">
                <h2 class="blog-post-title"><?= $dados['imovel']->ds_tipo_imovel . ' para ' . $dados['imovel']->ds_tipo_negociacao . ' com ' . $dados['imovel']->qtd_quarto . ' quartos, ' . $dados['imovel']->qtd_area . 'm²'  ?></h2>
                <p class="blog-post-meta transparente"><?= ucfirst($dados['imovel']->ds_rua_imovel) . ', ' . $dados['imovel']->ds_bairro . ', Rio de Janeiro ' ?></p>
                <p class="blog-post-meta transparente mt-0"><i class="fa-solid fa-clock"></i><?= ' Publicado em: ' . Checa::dataBr($dados['imovel']->publicado_em) ?></p>

                <hr class="transparente">

                <div class="row">

                    <div class="col">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="feature"><i class="fa-solid fa-ruler-horizontal transparente-azul"></i></div>
                                <small><?= $dados['imovel']->qtd_area . ' m²' ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="feature"><i class="fa-solid fa-bed transparente-azul"></i></div>
                                <?php if ($dados['imovel']->qtd_quarto == "1") { ?>

                                    <small><?= $dados['imovel']->qtd_quarto . ' quarto' ?></small>

                                <?php } else { ?>

                                    <small><?= $dados['imovel']->qtd_quarto . ' quartos' ?></small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <div class="feature"><i class="fa-solid fa-shower transparente-azul"></i></div>
                                <?php if ($dados['imovel']->qtd_banheiro == "1") { ?>
                                    <small><?= $dados['imovel']->qtd_banheiro . ' banheiro' ?></small>
                                <?php } else { ?>

                                    <small><?= $dados['imovel']->qtd_banheiro . ' banheiros' ?></small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <?php if ((int)$dados['imovel']->qtd_vagas == 1) { ?>
                                    <div class="feature"><i class="fa-solid fa-car transparente-azul"></i></div>
                                    <small><?= $dados['imovel']->qtd_vagas . ' vaga' ?></small>
                                <?php } else if ((int)$dados['imovel']->qtd_vagas > 1) { ?>
                                    <div class="feature"><i class="fa-solid fa-car transparente-azul"></i></div>
                                    <small><?= $dados['imovel']->qtd_vagas . ' vagas' ?></small>
                                <?php } else { ?>
                                    <div class="feature"><i class="fa-solid fa-car transparente"></i></div>
                                    <small>-</small>
                                <?php }  ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <?php if ($dados['imovel']->num_andar == "") { ?>
                                    <div class="feature"><i class="fa-solid fa-building transparente"></i></div>
                                    <small>-</small>
                                <?php } else { ?>
                                    <div class="feature"><i class="fa-solid fa-building transparente-azul"></i></div>
                                    <small><?= $dados['imovel']->num_andar . 'º andar' ?></small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <?php if ($dados['imovel']->chk_aceita_pet == "S") { ?>
                                    <div class="feature"><i class="fa-solid fa-paw transparente-azul"></i></div>
                                    <small>Aceita pet</small>
                                <?php } else { ?>
                                    <div class="feature"><i class="fa-solid fa-paw transparente"></i></div>
                                    <small>Não aceita</small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <?php if ($dados['imovel']->chk_mobilia == "S") { ?>
                                    <div class="feature"><i class="fa-solid fa-couch transparente-azul"></i></div>
                                    <small>Mobiliado</small>
                                <?php } else { ?>
                                    <div class="feature"><i class="fa-solid fa-couch transparente"></i></div>
                                    <small>Sem mobília</small>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0">
                            <div class="card-body text-center">
                                <?php if ($dados['imovel']->chk_metro_prox == "S") { ?>
                                    <div class="feature"><i class="fa-solid fa-train-subway transparente-azul"></i></div>
                                    <small>Metrô próx.</small>
                                <?php } else { ?>
                                    <div class="feature"><i class="fa-solid fa-train-subway transparente"></i></div>
                                    <small>Não próx.</small>
                                <?php } ?>


                            </div>
                        </div>
                    </div>
                </div>

                <hr class="transparente">

                <h5 class="mt-5"><i class="fa-solid fa-sink fa-lg"></i><b>&nbsp&nbsp&nbsp&nbspImóvel</b></h5>

                <div class="row">
                    <div class="col">
                        <p style="margin-left: 7vh; margin-bottom: 0px;">Disponível</p>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p style="margin-left: 7vh;" class="transparente">
                                <?php
                                $ids_imoveis = [];
                                foreach ($dados['relacCaracImovel'] as $relacCaracImovel) {

                                    if ($relacCaracImovel->fk_imovel == $dados['imovel']->id_imovel) {

                                        foreach ($dados['caracImovel'] as $caracImovel) {
                                            if ($relacCaracImovel->fk_caracteristica_imovel == $caracImovel->id_caracteristica_imovel) {
                                                echo $caracImovel->ds_caracteristica_imovel . ', ';
                                                array_push($ids_imoveis, $caracImovel->id_caracteristica_imovel);
                                            }
                                        }
                                    }
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <p style="margin-left: 7vh; margin-bottom: 0px;">Indisponível</p>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p style="margin-left: 7vh;" class="transparente">A fazer
                                <!-- <?php
                                        $ids_imoveis = [];
                                        foreach ($dados['relacCaracImovel'] as $relacCaracImovel) {

                                            if ($relacCaracImovel->fk_imovel == $dados['imovel']->id_imovel) {

                                                foreach ($dados['caracImovel'] as $caracImovel) {
                                                    if ($relacCaracImovel->fk_caracteristica_imovel == $caracImovel->id_caracteristica_imovel) {
                                                        echo $caracImovel->ds_caracteristica_imovel . ', ';
                                                        array_push($ids_imoveis, $caracImovel->id_caracteristica_imovel);
                                                    }
                                                }
                                            }
                                        }
                                        ?> -->
                            </p>
                        </div>
                    </div>
                </div>

                <h5><i class="fa-solid fa-building fa-lg"></i><b>&nbsp&nbsp&nbsp&nbspCondomímio</b></h5>

                <div class="row">
                    <div class="col">
                        <p style="margin-left: 7vh; margin-bottom: 0px;">Disponível</p>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p style="margin-left: 7vh;" class="transparente">
                                <?php
                                $ids_imoveis = [];
                                foreach ($dados['relacCaracCondo'] as $relacCaracCondo) {

                                    if ($relacCaracCondo->fk_imovel == $dados['imovel']->id_imovel) {

                                        foreach ($dados['caracCondo'] as $caracCondo) {
                                            if ($relacCaracCondo->fk_caracteristica_condominio == $caracCondo->id_caracteristica_condominio) {
                                                echo $caracCondo->ds_caracteristica_condominio . ', ';
                                                array_push($ids_imoveis, $caracCondo->id_caracteristica_condominio);
                                            }
                                        }
                                    }
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <p style="margin-left: 7vh; margin-bottom: 0px;">Indisponível</p>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p style="margin-left: 7vh;" class="transparente">A fazer

                            </p>
                        </div>
                    </div>
                </div>

                <h3 class="mt-5">Proximidades</h3>

                <?php if (!$dados['imovel']->txt_escolas_colegios == "") { ?>
                    <div class="row mt-5">
                        <div class="col">
                            <h5><i class="fa-solid fa-graduation-cap fa-lg"></i><b>&nbsp&nbsp&nbsp&nbspEscolas ou colégios</b></h5>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p style="margin-left: 7vh;" class="transparente"> <?= $dados['imovel']->txt_escolas_colegios ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (!$dados['imovel']->txt_transporte_publico == "") { ?>
                    <div class="row mt-5">
                        <div class="col">
                            <h5><i class="fa-solid fa-train-subway fa-lg"></i><b>&nbsp&nbsp&nbsp&nbspTransporte público</b></h5>
                        </div>
                        <div class="row">
                            <div class="col">

                                <p style="margin-left: 7vh;" class="transparente"> <?= $dados['imovel']->txt_transporte_publico ?></p>

                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (!$dados['imovel']->txt_faculdades == "") { ?>
                    <div class="row mt-5">
                        <div class="col">
                            <h5><i class="fa-solid fa-graduation-cap fa-lg"></i></i><b>&nbsp&nbsp&nbsp&nbspFaculdades</b></h5>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p style="margin-left: 7vh;" class="transparente"> <?= $dados['imovel']->txt_faculdades ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (!$dados['imovel']->txt_entretenimento == "") { ?>
                    <div class="row mt-5">
                        <div class="col">
                            <h5><i class="fa-solid fa-landmark fa-lg"></i><b>&nbsp&nbsp&nbsp&nbspMuseus, teatros ou arenas de shows</b></h5>

                        </div>
                        <div class="row">
                            <div class="col">
                                <p style="margin-left: 7vh;" class="transparente"> <?= $dados['imovel']->txt_entretenimento ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (!$dados['imovel']->txt_hospitais == "") { ?>
                    <div class="row mt-5">
                        <div class="col">
                            <h5><i class="fa-solid fa-house-medical fa-lg"></i><b>&nbsp&nbsp&nbsp&nbspHospitais</b></h5>

                        </div>
                        <div class="row">
                            <div class="col">
                                <p style="margin-left: 7vh;" class="transparente"> <?= $dados['imovel']->txt_hospitais ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if (!$dados['imovel']->txt_parque_area_verde == "") { ?>
                    <div class="row mt-5">
                        <div class="col">
                            <h5><i class="fa-solid fa-tree fa-lg"></i><b>&nbsp&nbsp&nbsp&nbspParques ou áreas verdes</b></h5>

                        </div>
                        <div class="row">
                            <div class="col">
                                <p style="margin-left: 7vh;" class="transparente"> <?= $dados['imovel']->txt_parque_area_verde ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (!$dados['imovel']->txt_shopping == "") { ?>
                    <div class="row mt-5">
                        <div class="col">
                            <h5><i class="fa-solid fa-bag-shopping fa-lg"></i><b>&nbsp&nbsp&nbsp&nbspShoppings</b></h5>

                        </div>
                        <div class="row">
                            <div class="col">
                                <p style="margin-left: 7vh;" class="transparente"> <?= $dados['imovel']->txt_shopping ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </article>
        </div>

        <?php

        $aluguel = $dados['imovel']->mo_aluguel / 100;
        $venda = $dados['imovel']->mo_venda / 100;
        $condominio = $dados['imovel']->mo_condominio / 100;
        $iptu = $dados['imovel']->mo_iptu / 100;
        $incendio = $dados['imovel']->mo_seguro_incendio / 100;
        $servico = $dados['imovel']->mo_taxa_de_servico / 100;

        $totalAluguel = ($aluguel + $condominio + $iptu + $incendio + $servico);

        $totalVenda = ($venda + $condominio + $iptu);
        ?>

        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-light rounded">
                    <?php if ($dados['imovel']->fk_tipo_negociacao == "1") { ?>
                        <ol class="list-unstyled mb-3 list-inline">
                            <li class="list-inline-item transparente"><?= $dados['imovel']->ds_tipo_negociacao ?></li>
                            <li class="list-inline-item valor transparente"><?= 'R$ ' . $dados['imovel']->mo_venda / 100 ?></li>
                        </ol>
                        <ol class="list-unstyled mb-3 list-inline">
                            <li class="list-inline-item transparente">Condomínio</li>
                            <li class="list-inline-item valor transparente"><?= 'R$ ' . $dados['imovel']->mo_condominio / 100 ?></li>
                        </ol>
                        <ol class="list-unstyled mb-3 list-inline">
                            <li class="list-inline-item transparente">IPTU</li>
                            <li class="list-inline-item valor transparente"><?= 'R$ ' . $dados['imovel']->mo_iptu / 100 ?></li>
                        </ol>

                        <hr class="transparente">

                        <ol class="list-unstyled mb-3 list-inline">
                            <li class="list-inline-item transparente">Total</li>
                            <li class="list-inline-item valor">
                                <h4><?= 'R$ ' . number_format($totalVenda, 2, ",", ".") ?></h4>
                            </li>
                        </ol>
                    <?php } else { ?>

                        <ol class="list-unstyled mb-3 list-inline">
                            <li class="list-inline-item transparente"><?= $dados['imovel']->ds_tipo_negociacao ?></li>
                            <li class="list-inline-item valor transparente"><?= 'R$ ' . $dados['imovel']->mo_aluguel / 100 ?></li>
                        </ol>
                        <ol class="list-unstyled mb-3 list-inline">
                            <li class="list-inline-item transparente">Condomínio</li>
                            <li class="list-inline-item valor transparente"><?= 'R$ ' . $dados['imovel']->mo_condominio / 100 ?></li>
                        </ol>
                        <ol class="list-unstyled mb-3 list-inline">
                            <li class="list-inline-item transparente">IPTU</li>
                            <li class="list-inline-item valor transparente"><?= 'R$ ' . $dados['imovel']->mo_iptu / 100 ?></li>
                        </ol>
                        <ol class="list-unstyled mb-3 list-inline">
                            <li class="list-inline-item transparente">Seguro incêndio</li>
                            <li class="list-inline-item valor transparente"><?= 'R$ ' . $dados['imovel']->mo_seguro_incendio / 100 ?></li>
                        </ol>
                        <ol class="list-unstyled mb-3 list-inline">
                            <li class="list-inline-item transparente">Taxa de serviço</li>
                            <li class="list-inline-item valor transparente"><?= 'R$ ' . $dados['imovel']->mo_taxa_de_servico / 100 ?></li>
                        </ol>

                        <hr class="transparente">

                        <ol class="list-unstyled mb-3 list-inline">
                            <li class="list-inline-item transparente">Total</li>
                            <li class="list-inline-item valor">
                                <h4><?= 'R$ ' . number_format($totalAluguel, 2, ",", ".") ?></h4>
                            </li>
                        </ol>



                    <?php } ?>

                    <a href="<?= URL . '/Paginas/agendamentoImovel/' . $dados['imovel']->id_imovel ?>" class="text-start">
                        <div class="d-grid gap-2 mt-5">
                            <button class="btn btn-amaral" type="button">Agendar visita</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

</main>