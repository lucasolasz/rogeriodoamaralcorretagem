<?php

class Controller
{
    public function model($model)
    {
        require_once '../app/Models/' . $model . '.php';
        return new $model;
    }

    public function view($view, $dados = [])
    {
        $arquivo = ('../app/Views/' . $view . '.php');
        include APP . '/Views/topo.php';

        if (file_exists($arquivo)) {
            require_once $arquivo;
        } else {
            die('O arquivo de view não existe!');
        }
        include APP . '/views/rodape.php';
    }
}
