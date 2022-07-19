<?php

class Paginas extends Controller
{

    public function __construct()
    {
        $this->imovelModel = $this->model('Imoveis');
    }



    public function index()
    {

        $imovel = $this->imovelModel->listarImoveis();
        $anexos = $this->imovelModel->lerAnexos();

        //Parâmetros enviados para o método do controller VIEW
        $dados = [
            'imovel' => $imovel,
            'anexos' => $anexos
        ];

        //Chamada do novo objeto PAGINAS 
        $this->view('paginas/home', $dados);
    }


    public function imovelSelecionado($id)
    {

        $imovel = $this->imovelModel->lerImovelSelecionadoPorId($id);
        $anexos = $this->imovelModel->lerFotosPorId($id);
        $relacCaracImovel = $this->imovelModel->caracImovelPorId($id);
        $relacCaracCondo = $this->imovelModel->caracCondoPorId($id);
        $caracCondo = $this->imovelModel->listarCaracteristicasCondominio();
        $caracImovel = $this->imovelModel->listarCaracteristicasImovel();

         //Parâmetros enviados para o método do controller VIEW
         $dados = [
            'imovel' => $imovel,
            'anexos' => $anexos,
            'relacCaracImovel' => $relacCaracImovel,
            'relacCaracCondo' => $relacCaracCondo,
            'caracCondo' => $caracCondo,
            'caracImovel' => $caracImovel

        ];


         //Chamada do novo objeto PAGINAS 
         $this->view('paginas/imovelSelecionado', $dados);
    }


    public function sobre()
    {

        //Parâmetros enviados para o método do controller VIEW
        $dados = [
            'tituloPagina' => 'Sobre nós'
        ];

        //Chamada do novo objeto PAGINAS 
        $this->view('paginas/sobre', $dados);
    }
}
