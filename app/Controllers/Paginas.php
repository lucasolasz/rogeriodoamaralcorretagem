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

        $comodidades = $this->imovelModel->listarComodidades();
        $mobilias = $this->imovelModel->listarMobilias();
        $bem_estar = $this->imovelModel->listarBemEstar();
        $eletro = $this->imovelModel->listarEletros();
        $comodos = $this->imovelModel->listarComodos();
        $acessibilidade = $this->imovelModel->listarAcessibilidade();

        //Parâmetros enviados para o método do controller VIEW
        $dados = [
            'imovel' => $imovel,
            'anexos' => $anexos,
            'tipoNegociacao' => $tipoNegociacao,
            'tipoImovel' => $tipoImovel,
            'caracteristicasImovel' => $caracteristicasImovel,
            'caracteristicasCondominio' => $caracteristicasCondominio,
            'comodidades' => $comodidades,
            'mobilias' => $mobilias,
            'bem_estar' => $bem_estar,
            'eletro' => $eletro,
            'comodos' => $comodos,
            'acessibilidade' => $acessibilidade,
        ];

        //Chamada do novo objeto PAGINAS 
        $this->view('paginas/home', $dados);
    }

    //Redireciona para uma página em que não é retornado nada no filtro
    public function naoEncontrou()
    {
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

        $comodidades = $this->imovelModel->listarComodidades();
        $mobilias = $this->imovelModel->listarMobilias();
        $bem_estar = $this->imovelModel->listarBemEstar();
        $eletro = $this->imovelModel->listarEletros();
        $comodos = $this->imovelModel->listarComodos();
        $acessibilidade = $this->imovelModel->listarAcessibilidade();

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
                'txtTipoNegociacao' => $formulario['txtTipoNegociacao'],
                'comodidades' => $comodidades,
                'mobilias' => $mobilias,
                'bem_estar' => $bem_estar,
                'eletro' => $eletro,
                'comodos' => $comodos,
                'acessibilidade' => $acessibilidade
            ];


            $dados['chkNumQuartos'] = isset($formulario['chkNumQuartos']) ? $formulario['chkNumQuartos'] : NULL;

            $dados['chkNumBanheiros'] = isset($formulario['chkNumBanheiros']) ? $formulario['chkNumBanheiros'] : NULL;

            $dados['chkCaracCondominios'] = isset($formulario['chkCaracCondominios']) ? $formulario['chkCaracCondominios'] : "";

            $dados['chkComodidades'] = isset($formulario['chkComodidades']) ? $formulario['chkComodidades'] : "";

            $dados['chkMobilias'] = isset($formulario['chkMobilias']) ? $formulario['chkMobilias'] : "";

            $dados['chkBemEstar'] = isset($formulario['chkBemEstar']) ? $formulario['chkBemEstar'] : "";

            $dados['chkEletro'] = isset($formulario['chkEletro']) ? $formulario['chkEletro'] : "";

            $dados['chkComodo'] = isset($formulario['chkComodo']) ? $formulario['chkComodo'] : "";

            $dados['chkAcessibilidade'] = isset($formulario['chkAcessibilidade']) ? $formulario['chkAcessibilidade'] : "";


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
                    'comodidades' => $comodidades,
                    'mobilias' => $mobilias,
                    'bem_estar' => $bem_estar,
                    'eletro' => $eletro,
                    'comodos' => $comodos,
                    'acessibilidade' => $acessibilidade,
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
