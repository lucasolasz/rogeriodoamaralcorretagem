<div class="col-xl-4 col-md-6 mx-auto p-5">


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= URL ?>/ImoveisController">Imóveis</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastrar Novo Imóvel</li>
        </ol>
    </nav>


    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Cadastrar Novo Imóvel</h2>
            <small>Preencha o formulário abaixo para cadastrar um novo imóvel</small>

            <form name="cadastrar" method="POST" action="<?= URL ?>/ImoveisController/cadastrar">

                <div class="mb-3 mt-3">
                    <label for="cboTipoImovel" class="form-label">Tipo Imóvel: *</label>
                    <select class="form-select <?= $dados['tipoImovel_erro'] ? 'is-invalid' : '' ?>" name="cboTipoImovel" id="cboTipoImovel">
                        <?php foreach ($dados['tipoImovel'] as $tipoImovel) {
                            //Resgata valor do select 
                            $tipoImovelSelected = '';
                            if ($tipoImovel->id_tipo_negociacao == $dados['cboTipoImovel']) {
                                $tipoImovelSelected = 'selected';
                            }
                        ?>
                            <option value="<?= $tipoImovel->id_tipo_imovel ?>"><?= $tipoImovel->ds_tipo_imovel ?></option>
                        <?php } ?>
                    </select>
                    <div class="invalid-feedback"><?= $dados['tipoImovel_erro'] ?></div>
                </div>                

                <div class="mb-3 mt-3">
                    <label for="txtEnderecoImovel" class="form-label">Endereço Imóvel:</label>
                    <input type="text" class="form-control <?= $dados['endereco_imovel_erro'] ? 'is-invalid' : '' ?>" name="txtEnderecoImovel" id="txtEnderecoImovel" value="<?= $dados['txtEnderecoImovel'] ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['endereco_imovel_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="tamArea" class="form-label">Área m²:</label>
                    <input type="text" class="form-control <?= $dados['area_imovel_erro'] ? 'is-invalid' : '' ?>" name="tamArea" id="tamArea" value="<?= $dados['tamArea'] ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['area_imovel_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="qtdQuarto" class="form-label">Quantidade quartos:</label>
                    <input type="text" class="form-control <?= $dados['qtd_quarto_erro'] ? 'is-invalid' : '' ?>" name="qtdQuarto" id="qtdQuarto" value="<?= $dados['qtdQuarto'] ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['qtd_quarto_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="qtdBanheiro" class="form-label">Quantidade banheiros:</label>
                    <input type="text" class="form-control <?= $dados['titulo_imovel_erro'] ? 'is-invalid' : '' ?>" name="qtdBanheiro" id="qtdBanheiro" value="<?= $dados['qtdBanheiro'] ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['qtd_banheiro_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="qtdVagas" class="form-label">Quantidade vagas:</label>
                    <input type="text" class="form-control <?= $dados['titulo_imovel_erro'] ? 'is-invalid' : '' ?>" name="qtdVagas" id="qtdVagas" value="<?= $dados['qtdVagas'] ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['qtd_vagas_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="txtNumAndar" class="form-label">Número andar:</label>
                    <input type="text" class="form-control <?= $dados['titulo_imovel_erro'] ? 'is-invalid' : '' ?>" name="txtNumAndar" id="txtNumAndar" value="<?= $dados['txtNumAndar'] ?>">
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

                if (isset($dados['chkAceitaPet'])) {

                    if ($dados['chkAceitaPet'] == 'S') {
                        $aceitaPetS = 'checked';
                    }
                    if ($dados['chkAceitaPet'] == 'N') {
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
                        <input class="form-check-input" type="radio" name="chkAceitaPet" id="chkAceitaPet" value="N" <?= $aceitaPetN ?> checked>
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

                if (isset($dados['chkMobilia'])) {

                    if ($dados['chkMobilia'] == 'S') {
                        $mobiliaS = 'checked';
                    }
                    if ($dados['chkMobilia'] == 'N') {
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
                        <input class="form-check-input" type="radio" name="chkMobilia" id="chkMobilia" value="N" <?= $mobiliaN ?> checked>
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

                if (isset($dados['chkMetroProx'])) {

                    if ($dados['chkMetroProx'] == 'S') {
                        $metroProxS = 'checked';
                    }
                    if ($dados['chkMetroProx'] == 'N') {
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
                        <input class="form-check-input" type="radio" name="chkMetroProx" id="chkMetroProx" value="N" <?= $metroProxN ?> checked>
                    </label>
                </div>

                <h3>Proximidades</h3>


                <label class="form-check-label mt-3 mb-2" for="txtEscolaColegio">
                    Escolas ou colégios
                </label>
                <div class="form-floating">
                    <textarea class="form-control" id="txtEscolaColegio" name="txtEscolaColegio" maxlength="500"><?= $dados['txtEscolaColegio'] ?></textarea>
                </div>

                <label class="form-check-label mt-3 mb-2" for="txtFaculdades">
                    Faculdades
                </label>
                <div class="form-floating">
                    <textarea class="form-control txtarea" id="txtFaculdades" name="txtFaculdades" maxlength="500"><?= $dados['txtFaculdades'] ?></textarea>
                </div>

                <label class="form-check-label mt-3 mb-2" for="txtTransportePublico">
                    Transporte Público
                </label>
                <div class="form-floating">
                    <textarea class="form-control txtarea" id="txtTransportePublico" name="txtTransportePublico" maxlength="500"><?= $dados['txtTransportePublico'] ?></textarea>
                </div>

                <label class="form-check-label mt-3 mb-2" for="txtEntretenimento">
                    Museus, teatros ou arenas de shows
                </label>
                <div class="form-floating">
                    <textarea class="form-control txtarea" id="txtEntretenimento" name="txtEntretenimento" maxlength="500"><?= $dados['txtEntretenimento'] ?></textarea>
                </div>

                <label class="form-check-label mt-3 mb-2" for="txtHospitais">
                    Hospitais
                </label>
                <div class="form-floating">
                    <textarea class="form-control txtarea" id="txtHospitais" name="txtHospitais" maxlength="500"><?= $dados['txtHospitais'] ?></textarea>
                </div>

                <label class="form-check-label mt-3 mb-2" for="txtParqueAreasVerdes">
                    Parques ou áreas verdes
                </label>
                <div class="form-floating">
                    <textarea class="form-control txtarea" id="txtParqueAreasVerdes" name="txtParqueAreasVerdes" maxlength="500"><?= $dados['txtParqueAreasVerdes'] ?></textarea>
                </div>

                <div class="mb-3 mt-3">
                    <label for="cboTipoNegociacao" class="form-label">Tipo negociacao: *</label>
                    <select class="form-select <?= $dados['tipoNegociacao_erro'] ? 'is-invalid' : '' ?>" name="cboTipoNegociacao" id="cboTipoNegociacao">
                        <?php foreach ($dados['tipoNegociacao'] as $tipoNegociacao) {
                            //Resgata valor do select 
                            $tipoNegociacaoSelected = '';
                            if ($tipoNegociacao->id_tipo_negociacao == $dados['cboTipoNegociacao']) {
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
                    <input type="text" class="money form-control <?= $dados['valor_aluguel_erro'] ? 'is-invalid' : '' ?>" name="moValorAluguel" id="moValorAluguel" value="<?= $dados['moValorAluguel'] ?>" disabled>
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['valor_aluguel_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="moValorVenda" class="form-label">Valor Venda:</label>
                    <input type="text" class="money form-control <?= $dados['valor_venda_erro'] ? 'is-invalid' : '' ?>" name="moValorVenda" id="moValorVenda" value="<?= $dados['moValorVenda'] ?>" disabled>
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['valor_venda_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="moValorCondominio" class="form-label">Valor Condomínio:</label>
                    <input type="text" class="money form-control <?= $dados['valor_condominio_erro'] ? 'is-invalid' : '' ?>" name="moValorCondominio" id="moValorCondominio" value="<?= $dados['moValorCondominio'] ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['valor_condominio_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="moValorIptu" class="form-label">Valor IPTU:</label>
                    <input type="text" class="money form-control <?= $dados['valor_iptu_erro'] ? 'is-invalid' : '' ?>" name="moValorIptu" id="moValorIptu" value="<?= $dados['moValorIptu'] ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['valor_iptu_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="moValorSeguroIncendio" class="form-label">Valor Seguro Incendio:</label>
                    <input type="text" class="money form-control <?= $dados['valor_seguro_incendio_erro'] ? 'is-invalid' : '' ?>" name="moValorSeguroIncendio" id="moValorSeguroIncendio" value="<?= $dados['moValorSeguroIncendio'] ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['valor_seguro_incendio_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="moTaxaServico" class="form-label">Valor Taxa Serviço:</label>
                    <input type="text" class="money form-control <?= $dados['taxa_servico_erro'] ? 'is-invalid' : '' ?>" name="moTaxaServico" id="moTaxaServico" value="<?= $dados['moTaxaServico'] ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['taxa_servico_erro'] ?></div>
                </div>

                <h3>Características Imóveis</h3>

                <div class="mb-3 mt-3 row">
                    <?php foreach ($dados['caracteristicasImovel'] as $caracteristicasImovel) { ?>
                        <div class="col-5 m-2">
                            <input type="checkbox" name="chkCaracteristicaImovel[]" value="<?= $caracteristicasImovel->id_caracteristica_imovel ?>"> <?= $caracteristicasImovel->ds_caracteristica_imovel ?>
                        </div>
                    <?php } ?>
                </div>

                <h3>Características Condomínio</h3>

                <div class="mb-3 mt-3 row">
                    <?php foreach ($dados['caracteristicasCondominio'] as $caracteristicasCondominio) { ?>
                        <div class="col-5 m-2">
                            <input type="checkbox" name="chkCaracteristicaCondominio[]" value="<?= $caracteristicasCondominio->id_caracteristica_condominio ?>"> <?= $caracteristicasCondominio->ds_caracteristica_condominio ?>
                        </div>
                    <?php } ?>
                </div>

                <h3>Informações do proprietário</h3>
                        
                <div class="mb-3 mt-3">
                    <label for="txtNomeProprietario" class="form-label">Nome proprietário:</label>
                    <input type="text" class="form-control <?= $dados['nome_proprietario_erro'] ? 'is-invalid' : '' ?>" name="txtNomeProprietario" id="txtNomeProprietario" value="<?= $dados['txtNomeProprietario'] ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['nome_proprietario_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="txtTelProprietario" class="form-label">Telefone proprietário:</label>
                    <input type="text" class="form-control <?= $dados['tel_proprietario_erro'] ? 'is-invalid' : '' ?>" name="txtTelProprietario" id="txtTelProprietario" value="<?= $dados['txtTelProprietario'] ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['tel_proprietario_erro'] ?></div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="txtEmailProprietario" class="form-label">E-mail proprietário:</label>
                    <input type="text" class="form-control <?= $dados['email_proprietario_erro'] ? 'is-invalid' : '' ?>" name="txtEmailProprietario" id="txtEmailProprietario" value="<?= $dados['txtEmailProprietario'] ?>">
                    <!-- Div para exibir o erro abaixo do campo -->
                    <div class="invalid-feedback"><?= $dados['email_proprietario_erro'] ?></div>
                </div>


                <div class="row mt-3">
                    <div class="col-md-6">
                        <input type="submit" value="Cadastrar" class="btn btn-primary">
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
            // affixesStay: true
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
</script>