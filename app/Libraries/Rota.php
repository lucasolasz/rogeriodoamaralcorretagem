<?php

class Rota
{
    private $controlador = 'Paginas';
    //Define o método padrão, caso nao seja solicitado nenhum outro
    private $metodo = 'index';
    private $parametros = [];


    public function __construct()
    {     
        $url = $this->url() ? $this->url() : [0];

        /*
        UCWORDS - transforma primeiro caractere em maiusculo
        Verifica se o controlador existe
        */
        if (file_exists('../app/Controllers/' . ucwords($url[0]) . '.php')) {
            $this->controlador = ucwords($url[0]);
            unset($url[0]);
        }

        require_once '../app/Controllers/' . $this->controlador . '.php';

        $this->controlador = new $this->controlador;

        //Verifica se método existe
        if(isset($url[1])){
            if(method_exists($this->controlador, $url[1])){
                $this->metodo = $url[1];
                unset($url[1]);
            }
        }

        //Verificar se parametros são validos
        $this->parametros = $url ? array_values($url) : [];
        //Chama array com os parametros
        call_user_func_array([$this->controlador, $this->metodo], $this->parametros);

        // var_dump($teste);
    }


    //Previne de usuario digitar alguma URL inexistente 
    private function url()
    {
        /*Filtros para evitar dados maliciosos.
        A String url foi definida no arquivo htaccess de public
        FILTER_SANITIZE_URL impede envio de caracteres ilegais
        */
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);

        //Retorna URL somente se existir
        if (isset($url)) {

            /*
            Faz uma limpeza de espaços e barras 
            impedindo que se crie um array com informações erradas
            TRIM - Remove espaços do inicio e do final da string
            RTRIM - Limpa os caracteres do final da string
            */
            $url = trim(rtrim($url, '/'));

            //Transforma uma string em um array separado pelo /
            $url = explode('/', $url);

            return $url;
        }
    }
}
