<?php

class Paginas extends Controller 
{
    public function index(){

        //Parâmetros enviados para o método do controller VIEW
        $dados = [
            'tituloPagina' => 'Página Inicial',
        ];

        //Chamada do novo objeto PAGINAS 
        $this->view('Paginas/home', $dados);
    }


    public function sobre(){

        //Parâmetros enviados para o método do controller VIEW
        $dados = [
            'tituloPagina' => 'Sobre nós'            
        ];

        //Chamada do novo objeto PAGINAS 
        $this->view('Paginas/sobre', $dados);

        
    }
}