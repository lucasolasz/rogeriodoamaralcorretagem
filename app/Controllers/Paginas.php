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

        $tipoNegociacao = $this->imovelModel->listarTipoNegociacao();
        $tipoImovel = $this->imovelModel->listarTipoImovel();
        $caracteristicasImovel = $this->imovelModel->listarCaracteristicasImovel();
        $caracteristicasCondominio = $this->imovelModel->listarCaracteristicasCondominio();

        //Parâmetros enviados para o método do controller VIEW
        $dados = [
            'imovel' => $imovel,
            'anexos' => $anexos,
            'tipoNegociacao' => $tipoNegociacao,
            'tipoImovel' => $tipoImovel,
            'caracteristicasImovel' => $caracteristicasImovel,
            'caracteristicasCondominio' => $caracteristicasCondominio
        ];

        //Chamada do novo objeto PAGINAS 
        $this->view('paginas/home', $dados);
    }


    public function naoEncontrou()
    {


        // echo 'cheguei';

        //Chamada do novo objeto PAGINAS 
        $this->view('paginas/naoEncontrou');
    }


    public function filtro()
    {
        $imovel = $this->imovelModel->listarImoveis();
        $anexos = $this->imovelModel->lerAnexos();

        $tipoNegociacao = $this->imovelModel->listarTipoNegociacao();
        $tipoImovel = $this->imovelModel->listarTipoImovel();
        $caracteristicasImovel = $this->imovelModel->listarCaracteristicasImovel();
        $caracteristicasCondominio = $this->imovelModel->listarCaracteristicasCondominio();

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) {

            $dados = [
                'tipoNegociacao' => $tipoNegociacao,
                'tipoImovel' => $tipoImovel,
                'caracteristicasImovel' => $caracteristicasImovel,
                'caracteristicasCondominio' => $caracteristicasCondominio,
                'cboTipoImovel' => $formulario['cboTipoImovel'],
                'txtValorMin' => LimpaStringFloat::limparString($formulario['txtValorMin']),
                'txtValorMax' => LimpaStringFloat::limparString($formulario['txtValorMax']),
                'chkVagas' => $formulario['chkVagas'],
                'chkMobiliado' => $formulario['chkMobiliado'],
                'chkAceitaPets' => $formulario['chkAceitaPets'],
                'txtAreaMin' => $formulario['txtAreaMin'],
                'txtAreaMax' => $formulario['txtAreaMax'],
                'chkProxMetro' => $formulario['chkProxMetro'],
                'txtTipoNegociacao' => $formulario['txtTipoNegociacao']

            ];


            $dados['chkNumQuartos'] = isset($formulario['chkNumQuartos']) ? $formulario['chkNumQuartos'] : NULL;

            $dados['chkNumBanheiros'] = isset($formulario['chkNumBanheiros']) ? $formulario['chkNumBanheiros'] : NULL;


            if ($this->imovelModel->imovelFiltro($dados)) {

                $dadosFiltrados = $this->imovelModel->imovelFiltro($dados);

                // var_dump($dadosFiltrados);
                // exit();

                $dados = [
                    'imovel' => $dadosFiltrados,
                    'anexos' => $anexos,
                    'tipoNegociacao' => $tipoNegociacao,
                    'tipoImovel' => $tipoImovel,
                    'caracteristicasImovel' => $caracteristicasImovel,
                    'caracteristicasCondominio' => $caracteristicasCondominio,
                    // 'filtros' => $formulario
                ];

                $dados['filtros'] = isset($formulario) ? $formulario : NULL;
            } else {

                // echo 'Sem filtros ';

                $dados = [
                    'imovel' => $imovel,
                    'anexos' => $anexos,
                    'tipoNegociacao' => $tipoNegociacao,
                    'tipoImovel' => $tipoImovel,
                    'caracteristicasImovel' => $caracteristicasImovel,
                    'caracteristicasCondominio' => $caracteristicasCondominio
                ];

                $dados['filtros'] = isset($formulario) ? $formulario : NULL;


                Alertas::mensagem('teste', 'Infelizmente ainda não possuímos imóveis com os filtros especificados.');
                Redirecionamento::redirecionar('Paginas/naoEncontrou');
            }
        }

        //Chamada do novo objeto PAGINAS 
        $this->view('paginas/home', $dados);
    }


    public function imovelAluguel()
    {

        $imovel = $this->imovelModel->listarImoveisAluguel();
        $anexos = $this->imovelModel->lerAnexos();

        //Parâmetros enviados para o método do controller VIEW
        $dados = [
            'imovel' => $imovel,
            'anexos' => $anexos
        ];

        //Chamada do novo objeto PAGINAS 
        $this->view('paginas/home', $dados);
    }


    public function imovelVenda()
    {

        $imovel = $this->imovelModel->listarImoveisCompra();
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


    public function agendamentoImovel($id)
    {

        $imovel = $this->imovelModel->lerImovelSelecionadoPorId($id);

        //Parâmetros enviados para o método do controller VIEW
        $dados = [
            'imovel' => $imovel,

        ];


        //Chamada do novo objeto PAGINAS 
        $this->view('paginas/agendamentoImovel', $dados);
    }

    public function confirmaAgendamento($id)
    {

        $imovel = $this->imovelModel->lerImovelSelecionadoPorId($id);

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) {

            //Parâmetros enviados para o método do controller VIEW
            $dados = [
                'imovel' => $imovel,
                'txtDataVisita' => $formulario['txtDataVisita'],
                'txtHoraVisita' => $formulario['txtHoraVisita']
            ];
        } else {

            $dados = [
                'imovel' => $imovel
            ];
        }

        //Chamada do novo objeto PAGINAS 
        $this->view('paginas/confirmaAgendamento', $dados);
    }

    public function envioContato($id)
    {

        $imovel = $this->imovelModel->lerImovelSelecionadoPorId($id);

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) {

            $dados = [
                'imovel' => $imovel,
                'txtDataHidden' => $formulario['txtDataHidden'],
                'txtHoraHidden' => $formulario['txtHoraHidden'],
                'txtNomeContato' => $formulario['txtNomeContato'],
                'txtEmailContato' => $formulario['txtEmailContato'],
                'txtTelefoneContato' => $formulario['txtTelefoneContato']
            ];
        } else {
            //Parâmetros enviados para o método do controller VIEW
            $dados = [
                'imovel' => $imovel,

            ];
        }

        //Chamada do novo objeto PAGINAS 
        $this->view('paginas/envioContato', $dados);
    }


    public function contato()
    {
        //Parâmetros enviados para o método do controller VIEW
        $dados = [];

        //Chamada do novo objeto PAGINAS 
        $this->view('paginas/contato', $dados);
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
