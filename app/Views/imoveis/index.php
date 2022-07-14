<div class="container py-5">

    <?= Alertas::mensagem('imoveis') ?>

    <div class="card">

        <div class="card-header">

            <h5>Imóveis
                <div style="float: right;">
                    <a href="<?= URL ?>/ImoveisController/cadastrar" class="btn btn-primary">Novo Imóvel</a>
                </div>
            </h5>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Título</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Exibe mensagem caso não tenha nenhum evento
                        if (empty($dados['imoveis'])) { ?>

                            <tr>
                                <td colspan="3" class="align-middle">Nenhuma Imóvel cadastrado</td>
                            </tr>

                        <?php  }
                        foreach ($dados['imoveis'] as $imoveis) { ?>

                            <tr>
                                <td><?= ucfirst($imoveis->id_imovel) ?></td>
                                <td><?= ucfirst($imoveis->ds_titulo_imovel) ?></td>
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