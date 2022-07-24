<?php
?>

<ul class="list-inline mt-3">
    <li class="list-inline-item transparente">
        <a href="#" class="btn btn-amaral mt-1" data-bs-toggle="modal" data-bs-target="#filtroModal"><span> <i class="fa-solid fa-sliders"></i></span> Filtros</a>
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
                        <button class="nav-link " id="nav-alugar-tab" data-bs-toggle="tab" data-bs-target="#nav-alugar" type="button" role="tab" aria-controls="nav-alugar" aria-selected="true">Alugar</button>
                        <button class="nav-link " id="nav-comprar-tab" data-bs-toggle="tab" data-bs-target="#nav-comprar" type="button" role="tab" aria-controls="nav-comprar" aria-selected="false">Comprar</button>
                    </div>
                </nav>
                <form action="<?= URL . '/Paginas/filtro' ?>" name="filtro" method="POST">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-alugar" role="tabpanel" aria-labelledby="nav-alugar-tab">

                            <!-- Tab Alugar -->
                            <input type="hidden" name="txtTipoNegociacao" value="">
                            <input type="hidden" name="txtValorAluguelouTotal" value="">

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

                            <hr class="transparente">

                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Valor</h6>

                                <div class="row mb-3">
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <div class="col-md-2">
                                            <input type="radio" class="btn-check" name="btnradioValor" id="btnradioValorAluguel" autocomplete="off" checked value="1">
                                            <label class="btn btn-outline-dark" for="btnradioValorAluguel">Aluguel</label>

                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" class="btn-check" name="btnradioValor" id="btnradioValorTotal" autocomplete="off" value="2">
                                            <label class="btn btn-outline-dark" for="btnradioValorTotal">Valor Total</label>
                                        </div>
                                    </div>
                                </div>



                                <div class="col">
                                    <label for="txtValorMin" class="form-label">Mínimo R$ 500</label>
                                    <input type="text" class="money form-control" name="txtValorMin" id="txtValorMin" value="<?= number_format((($val_txtValorMin) / 100), 2, ",", ".") ?>">
                                </div>
                                <div class="col">
                                    <label for="txtValorMax" class="form-label">Máximo R$ 20.000</label>
                                    <input type="text" class="money form-control" name="txtValorMax" id="txtValorMax" value="<?= number_format((($val_txtValorMax) / 100), 2, ",", ".") ?>">
                                </div>
                            </div>

                            <hr class="transparente">

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
                            <hr class="transparente">
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

                            <hr class="transparente">
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

                            <hr class="transparente">

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



                            <hr class="transparente">


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
                            <hr class="transparente">

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

                            <hr class="transparente">
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

                            <hr class="transparente">
                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Condomínio</h6>
                                <?php foreach ($dados['caracteristicasCondominio'] as $caracteristicasCondominio) {

                                    $caracCondoCk = '';

                                    if (!$val_chkCaracCondominios == '') {

                                        foreach ($val_chkCaracCondominios as $chkCaracCondo) {

                                            if ($caracteristicasCondominio->id_caracteristica_condominio == $chkCaracCondo) {
                                                $caracCondoCk = 'checked';
                                            }
                                        }
                                    }
                                ?>
                                    <div class="col-5 m-2">
                                        <input class="chkCaracCondominios" type="checkbox" name="chkCaracCondominios[]" value="<?= $caracteristicasCondominio->id_caracteristica_condominio ?>" <?= $caracCondoCk ?>> <?= $caracteristicasCondominio->ds_caracteristica_condominio ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <hr class="transparente">
                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Comodidades</h6>
                                <?php foreach ($dados['comodidades'] as $comodidades) {

                                    $comodidadeCk = '';

                                    if (!$val_chkComodidades == '') {

                                        foreach ($val_chkComodidades as $chkComodidades) {

                                            if ($comodidades->id_filtro_comodidades == $chkComodidades) {
                                                $comodidadeCk = 'checked';
                                            }
                                        }
                                    }
                                ?>
                                    <div class="col-5 m-2">
                                        <input class="chkComodidades" type="checkbox" name="chkComodidades[]" value="<?= $comodidades->id_filtro_comodidades ?>" <?= $comodidadeCk ?>> <?= $comodidades->ds_filtro_comodidades ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <hr class="transparente">
                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Mobilias</h6>
                                <?php foreach ($dados['mobilias'] as $mobilias) {

                                    $mobiliasCk = '';

                                    if (!$val_chkMobilias == '') {

                                        foreach ($val_chkMobilias as $chkMobilias) {

                                            if ($mobilias->id_filtro_mobilias == $chkMobilias) {
                                                $mobiliasCk = 'checked';
                                            }
                                        }
                                    } ?>
                                    <div class="col-5 m-2">
                                        <input class="chkMobilias" type="checkbox" name="chkMobilias[]" value="<?= $mobilias->id_filtro_mobilias ?>" <?= $mobiliasCk ?>> <?= $mobilias->ds_filtro_mobilias ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <hr class="transparente">
                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Bem-estar</h6>
                                <?php foreach ($dados['bem_estar'] as $bem_estar) {
                                    $bemEstarCk = '';

                                    if (!$val_chkBemEstar == '') {

                                        foreach ($val_chkBemEstar as $chkBemEstar) {

                                            if ($bem_estar->id_filtro_bem_estar == $chkBemEstar) {
                                                $bemEstarCk = 'checked';
                                            }
                                        }
                                    } ?>
                                    <div class="col-5 m-2">
                                        <input class="chkBemEstar" type="checkbox" name="chkBemEstar[]" value="<?= $bem_estar->id_filtro_bem_estar ?>" <?= $bemEstarCk ?>> <?= $bem_estar->ds_filtro_bem_estar ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <hr class="transparente">
                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Eletrodomésticos</h6>
                                <?php foreach ($dados['eletro'] as $eletro) {
                                    $eletroCk = '';

                                    if (!$val_chkEletro == '') {

                                        foreach ($val_chkEletro as $chkEletro) {

                                            if ($eletro->id_filtro_eletrodomestico == $chkEletro) {
                                                $eletroCk = 'checked';
                                            }
                                        }
                                    } ?>
                                    <div class="col-5 m-2">
                                        <input class="chkEletro" type="checkbox" name="chkEletro[]" value="<?= $eletro->id_filtro_eletrodomestico ?>" <?= $eletroCk ?>> <?= $eletro->ds_filtro_eletrodomestico ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <hr class="transparente">
                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Cômodos</h6>
                                <?php foreach ($dados['comodos'] as $comodos) {
                                    $comodosCk = '';

                                    if (!$val_chkComodo == '') {

                                        foreach ($val_chkComodo as $chkComodo) {

                                            if ($comodos->id_filtro_comodos == $chkComodo) {
                                                $comodosCk = 'checked';
                                            }
                                        }
                                    } ?>
                                    <div class="col-5 m-2">
                                        <input class="chkComodo" type="checkbox" name="chkComodo[]" value="<?= $comodos->id_filtro_comodos ?>" <?= $comodosCk ?>> <?= $comodos->ds_filtro_comodos ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <hr class="transparente">
                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Acessibilidade</h6>
                                <?php foreach ($dados['acessibilidade'] as $acessibilidade) {
                                    $acessibilidadeCk = '';

                                    if (!$val_chkAcessibilidade == '') {

                                        foreach ($val_chkAcessibilidade as $chkAcessibilidade) {

                                            if ($acessibilidade->id_filtro_acessibilidade == $chkAcessibilidade) {
                                                $acessibilidadeCk = 'checked';
                                            }
                                        }
                                    } ?>
                                    <div class="col-5 m-2">
                                        <input class="chkAcessibilidade" type="checkbox" name="chkAcessibilidade[]" value="<?= $acessibilidade->id_filtro_acessibilidade ?>" <?= $acessibilidadeCk ?>> <?= $acessibilidade->ds_filtro_acessibilidade ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <!-- Tab Comprar Todos os IDs e Names Terminado com C -->
                        <div class="tab-pane fade" id="nav-comprar" role="tabpanel" aria-labelledby="nav-comprar-tab">

                            <div class="row mb-3 mt-4 p-3">
                                <h6 class="mb-3">Tipo imóvel</h6>
                                <select class="form-select" name="cboTipoImovelC" id="cboTipoImovelC">
                                    <?php foreach ($dados['tipoImovel'] as $tipoImovel) {
                                        $tipoImovelCSelected = '';
                                        if ($tipoImovel->id_tipo_imovel == $val_cboTipoImovelC) {
                                            $tipoImovelCSelected = 'selected';
                                        }
                                    ?>
                                        <option <?= $tipoImovelCSelected ?> value="<?= $tipoImovel->id_tipo_imovel ?>"><?= $tipoImovel->ds_tipo_imovel ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <hr class="transparente">

                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Valor do imóvel</h6>
                                <div class="col">
                                    <label for="txtValorCompraMin" class="form-label">Mínimo R$ 150.000</label>
                                    <input type="text" class="money form-control" name="txtValorCompraMin" id="txtValorCompraMin" value="<?= number_format((($val_txtValorCompraMin) / 100), 2, ",", ".") ?>">
                                </div>
                                <div class="col">
                                    <label for="txtValorCompraMax" class="form-label">Máximo R$ 20.000.000</label>
                                    <input type="text" class="money form-control" name="txtValorCompraMax" id="txtValorCompraMax" value="<?= number_format((($val_txtValorCompraMax) / 100), 2, ",", ".") ?>">
                                </div>
                            </div>

                            <hr class="transparente">


                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Condomínio + IPTU</h6>
                                <div class="col">
                                    <label for="txtCondMaisIptuMin" class="form-label">Mínimo R$ 0</label>
                                    <input type="text" class="money form-control" name="txtCondMaisIptuMin" id="txtCondMaisIptuMin" value="<?= number_format((($val_txtCondMaisIptuMin) / 100), 2, ",", ".") ?>">
                                </div>
                                <div class="col">
                                    <label for="txtCondMaisIptuMax" class="form-label">Máximo R$ 15.000</label>
                                    <input type="text" class="money form-control" name="txtCondMaisIptuMax" id="txtCondMaisIptuMax" value="<?= number_format((($val_txtCondMaisIptuMax) / 100), 2, ",", ".") ?>">
                                </div>
                            </div>


                            <hr class="transparente">

                            <div class="row mb-3 mt-3 p-3">
                                <div class="col-md-2">
                                    <h6 class="mb-3">Dormitórios</h6>
                                </div>

                                <?php for ($i = 1; $i < 5; $i++) {
                                    $quartoCheckedC = '';

                                    if ($i == $val_chkNumQuartosC) {
                                        $quartoCheckedC = 'checked';
                                    }
                                ?>
                                    <div class="col">
                                        <div class="card border-0">
                                            <div class="card-body text-center">
                                                <div class="feature"><input class="form-check-input" type="radio" name="chkNumQuartosC" id="chkNumQuartosC" <?= $quartoCheckedC ?> value="<?= $i ?>"></div>
                                                <small><?= $i . '+' ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <hr class="transparente">
                            <div class="row mb-3 mt-3 p-3">
                                <div class="col-md-2">
                                    <h6 class="mb-3">Banheiros</h6>
                                </div>

                                <?php for ($i = 1; $i < 5; $i++) {
                                    $banheiroCheckedC = '';

                                    if ($i == $val_chkNumBanheirosC) {
                                        $banheiroCheckedC = 'checked';
                                    }
                                ?>
                                    <div class="col">
                                        <div class="card border-0">
                                            <div class="card-body text-center">
                                                <div class="feature"><input class="form-check-input" type="radio" name="chkNumBanheirosC" <?= $banheiroCheckedC ?> id="chkNumBanheirosC" value="<?= $i ?>"></div>
                                                <small><?= $i . '+' ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <hr class="transparente">
                            <div class="row mb-3 mt-3 p-3">
                                <div class="col-md-2">
                                    <h6 class="mb-3">Vagas</h6>
                                </div>

                                <?php

                                $temCheckedC = false;
                                $tantoFazCheckedVgC = '';

                                for ($i = 1; $i < 4; $i++) {

                                    $vagasCheckedC = '';

                                    if ($i == $val_chkVagasC) {
                                        $temCheckedC = true;
                                        $vagasCheckedC = 'checked';
                                    }
                                ?>
                                    <div class="col">
                                        <div class="card border-0">
                                            <div class="card-body text-center">
                                                <div class="feature"><input class="form-check-input" type="radio" name="chkVagasC" <?= $vagasCheckedC ?> id="chkVagasC" value="<?= $i ?>"></div>
                                                <small><?= $i . '+' ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php }

                                if (!$temCheckedC) {
                                    $tantoFazCheckedVgC = 'checked';
                                } ?>

                                <div class="col">
                                    <div class="card border-0">
                                        <div class="card-body text-center">
                                            <div class="feature"><input class="form-check-input" type="radio" name="chkVagasC" id="chkVagasTC" value="" <?= $tantoFazCheckedVgC ?>></div>
                                            <small>Tanto faz</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="transparente">

                            <?php

                            $mobChkedSC = '';
                            $mobChkedNC = '';
                            $mobChkedTfC = '';

                            if ($val_chkMobiliadoC == 'S') {
                                $mobChkedSC = 'checked';
                            }
                            if ($val_chkMobiliadoC == 'N') {
                                $mobChkedNC = 'checked';
                            }
                            if ($val_chkMobiliadoC == '') {
                                $mobChkedTfC = 'checked';
                            }

                            ?>

                            <div class="row mb-3 mt-3 p-3">
                                <div class="col-md-2">
                                    <h6 class="mb-3">Mobiliado?</h6>
                                </div>
                                <div class="col">
                                    <div class="card border-0">
                                        <div class="card-body text-center">
                                            <div class="feature"><input class="form-check-input" type="radio" name="chkMobiliadoC" id="chkMobiliadoC" value="S" <?= $mobChkedSC ?>></div>
                                            <small>Sim</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-0">
                                        <div class="card-body text-center">
                                            <div class="feature"><input class="form-check-input" type="radio" name="chkMobiliadoC" id="chkMobiliadoC" value="N" <?= $mobChkedNC ?>></div>
                                            <small>Não</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-0">
                                        <div class="card-body text-center">
                                            <div class="feature"><input class="form-check-input" type="radio" name="chkMobiliadoC" id="chkMobiliadoTC" value="" <?= $mobChkedTfC ?>></div>
                                            <small>Tanto faz</small>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <hr class="transparente">


                            <?php

                            $petChkedSC = '';
                            $petChkedNC = '';
                            $petChkedTfC = '';

                            if ($val_chkAceitaPetsC == 'S') {
                                $petChkedSC = 'checked';
                            }
                            if ($val_chkAceitaPetsC == 'N') {
                                $petChkedNC = 'checked';
                            }
                            if ($val_chkAceitaPetsC == '') {
                                $petChkedTfC = 'checked';
                            }

                            ?>
                            <div class="row mb-3 mt-3 p-3">
                                <div class="col-md-2">
                                    <h6 class="mb-3">Aceita pets?</h6>
                                </div>
                                <div class="col">
                                    <div class="card border-0">
                                        <div class="card-body text-center">
                                            <div class="feature"><input class="form-check-input" type="radio" name="chkAceitaPetsC" id="chkAceitaPetsC" value="S" <?= $petChkedSC ?>></div>
                                            <small>Sim</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-0">
                                        <div class="card-body text-center">
                                            <div class="feature"><input class="form-check-input" type="radio" name="chkAceitaPetsC" id="chkAceitaPetsC" value="N" <?= $petChkedNC ?>></div>
                                            <small>Não</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-0">
                                        <div class="card-body text-center">
                                            <div class="feature"><input class="form-check-input" type="radio" name="chkAceitaPetsC" id="chkAceitaPetsTC" value="" <?= $petChkedTfC ?>></div>
                                            <small>Tanto faz</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="transparente">

                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Área</h6>
                                <div class="col">
                                    <label for="txtAreaMinC" class="form-label">Mínimo 20m²</label>
                                    <input type="text" class="form-control" name="txtAreaMinC" id="txtAreaMinC" value="<?= $val_txtAreaMinC ?>">
                                </div>
                                <div class="col">
                                    <label for="txtAreaMaxC" class="form-label">Máximo 1000m²</label>
                                    <input type="text" class="form-control" name="txtAreaMaxC" id="txtAreaMaxC" value="<?= $val_txtAreaMaxC ?>">
                                </div>
                            </div>

                            <hr class="transparente">
                            <?php

                            $metroChkedSC = '';
                            $metroChkedNC = '';
                            $metroChkedTfC = '';

                            if ($val_chkProxMetroC == 'S') {
                                $metroChkedSC = 'checked';
                            }
                            if ($val_chkProxMetroC == 'N') {
                                $metroChkedNC = 'checked';
                            }
                            if ($val_chkProxMetroC == '') {
                                $metroChkedTfC = 'checked';
                            }

                            ?>
                            <div class="row mb-3 mt-3 p-3">
                                <div class="col-md-2">
                                    <h6 class="mb-3">Próximo ao metrô?</h6>
                                </div>
                                <div class="col">
                                    <div class="card border-0">
                                        <div class="card-body text-center">
                                            <div class="feature"><input class="form-check-input" type="radio" name="chkProxMetroC" id="chkProxMetroC" value="S" <?= $metroChkedSC ?>></div>
                                            <small>Sim</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-0">
                                        <div class="card-body text-center">
                                            <div class="feature"><input class="form-check-input" type="radio" name="chkProxMetroC" id="chkProxMetroC" value="N" <?= $metroChkedNC ?>></div>
                                            <small>Não</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card border-0">
                                        <div class="card-body text-center">
                                            <div class="feature"><input class="form-check-input" type="radio" name="chkProxMetroC" id="chkProxMetroTC" value="" <?= $metroChkedTfC ?>></div>
                                            <small>Tanto faz</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="transparente">
                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Condomínio</h6>
                                <?php foreach ($dados['caracteristicasCondominio'] as $caracteristicasCondominio) {

                                    $caracCondoCkC = '';

                                    if (!$val_chkCaracCondominiosC == '') {

                                        foreach ($val_chkCaracCondominiosC as $chkCaracCondoC) {

                                            if ($caracteristicasCondominio->id_caracteristica_condominio == $chkCaracCondoC) {
                                                $caracCondoCkC = 'checked';
                                            }
                                        }
                                    }
                                ?>
                                    <div class="col-5 m-2">
                                        <input class="chkCaracCondominiosC" type="checkbox" name="chkCaracCondominiosC[]" value="<?= $caracteristicasCondominio->id_caracteristica_condominio ?>" <?= $caracCondoCkC ?>> <?= $caracteristicasCondominio->ds_caracteristica_condominio ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <hr class="transparente">
                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Comodidades</h6>
                                <?php foreach ($dados['comodidades'] as $comodidades) {

                                    $comodidadeCkC = '';

                                    if (!$val_chkComodidadesC == '') {

                                        foreach ($val_chkComodidadesC as $chkComodidadesC) {

                                            if ($comodidades->id_filtro_comodidades == $chkComodidadesC) {
                                                $comodidadeCkC = 'checked';
                                            }
                                        }
                                    }
                                ?>
                                    <div class="col-5 m-2">
                                        <input class="chkComodidadesC" type="checkbox" name="chkComodidadesC[]" value="<?= $comodidades->id_filtro_comodidades ?>" <?= $comodidadeCkC ?>> <?= $comodidades->ds_filtro_comodidades ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <hr class="transparente">
                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Mobilias</h6>
                                <?php foreach ($dados['mobilias'] as $mobilias) {

                                    $mobiliasCkC = '';

                                    if (!$val_chkMobiliasC == '') {

                                        foreach ($val_chkMobiliasC as $chkMobiliasC) {

                                            if ($mobilias->id_filtro_mobilias == $chkMobiliasC) {
                                                $mobiliasCkC = 'checked';
                                            }
                                        }
                                    } ?>
                                    <div class="col-5 m-2">
                                        <input class="chkMobiliasC" type="checkbox" name="chkMobiliasC[]" value="<?= $mobilias->id_filtro_mobilias ?>" <?= $mobiliasCkC ?>> <?= $mobilias->ds_filtro_mobilias ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <hr class="transparente">
                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Bem-estar</h6>
                                <?php foreach ($dados['bem_estar'] as $bem_estar) {
                                    $bemEstarCkC = '';

                                    if (!$val_chkBemEstarC == '') {

                                        foreach ($val_chkBemEstarC as $chkBemEstarC) {

                                            if ($bem_estar->id_filtro_bem_estar == $chkBemEstarC) {
                                                $bemEstarCkC = 'checked';
                                            }
                                        }
                                    } ?>
                                    <div class="col-5 m-2">
                                        <input class="chkBemEstarC" type="checkbox" name="chkBemEstarC[]" value="<?= $bem_estar->id_filtro_bem_estar ?>" <?= $bemEstarCkC ?>> <?= $bem_estar->ds_filtro_bem_estar ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <hr class="transparente">
                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Eletrodomésticos</h6>
                                <?php foreach ($dados['eletro'] as $eletro) {
                                    $eletroCkC = '';

                                    if (!$val_chkEletroC == '') {

                                        foreach ($val_chkEletroC as $chkEletroC) {

                                            if ($eletro->id_filtro_eletrodomestico == $chkEletroC) {
                                                $eletroCkC = 'checked';
                                            }
                                        }
                                    } ?>
                                    <div class="col-5 m-2">
                                        <input class="chkEletroC" type="checkbox" name="chkEletroC[]" value="<?= $eletro->id_filtro_eletrodomestico ?>" <?= $eletroCkC ?>> <?= $eletro->ds_filtro_eletrodomestico ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <hr class="transparente">
                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Cômodos</h6>
                                <?php foreach ($dados['comodos'] as $comodos) {
                                    $comodosCkC = '';

                                    if (!$val_chkComodoC == '') {

                                        foreach ($val_chkComodoC as $chkComodoC) {

                                            if ($comodos->id_filtro_comodos == $chkComodoC) {
                                                $comodosCkC = 'checked';
                                            }
                                        }
                                    } ?>
                                    <div class="col-5 m-2">
                                        <input class="chkComodoC" type="checkbox" name="chkComodoC[]" value="<?= $comodos->id_filtro_comodos ?>" <?= $comodosCkC ?>> <?= $comodos->ds_filtro_comodos ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <hr class="transparente">
                            <div class="row mb-3 mt-3 p-3">
                                <h6 class="mb-3">Acessibilidade</h6>
                                <?php foreach ($dados['acessibilidade'] as $acessibilidade) {
                                    $acessibilidadeCkC = '';

                                    if (!$val_chkAcessibilidadeC == '') {

                                        foreach ($val_chkAcessibilidadeC as $chkAcessibilidadeC) {

                                            if ($acessibilidade->id_filtro_acessibilidade == $chkAcessibilidadeC) {
                                                $acessibilidadeCkC = 'checked';
                                            }
                                        }
                                    } ?>
                                    <div class="col-5 m-2">
                                        <input class="chkAcessibilidadeC" type="checkbox" name="chkAcessibilidadeC[]" value="<?= $acessibilidade->id_filtro_acessibilidade ?>" <?= $acessibilidadeCkC ?>> <?= $acessibilidade->ds_filtro_acessibilidade ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <input class="btn btn-light" type="button" value="Limpar Filtros" id="btnReset">
                <button type="submit" class="btn btn-amaral">Aplicar Filtros</button>
            </div>
            </form>
        </div>
    </div>
</div>