<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="<?= URL ?>/public/css/estilos.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= URL . '/public/img/favico.png' ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo URL ?>/public/js/jquery.funcoes.js"></script>
    <script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js'></script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script> -->
    <script src="<?= URL ?>/public/js/qcTimepicker.min.js"></script>
    <title><?= APP_NOME ?></title>
</head>

<body>



    <header class="bg-light border-bottom">

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">


                    <a class="navbar-brand" href="<?= URL ?>">
                        <figure class="figure">
                            <img src="<?= URL . '/public/img/btnHome.png' ?>" class="figure-img img-fluid rounded btnHome" alt="Botão home">
                        </figure>
                    </a>



                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= URL ?>">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Buscar Imóveis</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" aria-current="page" href="<?= URL . '/Paginas/imovelAluguel' ?>">Imóveis para alugar</a></li>
                                    <li><a class="dropdown-item" aria-current="page" href="<?= URL . '/Paginas/imovelVenda' ?>">Imóveis para comprar</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Legalização de imóveis</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= URL . '/Paginas/contato' ?>">Contato</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= URL . '/Paginas/sobre' ?>">Sobre nós</a>
                            </li>                           
                            <?php if (isset($_SESSION['id_usuario'])) { ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Cadastro</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" aria-current="page" href="<?= URL . '/UsuariosController/cadastrar' ?>">Usuário</a></li>
                                        <li><a class="dropdown-item" aria-current="page" href="<?= URL . '/ImoveisController' ?>">Imóveis</a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                        <?php if (isset($_SESSION['id_usuario'])) { ?>
                            <span class="">
                                <p>Olá, <?= ucfirst($_SESSION['ds_nome_usuario']); ?>, Seja bem vindo(a)</p>
                                <a class="btn btn-sm btn-danger" href="<?= URL . '/UsuariosController/sair' ?>">Sair</a>
                            </span>
                        <?php } ?>
                    </div>
                </div>
            </nav>
        </div>

    </header>