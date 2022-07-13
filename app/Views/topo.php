<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="<?php echo URL ?>/public/css/estilos.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <title><?php echo APP_NOME ?></title>
</head>

<body>



    <header class="bg-light">

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?= URL ?>"><?= APP_NOME ?></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= URL ?>">Home</a>
                            </li>
                            <?php if (isset($_SESSION['id_usuario'])) { ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Cadastro</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" aria-current="page" href="<?= URL . '/UsuariosController/cadastrar' ?>">Usuário</a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= URL . '/Paginas/sobre' ?>">Sobre nós</a>
                            </li>
                        </ul>
                        <?php if (isset($_SESSION['id_usuario'])) { ?>
                            <span class="">
                                <p>Olá, <?= ucfirst($_SESSION['ds_nome_usuario']); ?>, Seja bem vindo(a)</p>
                                <a class="btn btn-sm btn-danger" href="<?= URL . '/UsuariosController/sair' ?>">Sair</a>
                            </span>
                        <?php } else { ?>
                            <span class="">
                                <a class="btn btn-primary" href="<?= URL . '/UsuariosController/login' ?>">Entrar</a>
                            </span>
                        <?php } ?>

                    </div>
                </div>
            </nav>
        </div>

    </header>