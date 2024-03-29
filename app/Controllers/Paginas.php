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

            // var_dump($formulario);
            // exit();

            $dados = [
                //Define o filtro se é Compra ou Aluguel
                'tipoNegociacao' => $tipoNegociacao,

                //Filtro Aluguel
                'tipoImovel' => $tipoImovel,
                'caracteristicasImovel' => $caracteristicasImovel,
                'caracteristicasCondominio' => $caracteristicasCondominio,
                'cboTipoImovel' => $formulario['cboTipoImovel'],
                'btnradioValor' => $formulario['btnradioValor'],
                'txtValorMin' => LimpaStringFloat::limparString($formulario['txtValorMin']),
                'txtValorMax' => LimpaStringFloat::limparString($formulario['txtValorMax']),
                'chkVagas' => $formulario['chkVagas'],
                'chkMobiliado' => $formulario['chkMobiliado'],
                'chkAceitaPets' => $formulario['chkAceitaPets'],
                'txtAreaMin' => $formulario['txtAreaMin'],
                'txtAreaMax' => $formulario['txtAreaMax'],
                'chkProxMetro' => $formulario['chkProxMetro'],
                'txtTipoNegociacao' => $formulario['txtTipoNegociacao'],

                //Filtro Compra
                'cboTipoImovelC' => $formulario['cboTipoImovelC'],
                'txtValorCompraMin' => LimpaStringFloat::limparString($formulario['txtValorCompraMin']),
                'txtValorCompraMax' => LimpaStringFloat::limparString($formulario['txtValorCompraMax']),
                'txtCondMaisIptuMin' => LimpaStringFloat::limparString($formulario['txtCondMaisIptuMin']),
                'txtCondMaisIptuMax' => LimpaStringFloat::limparString($formulario['txtCondMaisIptuMax']),
                'chkVagasC' => $formulario['chkVagasC'],
                'chkMobiliadoC' => $formulario['chkMobiliadoC'],
                'chkAceitaPetsC' => $formulario['chkAceitaPetsC'],
                'txtAreaMinC' => $formulario['txtAreaMinC'],
                'txtAreaMaxC' => $formulario['txtAreaMaxC'],
                'chkProxMetroC' => $formulario['chkProxMetroC'],

                'comodidades' => $comodidades,
                'mobilias' => $mobilias,
                'bem_estar' => $bem_estar,
                'eletro' => $eletro,
                'comodos' => $comodos,
                'acessibilidade' => $acessibilidade
            ];


            // Filtro aluguel
            $dados['chkNumQuartos'] = isset($formulario['chkNumQuartos']) ? $formulario['chkNumQuartos'] : NULL;
            $dados['chkNumBanheiros'] = isset($formulario['chkNumBanheiros']) ? $formulario['chkNumBanheiros'] : NULL;
            $dados['chkCaracCondominios'] = isset($formulario['chkCaracCondominios']) ? $formulario['chkCaracCondominios'] : "";
            $dados['chkComodidades'] = isset($formulario['chkComodidades']) ? $formulario['chkComodidades'] : "";
            $dados['chkMobilias'] = isset($formulario['chkMobilias']) ? $formulario['chkMobilias'] : "";
            $dados['chkBemEstar'] = isset($formulario['chkBemEstar']) ? $formulario['chkBemEstar'] : "";
            $dados['chkEletro'] = isset($formulario['chkEletro']) ? $formulario['chkEletro'] : "";
            $dados['chkComodo'] = isset($formulario['chkComodo']) ? $formulario['chkComodo'] : "";
            $dados['chkAcessibilidade'] = isset($formulario['chkAcessibilidade']) ? $formulario['chkAcessibilidade'] : "";


            // Filtro compra
            $dados['chkNumQuartosC'] = isset($formulario['chkNumQuartosC']) ? $formulario['chkNumQuartosC'] : NULL;
            $dados['chkNumBanheirosC'] = isset($formulario['chkNumBanheirosC']) ? $formulario['chkNumBanheirosC'] : NULL;
            $dados['chkCaracCondominiosC'] = isset($formulario['chkCaracCondominiosC']) ? $formulario['chkCaracCondominiosC'] : "";
            $dados['chkComodidadesC'] = isset($formulario['chkComodidadesC']) ? $formulario['chkComodidadesC'] : "";
            $dados['chkMobiliasC'] = isset($formulario['chkMobiliasC']) ? $formulario['chkMobiliasC'] : "";
            $dados['chkBemEstarC'] = isset($formulario['chkBemEstarC']) ? $formulario['chkBemEstarC'] : "";
            $dados['chkEletroC'] = isset($formulario['chkEletroC']) ? $formulario['chkEletroC'] : "";
            $dados['chkComodoC'] = isset($formulario['chkComodoC']) ? $formulario['chkComodoC'] : "";
            $dados['chkAcessibilidadeC'] = isset($formulario['chkAcessibilidadeC']) ? $formulario['chkAcessibilidadeC'] : "";


            // var_dump($dados);
            // exit();


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
        $relacBemEstar = $this->imovelModel->lerRelacBemEstarPorId($id);
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
            'caracImovel' => $caracImovel,
            'relacBemEstar' => $relacBemEstar
        ];


        // Captura dos valores de carac de imovel para exibir os indisponíveis no imóvel selecionado
        $relacCaracImovelInd = $this->imovelModel->caracImovelPorId($id);
        if (empty($relacCaracImovelInd)) {
            $dados['caracImovelInd'] = "";
        } else {
            $fk_caracteristica_imovel = '';
            foreach ($relacCaracImovelInd as $relacCaracImovelInd) {
                $fk_caracteristica_imovel = $fk_caracteristica_imovel . ',' .   $relacCaracImovelInd->fk_caracteristica_imovel;
            }
            $fk_carac_imo_limpa = substr($fk_caracteristica_imovel, 1);
            $caracImovelInd = $this->imovelModel->listarCaracteristicasImovelIndisponivel($fk_carac_imo_limpa);

            $dados['caracImovelInd'] =  $caracImovelInd;
        }

        //Captura dos valores de carac de condominio para exibir os indisponíveis no imóvel selecionado
        $relacCaracCondInd = $this->imovelModel->caracCondoPorId($id);
        if (empty($relacCaracCondInd)) {            
            $dados['caracCondInd'] = "";
        } else {
            $fk_caracteristica_condominio = '';
            foreach ($relacCaracCondInd as $relacCaracCondInd) {
                $fk_caracteristica_condominio = $fk_caracteristica_condominio . ',' .   $relacCaracCondInd->fk_caracteristica_condominio;
            }
            $fk_carac_cond_limpa = substr($fk_caracteristica_condominio, 1);
            $caracCondInd = $this->imovelModel->listarCaracteristicasCondoIndisponivel($fk_carac_cond_limpa);

            $dados['caracCondInd'] =  $caracCondInd;
        }

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
