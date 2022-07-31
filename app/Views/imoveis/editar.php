<div class="col-xl-4 col-md-6 mx-auto p-5">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= URL ?>/ImoveisController">Imóveis</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= "#00" . $dados['imovel']->id_imovel ?></li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Edtiar Imóvel</h2>
            <small>Preencha o formulário abaixo para editar o imóvel</small>
            <hr class="transparente">

            <form name="editar" method="POST" action="<?= URL . '/ImoveisController/editar/' . $dados['imovel']->id_imovel ?> " enctype="multipart/form-data">

                <h3>Imagens</h3>

                <?= Alertas::mensagem('imagem') ?>
                <?= Alertas::mensagem('imagemExtra') ?>

                <?php foreach ($dados['fotosImovel'] as $fotosImovel) { ?>
                    <div class="text-center m-3">
                        <img src="<?= URL . DIRECTORY_SEPARATOR . $fotosImovel->nm_path_arquivo . DIRECTORY_SEPARATOR . $fotosImovel->nm_arquivo ?>" class="rounded img-fluid" alt="">
                        <a href="<?= URL . '/ImoveisController/deletarImagem/' . $fotosImovel->id_anexo ?>" class="btn btn-danger mt-1"> Excluir imagem <i class="bi bi-trash-fill"></i></a>
                        <?php if ($fotosImovel->chk_destaque == 'S') { ?>
                            <label class="form-check-label" for="chkFotoDestaque"> &nbsp&nbsp Foto Destaque
                                <input class="form-check-input" type="radio" name="chkFotoDestaque" id="chkFotoDestaque" checked value="<?= $fotosImovel->id_anexo ?>">
                            </label>
                        <?php } else { ?>
                            <label class="form-check-label" for="chkFotoDestaque"> &nbsp&nbsp Foto destaque
                                <input class="form-check-input" type="radio" name="chkFotoDestaque" id="chkFotoDestaque" value="<?= $fotosImovel->id_anexo ?>">
                            </label>
                        <?php } ?>
                    </div>
                <?php } ?>

                <hr class="transparente">

                <div class="mb-3 mt-3">
                    <label for="cboTipoImovel" class="form-label">Tipo Imóvel: *</label>
                    <select class="form-select <?= $dados['tipoImovel_erro'] ? 'is-invalid' : '' ?>" name="cboTipoImovel" id="cboTipoImovel">
                        <?php foreach ($dados['tipoImovel'] as $tipoImovel) {
                            //Resgata valor do select 
                            $tipoImovelSelected = '';
                            if ($tipoImovel->id_tipo_imovel == $dados['imovel']->fk_tipo_imovel) {
                                $tipoImovelSelected = 'selected';
                            }
                        ?>
                            <option value="<?= $tipoImovel->id_tipo_imovel ?>" <?= $tipoImovelSelected ?>><?= $tipoImovel->ds_tipo_imovel ?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback"><?= $dados['tipoImovel_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="txtRuaImovel" class="form-label">Rua Imóvel:</label>
                    <input type="text" class="form-control <?= $dados['rua_imovel_erro'] ? 'is-invalid' : '' ?>" name="txtRuaImovel" id="txtRuaImovel" value="<?= $dados['imovel']->ds_rua_imovel ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['rua_imovel_erro'] ?></div>
                </div>


                <div class="mb-3 mt-3">
                    <label for="cboBairro" class="form-label">Bairro Imóvel: *</label>
                    <select class="form-select" name="cboBairro" id="cboBairro">
                        <?php foreach ($dados['bairros'] as $bairros) {
                            //Resgata valor do select 
                            $bairroSelected = '';
                            if ($bairros->id_bairro == $dados['imovel']->fk_bairro) {
                                $bairroSelected = 'selected';
                            }
                        ?>
                            <option <?= $bairroSelected ?> value="<?= $bairros->id_bairro ?>"><?= $bairros->ds_bairro ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3 mt-3">
                    <label for="tamArea" class="form-label">Área m²:</label>
                    <input type="text" class="form-control <?= $dados['area_imovel_erro'] ? 'is-invalid' : '' ?>" name="tamArea" id="tamArea" value="<?= $dados['imovel']->qtd_area ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['area_imovel_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="qtdQuarto" class="form-label">Quantidade quartos:</label>
                    <input type="text" class="form-control <?= $dados['qtd_quarto_erro'] ? 'is-invalid' : '' ?>" name="qtdQuarto" id="qtdQuarto" value="<?= $dados['imovel']->qtd_quarto ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['qtd_quarto_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="qtdBanheiro" class="form-label">Quantidade banheiros:</label>
                    <input type="text" class="form-control <?= $dados['qtd_banheiro_erro'] ? 'is-invalid' : '' ?>" name="qtdBanheiro" id="qtdBanheiro" value="<?= $dados['imovel']->qtd_banheiro ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['qtd_banheiro_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="qtdVagas" class="form-label">Quantidade vagas:</label>
                    <input type="text" class="form-control <?= $dados['qtd_vagas_erro'] ? 'is-invalid' : '' ?>" name="qtdVagas" id="qtdVagas" value="<?= $dados['imovel']->qtd_vagas ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['qtd_vagas_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="txtNumAndar" class="form-label">Número andar:</label>
                    <input type="text" class="form-control <?= $dados['num_andar_erro'] ? 'is-invalid' : '' ?>" name="txtNumAndar" id="txtNumAndar" value="<?= $dados['imovel']->num_andar ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['num_andar_erro'] ?></div>
                </div>

                <label class="form-check-label mt-3 mb-2" for="chkAceitaPet">
                    Aceita pet?
                </label>
                <br>
                <?php
                $aceitaPetS = '';
                $aceitaPetN = '';

                if (isset($dados['imovel']->chk_aceita_pet)) {

                    if ($dados['imovel']->chk_aceita_pet == 'S') {
                        $aceitaPetS = 'checked';
                    }
                    if ($dados['imovel']->chk_aceita_pet == 'N') {
                        $aceitaPetN = 'checked';
                    }
                }
                ?>
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="chkAceitaPet">
                        Sim
                        <input class="form-check-input" type="radio" name="chkAceitaPet" id="chkAceitaPet" value="S" <?= $aceitaPetS ?>>
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="chkAceitaPet">
                        Não
                        <input class="form-check-input" type="radio" name="chkAceitaPet" id="chkAceitaPet" value="N" <?= $aceitaPetN ?>>
                    </label>
                </div>
                <br>

                <label class="form-check-label mt-3 mb-2" for="chkMobilia">
                    Mobiliado?
                </label>
                <br>
                <?php
                $mobiliaS = '';
                $mobiliaN = '';

                if (isset($dados['imovel']->chk_mobilia)) {

                    if ($dados['imovel']->chk_mobilia == 'S') {
                        $mobiliaS = 'checked';
                    }
                    if ($dados['imovel']->chk_mobilia == 'N') {
                        $mobiliaN = 'checked';
                    }
                }
                ?>
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="chkMobilia">
                        Sim
                        <input class="form-check-input" type="radio" name="chkMobilia" id="chkMobilia" value="S" <?= $mobiliaS ?>>
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="chkMobilia">
                        Não
                        <input class="form-check-input" type="radio" name="chkMobilia" id="chkMobilia" value="N" <?= $mobiliaN ?>>
                    </label>
                </div>
                <br>

                <label class="form-check-label mt-3 mb-2" for="chkMetroProx">
                    Metro Próximo?
                </label>
                <br>
                <?php
                $metroProxS = '';
                $metroProxN = '';

                if (isset($dados['imovel']->chk_metro_prox)) {

                    if ($dados['imovel']->chk_metro_prox == 'S') {
                        $metroProxS = 'checked';
                    }
                    if ($dados['imovel']->chk_metro_prox == 'N') {
                        $metroProxN = 'checked';
                    }
                }
                ?>
                <div class="form-check form-check-inline">
                    <label class="form-check-label" for="chkMetroProx">
                        Sim
                        <input class="form-check-input" type="radio" name="chkMetroProx" id="chkMetroProx" value="S" <?= $metroProxS ?>>
                    </label>
                </div>

                <div class="form-check form-check-inline mb-3">
                    <label class="form-check-label" for="chkMetroProx">
                        Não
                        <input class="form-check-input" type="radio" name="chkMetroProx" id="chkMetroProx" value="N" <?= $metroProxN ?>>
                    </label>
                </div>

                <h3>Proximidades</h3>

                <label class="form-check-label mt-3 mb-2" for="txtSobreImovel">
                    Sobre esse imóvel
                </label>
                <div class="form-floating">
                    <textarea class="form-control txtarea" id="txtSobreImovel" name="txtSobreImovel" maxlength="500"><?= $dados['imovel']->txt_sobre_imovel ?></textarea>
                </div>


                <label class="form-check-label mt-3 mb-2" for="txtEscolaColegio">
                    Escolas ou colégios
                </label>
                <div class="form-floating">
                    <textarea class="form-control txtarea" id="txtEscolaColegio" name="txtEscolaColegio" maxlength="500"><?= $dados['imovel']->txt_escolas_colegios ?></textarea>
                </div>

                <label class="form-check-label mt-3 mb-2" for="txtFaculdades">
                    Faculdades
                </label>
                <div class="form-floating">
                    <textarea class="form-control txtarea" id="txtFaculdades" name="txtFaculdades" maxlength="500"><?= $dados['imovel']->txt_faculdades ?></textarea>
                </div>

                <label class="form-check-label mt-3 mb-2" for="txtTransportePublico">
                    Transporte Público
                </label>
                <div class="form-floating">
                    <textarea class="form-control txtarea" id="txtTransportePublico" name="txtTransportePublico" maxlength="500"><?= $dados['imovel']->txt_transporte_publico ?></textarea>
                </div>

                <label class="form-check-label mt-3 mb-2" for="txtEntretenimento">
                    Museus, teatros ou arenas de shows
                </label>
                <div class="form-floating">
                    <textarea class="form-control txtarea" id="txtEntretenimento" name="txtEntretenimento" maxlength="500"><?= $dados['imovel']->txt_entretenimento ?></textarea>
                </div>

                <label class="form-check-label mt-3 mb-2" for="txtHospitais">
                    Hospitais
                </label>
                <div class="form-floating">
                    <textarea class="form-control txtarea" id="txtHospitais" name="txtHospitais" maxlength="500"><?= $dados['imovel']->txt_hospitais ?></textarea>
                </div>

                <label class="form-check-label mt-3 mb-2" for="txtParqueAreasVerdes">
                    Parques ou áreas verdes
                </label>
                <div class="form-floating">
                    <textarea class="form-control txtarea" id="txtParqueAreasVerdes" name="txtParqueAreasVerdes" maxlength="500"><?= $dados['imovel']->txt_parque_area_verde ?></textarea>
                </div>

                <label class="form-check-label mt-3 mb-2" for="txtShopping">
                    Shoppings
                </label>
                <div class="form-floating">
                    <textarea class="form-control txtarea" id="txtShopping" name="txtShopping" maxlength="500"><?= $dados['imovel']->txt_shopping ?></textarea>
                </div>

                <div class="mb-3 mt-3">
                    <label for="cboTipoNegociacao" class="form-label">Tipo negociacao: *</label>
                    <select class="form-select <?= $dados['tipoNegociacao_erro'] ? 'is-invalid' : '' ?>" name="cboTipoNegociacao" id="cboTipoNegociacao">
                        <?php foreach ($dados['tipoNegociacao'] as $tipoNegociacao) {
                            //Resgata valor do select 
                            $tipoNegociacaoSelected = '';
                            if ($tipoNegociacao->id_tipo_negociacao == $dados['imovel']->fk_tipo_negociacao) {
                                $tipoNegociacaoSelected = 'selected';
                            }
                        ?>
                            <option <?= $tipoNegociacaoSelected ?> value="<?= $tipoNegociacao->id_tipo_negociacao ?>"><?= $tipoNegociacao->ds_tipo_negociacao ?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback"><?= $dados['tipoNegociacao_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="moValorAluguel" class="form-label">Valor Aluguel:</label>
                    <input type="text" class="money form-control <?= $dados['valor_aluguel_erro'] ? 'is-invalid' : '' ?>" name="moValorAluguel" id="moValorAluguel" value="<?php if (!$dados['imovel']->mo_aluguel == "") {
                                                                                                                                                                                echo number_format((($dados['imovel']->mo_aluguel) / 100), 2, ",", ".");
                                                                                                                                                                            } ?>" disabled>
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['valor_aluguel_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="moValorVenda" class="form-label">Valor Venda:</label>
                    <input type="text" class="money form-control <?= $dados['valor_venda_erro'] ? 'is-invalid' : '' ?>" name="moValorVenda" id="moValorVenda" value="<?php if (!$dados['imovel']->mo_venda == "") {
                                                                                                                                                                            echo number_format((($dados['imovel']->mo_venda) / 100), 2, ",", ".");
                                                                                                                                                                        } ?>" disabled>
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['valor_venda_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="moValorCondominio" class="form-label">Valor Condomínio:</label>
                    <input type="text" class="money form-control <?= $dados['valor_condominio_erro'] ? 'is-invalid' : '' ?>" name="moValorCondominio" id="moValorCondominio" value="<?php if (!$dados['imovel']->mo_condominio == "") {
                                                                                                                                                                                        echo number_format((($dados['imovel']->mo_condominio) / 100), 2, ",", ".");
                                                                                                                                                                                    } ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['valor_condominio_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="moValorIptu" class="form-label">Valor IPTU:</label>
                    <input type="text" class="money form-control <?= $dados['valor_iptu_erro'] ? 'is-invalid' : '' ?>" name="moValorIptu" id="moValorIptu" value="<?php if (!$dados['imovel']->mo_iptu == "") {
                                                                                                                                                                        echo number_format((($dados['imovel']->mo_iptu) / 100), 2, ",", ".");
                                                                                                                                                                    } ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['valor_iptu_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="moValorSeguroIncendio" class="form-label">Valor Seguro Incendio:</label>
                    <input type="text" class="money form-control <?= $dados['valor_seguro_incendio_erro'] ? 'is-invalid' : '' ?>" name="moValorSeguroIncendio" id="moValorSeguroIncendio" value="<?php if (!$dados['imovel']->mo_seguro_incendio == "") {
                                                                                                                                                                                                        echo number_format((($dados['imovel']->mo_seguro_incendio) / 100), 2, ",", ".");
                                                                                                                                                                                                    } ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['valor_seguro_incendio_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="moTaxaServico" class="form-label">Valor Taxa Serviço:</label>
                    <input type="text" class="money form-control <?= $dados['taxa_servico_erro'] ? 'is-invalid' : '' ?>" name="moTaxaServico" id="moTaxaServico" value="<?php if (!$dados['imovel']->mo_taxa_de_servico == "") {
                                                                                                                                                                            echo number_format((($dados['imovel']->mo_taxa_de_servico) / 100), 2, ",", ".");
                                                                                                                                                                        } ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['taxa_servico_erro'] ?></div>
                </div>

                <h3>Características Imóveis</h3>

                <div class="mb-3 mt-3 row">
                    <?php foreach ($dados['caracteristicasImovel'] as $caracteristicasImovel) {

                        $caracImovelchecked = '';

                        foreach ($dados['relacionaCaracImovel'] as $relacionaCaracImovel) {

                            if ($caracteristicasImovel->id_caracteristica_imovel == $relacionaCaracImovel->fk_caracteristica_imovel) {
                                $caracImovelchecked = 'checked';
                            }
                        }
                    ?>
                        <div class="col-5 m-2">
                            <input type="checkbox" name="chkCaracteristicaImovel[]" value="<?= $caracteristicasImovel->id_caracteristica_imovel ?>" <?= $caracImovelchecked ?>> <?= $caracteristicasImovel->ds_caracteristica_imovel ?>
                        </div>
                    <?php } ?>
                </div>

                <h3>Características Condomínio</h3>

                <div class="mb-3 mt-3 row">
                    <?php foreach ($dados['caracteristicasCondominio'] as $caracteristicasCondominio) {

                        $caracCondochecked = '';

                        foreach ($dados['relacionaCaracCondo'] as $relacionaCaracCondo) {

                            if ($caracteristicasCondominio->id_caracteristica_condominio == $relacionaCaracCondo->fk_caracteristica_condominio) {
                                $caracCondochecked = 'checked';
                            }
                        }
                    ?>
                        <div class="col-5 m-2">
                            <input type="checkbox" name="chkCaracteristicaCondominio[]" value="<?= $caracteristicasCondominio->id_caracteristica_condominio ?>" <?= $caracCondochecked ?>> <?= $caracteristicasCondominio->ds_caracteristica_condominio ?>
                        </div>
                    <?php } ?>
                </div>

                <h3>Mobilias</h3>

                <div class="mb-3 mt-3 row">
                    <?php foreach ($dados['mobilias'] as $mobilias) {

                        $mobiliaChk = '';

                        foreach ($dados['relacionaMobilias'] as $relacionaMobilias) {

                            if ($mobilias->id_filtro_mobilias == $relacionaMobilias->fk_filtro_mobilias) {
                                $mobiliaChk = 'checked';
                            }
                        }
                    ?>
                        <div class="col-5 m-2">
                            <input type="checkbox" name="chkMobilias[]" value="<?= $mobilias->id_filtro_mobilias ?>" <?= $mobiliaChk ?>> <?= $mobilias->ds_filtro_mobilias ?>
                        </div>
                    <?php } ?>
                </div>

                <h3>Bem-estar</h3>

                <div class="mb-3 mt-3 row">
                    <?php foreach ($dados['bem_estar'] as $bem_estar) {

                        $bemEstarChk = '';

                        foreach ($dados['relacionaBemEstar'] as $relacionaBemEstar) {

                            if ($bem_estar->id_filtro_bem_estar == $relacionaBemEstar->fk_filtro_bem_estar) {
                                $bemEstarChk = 'checked';
                            }
                        }
                    ?>
                        <div class="col-5 m-2">
                            <input type="checkbox" name="chkBemEstar[]" value="<?= $bem_estar->id_filtro_bem_estar ?>" <?= $bemEstarChk ?>> <?= $bem_estar->ds_filtro_bem_estar ?>
                        </div>
                    <?php } ?>
                </div>

                <h3>Eletrodomésticos</h3>

                <div class="mb-3 mt-3 row">
                    <?php foreach ($dados['eletro'] as $eletro) {

                        $eletroChk = '';

                        foreach ($dados['relacionaEletros'] as $relacionaEletros) {

                            if ($eletro->id_filtro_eletrodomestico == $relacionaEletros->fk_filtro_eletrodomestico) {
                                $eletroChk = 'checked';
                            }
                        }
                    ?>
                        <div class="col-5 m-2">
                            <input type="checkbox" name="chkEletro[]" value="<?= $eletro->id_filtro_eletrodomestico ?>" <?= $eletroChk ?>> <?= $eletro->ds_filtro_eletrodomestico ?>
                        </div>
                    <?php } ?>
                </div>

                <h3>Cômodos</h3>

                <div class="mb-3 mt-3 row">
                    <?php foreach ($dados['comodos'] as $comodos) {

                        $comodoChk = '';

                        foreach ($dados['relacionaComodos'] as $relacionaComodos) {

                            if ($comodos->id_filtro_comodos == $relacionaComodos->fk_filtro_comodos) {
                                $comodoChk = 'checked';
                            }
                        }
                    ?>
                        <div class="col-5 m-2">
                            <input type="checkbox" name="chkComodo[]" value="<?= $comodos->id_filtro_comodos ?>" <?= $comodoChk ?>> <?= $comodos->ds_filtro_comodos ?>
                        </div>
                    <?php } ?>
                </div>

                <h3>Acessibilidade</h3>

                <div class="mb-3 mt-3 row">
                    <?php foreach ($dados['acessibilidade'] as $acessibilidade) {

                        $comodoChk = '';

                        foreach ($dados['relacionaAcessibilidade'] as $relacionaAcessibilidade) {

                            if ($acessibilidade->id_filtro_acessibilidade == $relacionaAcessibilidade->fk_filtro_acessibilidade) {
                                $comodoChk = 'checked';
                            }
                        }
                    ?>
                        <div class="col-5 m-2">
                            <input type="checkbox" name="chkAcessibilidade[]" value="<?= $acessibilidade->id_filtro_acessibilidade ?>" <?= $comodoChk ?>> <?= $acessibilidade->ds_filtro_acessibilidade ?>
                        </div>
                    <?php } ?>
                </div>

                <h3>Informações do proprietário</h3>

                <div class="mb-3 mt-3">
                    <label for="txtNomeProprietario" class="form-label">Nome proprietário:</label>
                    <input type="text" class="form-control <?= $dados['nome_proprietario_erro'] ? 'is-invalid' : '' ?>" name="txtNomeProprietario" id="txtNomeProprietario" value="<?= $dados['imovel']->ds_nome_proprietario ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['nome_proprietario_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="txtTelProprietario" class="form-label">Telefone proprietário:</label>
                    <input type="text" class="form-control <?= $dados['tel_proprietario_erro'] ? 'is-invalid' : '' ?>" name="txtTelProprietario" id="txtTelProprietario" value="<?= $dados['imovel']->num_telefone_proprietario ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['tel_proprietario_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="txtEmailProprietario" class="form-label">E-mail proprietário:</label>
                    <input type="text" class="form-control <?= $dados['email_proprietario_erro'] ? 'is-invalid' : '' ?>" name="txtEmailProprietario" id="txtEmailProprietario" value="<?= $dados['imovel']->ds_email_proprietario ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['email_proprietario_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="txtLinkVideo" class="form-label">Link Vídeo:</label>
                    <input type="text" class="form-control" name="txtLinkVideo" id="txtLinkVideo" value="<?= $dados['imovel']->txt_link_video ?>">
                </div>

                <div class="mb-3">
                    <label for="fileFotos" class="form-label">Fotos:</label>
                    <input class="form-control" type="file" id="fileFotos" accept="image/png, image/jpeg" name="fileFotos[]" multiple>

                </div>
                <!-- <img id='img' /> -->
                <div class="mb-3">
                    <p>Imagens a serem enviadas:</p>
                    <div class="container" id="dynamicDiv">


                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <input type="submit" value="Salvar Edição" class="btn btn-primary">
                    </div>
                </div>
            </form>
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
            affixesStay: false
        });

        id_tipo_imovel = $("#cboTipoNegociacao").val();
        disableVenda(id_tipo_imovel);
        disableAluguel(id_tipo_imovel);
    });

    function disableVenda(id_tipo_imovel) {
        $("#moValorVenda").prop('disabled', true);

        if (id_tipo_imovel == 1) {

            $("#moValorVenda").prop('disabled', false);
        }
    }

    function disableAluguel(id_tipo_imovel) {
        $("#moValorAluguel").prop('disabled', true);

        if (id_tipo_imovel == 2) {

            $("#moValorAluguel").prop('disabled', false);
        }
    }

    $("#cboTipoNegociacao").change(function() {
        id_tipo_imovel = $("#cboTipoNegociacao").val();

        disableVenda(id_tipo_imovel);

        disableAluguel(id_tipo_imovel);
    });

    $(function() {

        $('#fileFotos').change(function() {

            $("p").remove(".nomeImagem");

            var scntDiv = $('#dynamicDiv');
            var files = $(this)[0].files;

            for (var i = 0; i < files.length; i++) {
                $('<p class="nomeImagem">' + files[i].name + '</p>').appendTo(scntDiv)
            }


        })
    })
</script>