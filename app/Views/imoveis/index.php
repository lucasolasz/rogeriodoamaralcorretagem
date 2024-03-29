<div class="container py-5">

    <?= Alertas::mensagem('imoveis') ?>

    <div class="card">

        <div class="card-header">

            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand">Imóveis</a>
                    <form class="d-flex" action="<?= URL . '/ImoveisController/pesquisar' ?>" method="POST">
                        <input class="form-control me-2" type="search" placeholder="Digite o id do imóvel" aria-label="Search" name="pesquisaImovel">
                        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                    </form>
                    <a href="<?= URL ?>/ImoveisController/cadastrar" class="btn btn-primary">Novo Imóvel</a>
                </div>
            </nav>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id imóvel</th>
                            <th scope="col">Tipo negociação</th>
                            <th scope="col">Tipo Imóvel</th>
                            <th scope="col">Tamanho m²</th>
                            <th scope="col">Valor Aluguel</th>
                            <th scope="col">Valor Venda</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Exibe mensagem caso não tenha nenhum evento
                        if (empty($dados['imoveis'])) { ?>

                            <tr>
                                <td colspan="7" class="align-middle">Nenhuma Imóvel cadastrado</td>
                            </tr>

                        <?php  }
                        foreach ($dados['imoveis'] as $imoveis) { ?>
                            <tr>
                                <td><?= "#00" . $imoveis->id_imovel ?></td>
                                <td><?= ucfirst($imoveis->ds_tipo_negociacao) ?></td>
                                <td><?= ucfirst($imoveis->ds_tipo_imovel) ?></td>
                                <?php if (!$imoveis->qtd_area == NULL) { ?>
                                    <td><?= $imoveis->qtd_area . "m²" ?></td>
                                <?php } else { ?>
                                    <td></td>
                                <?php } ?>
                                <?php if (!$imoveis->mo_aluguel == NULL) { ?>
                                    <td><?= "R$ " . number_format((($imoveis->mo_aluguel) / 100), 2, ",", ".") ?></td>
                                <?php } else { ?>
                                    <td></td>
                                <?php } ?>
                                <?php if (!$imoveis->mo_venda == NULL) { ?>
                                    <td><?= "R$ " . number_format((($imoveis->mo_venda) / 100), 2, ",", ".") ?></td>
                                <?php } else { ?>
                                    <td></td>
                                <?php } ?>
                                <td><a href="<?= URL . '/ImoveisController/editar/' . $imoveis->id_imovel ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a></td>
                                <td>
                                    <form action="<?= URL . '/ImoveisController/deletar/' . $imoveis->id_imovel ?>" method="POST">
                                        <button type="submit" class="btn btn-danger"><span><i class="bi bi-trash-fill"></i></span></button>
                                    </form>
                                </td>
                            </tr>

                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>