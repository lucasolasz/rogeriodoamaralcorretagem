<div class="container p-5">
    <div class="row">

        <?php
        
        $val_cboTipoImovel = isset($dados['filtros']['cboTipoImovel']) ? $dados['filtros']['cboTipoImovel'] : '';
        $val_txtValorMin = isset($dados['filtros']['txtValorMin']) ? LimpaStringFloat::limparString($dados['filtros']['txtValorMin']) : '20000';
        $val_txtValorMax = isset($dados['filtros']['txtValorMax']) ? LimpaStringFloat::limparString($dados['filtros']['txtValorMax']) : '2000000';
        $val_chkNumQuartos = isset($dados['filtros']['chkNumQuartos']) ? $dados['filtros']['chkNumQuartos'] : '';
        $val_chkNumBanheiros = isset($dados['filtros']['chkNumBanheiros']) ? $dados['filtros']['chkNumBanheiros'] : '';
        $val_chkVagas = isset($dados['filtros']['chkVagas']) ? $dados['filtros']['chkVagas'] : '';
        $val_chkMobiliado = isset($dados['filtros']['chkMobiliado']) ? $dados['filtros']['chkMobiliado'] : '';
        $val_chkAceitaPets = isset($dados['filtros']['chkAceitaPets']) ? $dados['filtros']['chkAceitaPets'] : '';
        $val_txtAreaMin = isset($dados['filtros']['txtAreaMin']) ? $dados['filtros']['txtAreaMin'] : '20';
        $val_txtAreaMax = isset($dados['filtros']['txtAreaMax']) ? $dados['filtros']['txtAreaMax'] : '1000';
        $val_chkProxMetro = isset($dados['filtros']['chkProxMetro']) ? $dados['filtros']['chkProxMetro'] : '';


        ?>
        <!-- <pre><?php //var_dump($dados['filtros'])  ?></pre> -->

        <ul class="list-inline mt-3">
            <li class="list-inline-item transparente">
                <a href="#" class="btn btn-dark mt-1" data-bs-toggle="modal" data-bs-target="#filtroModal"><span> <i class="fa-solid fa-sliders"></i></span> Filtros</a>
            </li>
        </ul>


        <!-- Modal -->
        <div class="modal fade" id="filtroModal" tabindex="-1" aria-labelledby="filtroModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title p-3" id="filtroModal">Filtros</h5>
                        <button type="button" class="btn-close p-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-alugar-tab" data-bs-toggle="tab" data-bs-target="#nav-alugar" type="button" role="tab" aria-controls="nav-alugar" aria-selected="true">Alugar</button>
                                <button class="nav-link" id="nav-comprar-tab" data-bs-toggle="tab" data-bs-target="#nav-comprar" type="button" role="tab" aria-controls="nav-comprar" aria-selected="false">Comprar</button>
                            </div>
                        </nav>
                        <form action="<?= URL . '/Paginas/filtro' ?>" name="filtro" method="POST">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-alugar" role="tabpanel" aria-labelledby="nav-alugar-tab">

                                    <input type="hidden" name="txtTipoNegociacao" value="2">

                                    <div class="row mb-3 mt-4 p-3">
                                        <h6 class="mb-3">Tipo imóvel</h6>
                                        <select class="form-select" name="cboTipoImovel" id="cboTipoImovel">
                                            <?php foreach ($dados['tipoImovel'] as $tipoImovel) {
                                                $tipoImovelSelected = '';
                                                if ($tipoImovel->id_tipo_imovel == $val_cboTipoImovel) {
                                                    $tipoImovelSelected = 'selected';
                                                }
                                            ?>
                                                <option <?= $tipoImovelSelected ?> value="<?= $tipoImovel->id_tipo_imovel ?>"><?= $tipoImovel->ds_tipo_imovel ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <hr>

                                    <div class="row mb-3 mt-3 p-3">
                                        <h6 class="mb-3">Valor</h6>
                                        <div class="col">
                                            <label for="txtValorMin" class="form-label">Mínimo R$ 200</label>
                                            <input type="text" class="money form-control" name="txtValorMin" id="txtValorMin" value="<?= number_format((($val_txtValorMin) / 100), 2, ",", ".") ?>">
                                        </div>
                                        <div class="col">
                                            <label for="txtValorMax" class="form-label">Máximo R$ 20.000</label>
                                            <input type="text" class="money form-control" name="txtValorMax" id="txtValorMax" value="<?= number_format((($val_txtValorMax) / 100), 2, ",", ".") ?>">
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row mb-3 mt-3 p-3">
                                        <div class="col-md-2">
                                            <h6 class="mb-3">Dormitórios</h6>
                                        </div>

                                        <?php for ($i = 1; $i < 5; $i++) {
                                            $quartoChecked = '';

                                            if ($i == $val_chkNumQuartos) {
                                                $quartoChecked = 'checked';
                                            }
                                        ?>
                                            <div class="col">
                                                <div class="card border-0">
                                                    <div class="card-body text-center">
                                                        <div class="feature"><input class="form-check-input" type="radio" name="chkNumQuartos" id="chkNumQuartos" <?= $quartoChecked ?> value="<?= $i ?>"></div>
                                                        <small><?= $i . '+' ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <hr>
                                    <div class="row mb-3 mt-3 p-3">
                                        <div class="col-md-2">
                                            <h6 class="mb-3">Banheiros</h6>
                                        </div>

                                        <?php for ($i = 1; $i < 5; $i++) {
                                            $banheiroChecked = '';

                                            if ($i == $val_chkNumBanheiros) {
                                                $banheiroChecked = 'checked';
                                            }
                                        ?>
                                            <div class="col">
                                                <div class="card border-0">
                                                    <div class="card-body text-center">
                                                        <div class="feature"><input class="form-check-input" type="radio" name="chkNumBanheiros" <?= $banheiroChecked ?> id="chkNumBanheiros" value="<?= $i ?>"></div>
                                                        <small><?= $i . '+' ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <hr>
                                    <div class="row mb-3 mt-3 p-3">
                                        <div class="col-md-2">
                                            <h6 class="mb-3">Vagas</h6>
                                        </div>

                                        <?php

                                        $temChecked = false;
                                        $tantoFazCheckedVg = '';

                                        for ($i = 1; $i < 4; $i++) {

                                            $vagasChecked = '';

                                            if ($i == $val_chkVagas) {
                                                $temChecked = true;
                                                $vagasChecked = 'checked';
                                            }
                                        ?>
                                            <div class="col">
                                                <div class="card border-0">
                                                    <div class="card-body text-center">
                                                        <div class="feature"><input class="form-check-input" type="radio" name="chkVagas" <?= $vagasChecked ?> id="chkVagas" value="<?= $i ?>"></div>
                                                        <small><?= $i . '+' ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }

                                        if (!$temChecked) {
                                            $tantoFazCheckedVg = 'checked';
                                        } ?>

                                        <div class="col">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <div class="feature"><input class="form-check-input" type="radio" name="chkVagas" id="chkVagasT" value="" <?= $tantoFazCheckedVg ?>></div>
                                                    <small>Tanto faz</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <?php

                                    $mobChkedS = '';
                                    $mobChkedN = '';
                                    $mobChkedTf = '';

                                    if ($val_chkMobiliado == 'S') {
                                        $mobChkedS = 'checked';
                                    }
                                    if ($val_chkMobiliado == 'N') {
                                        $mobChkedN = 'checked';
                                    }
                                    if ($val_chkMobiliado == '') {
                                        $mobChkedTf = 'checked';
                                    }

                                    ?>

                                    <div class="row mb-3 mt-3 p-3">
                                        <div class="col-md-2">
                                            <h6 class="mb-3">Mobiliado?</h6>
                                        </div>
                                        <div class="col">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <div class="feature"><input class="form-check-input" type="radio" name="chkMobiliado" id="chkMobiliado" value="S" <?= $mobChkedS ?>></div>
                                                    <small>Sim</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <div class="feature"><input class="form-check-input" type="radio" name="chkMobiliado" id="chkMobiliado" value="N" <?= $mobChkedN ?>></div>
                                                    <small>Não</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <div class="feature"><input class="form-check-input" type="radio" name="chkMobiliado" id="chkMobiliadoT" value="" <?= $mobChkedTf ?>></div>
                                                    <small>Tanto faz</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <hr>


                                    <?php

                                    $petChkedS = '';
                                    $petChkedN = '';
                                    $petChkedTf = '';

                                    if ($val_chkAceitaPets == 'S') {
                                        $petChkedS = 'checked';
                                    }
                                    if ($val_chkAceitaPets == 'N') {
                                        $petChkedN = 'checked';
                                    }
                                    if ($val_chkAceitaPets == '') {
                                        $petChkedTf = 'checked';
                                    }

                                    ?>
                                    <div class="row mb-3 mt-3 p-3">
                                        <div class="col-md-2">
                                            <h6 class="mb-3">Aceita pets?</h6>
                                        </div>
                                        <div class="col">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <div class="feature"><input class="form-check-input" type="radio" name="chkAceitaPets" id="chkAceitaPets" value="S" <?= $petChkedS ?>></div>
                                                    <small>Sim</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <div class="feature"><input class="form-check-input" type="radio" name="chkAceitaPets" id="chkAceitaPets" value="N" <?= $petChkedN ?>></div>
                                                    <small>Não</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <div class="feature"><input class="form-check-input" type="radio" name="chkAceitaPets" id="chkAceitaPetsT" value="" <?= $petChkedTf ?>></div>
                                                    <small>Tanto faz</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row mb-3 mt-3 p-3">
                                        <h6 class="mb-3">Área</h6>
                                        <div class="col">
                                            <label for="txtAreaMin" class="form-label">Mínimo 20m²</label>
                                            <input type="text" class="form-control" name="txtAreaMin" id="txtAreaMin" value="<?= $val_txtAreaMin ?>">
                                        </div>
                                        <div class="col">
                                            <label for="txtAreaMax" class="form-label">Máximo 1000m²</label>
                                            <input type="text" class="form-control" name="txtAreaMax" id="txtAreaMax" value="<?= $val_txtAreaMax ?>">
                                        </div>
                                    </div>

                                    <hr>
                                    <?php

                                    $metroChkedS = '';
                                    $metroChkedN = '';
                                    $metroChkedTf = '';

                                    if ($val_chkProxMetro == 'S') {
                                        $metroChkedS = 'checked';
                                    }
                                    if ($val_chkProxMetro == 'N') {
                                        $metroChkedN = 'checked';
                                    }
                                    if ($val_chkProxMetro == '') {
                                        $metroChkedTf = 'checked';
                                    }

                                    ?>
                                    <div class="row mb-3 mt-3 p-3">
                                        <div class="col-md-2">
                                            <h6 class="mb-3">Próximo ao metrô?</h6>
                                        </div>
                                        <div class="col">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <div class="feature"><input class="form-check-input" type="radio" name="chkProxMetro" id="chkProxMetro" value="S" <?= $metroChkedS ?>></div>
                                                    <small>Sim</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <div class="feature"><input class="form-check-input" type="radio" name="chkProxMetro" id="chkProxMetro" value="N" <?= $metroChkedN ?>></div>
                                                    <small>Não</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <div class="feature"><input class="form-check-input" type="radio" name="chkProxMetro" id="chkProxMetroT" value="" <?= $metroChkedTf ?>></div>
                                                    <small>Tanto faz</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Continuar daqui -->



                                </div>
                                <div class="tab-pane fade" id="nav-comprar" role="tabpanel" aria-labelledby="nav-comprar-tab">...</div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <input class="btn btn-light" type="button" value="Limpar Filtros" id="btnReset">
                        <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>















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
<script>
    $(document).ready(function() {

        $('.money').maskMoney({
            prefix: '',
            allowNegative: true,
            thousands: '.',
            decimal: ',',
            // affixesStay: true
        });
    });

    $("#btnReset").click(function() {
        $("#cboTipoImovel").val("1");
        $("#txtValorMin").val("200,00");
        $("#txtValorMax").val("20.000,00");       
        $("input[name=chkNumQuartos]").prop( "checked", false);
        $("input[name=chkNumBanheiros]").prop( "checked", false);
        $("#chkVagasT").prop( "checked", true);
        $("#chkMobiliadoT").prop( "checked", true);
        $("#chkAceitaPetsT").prop( "checked", true);        
        $("#txtAreaMin").val("20");
        $("#txtAreaMax").val("1000");
        $("#chkProxMetroT").prop( "checked", true);

        // $("#chkNumQuartos").prop( "checked", false);
        // $("#chkNumQuartos").val("2");
        


    });
</script>